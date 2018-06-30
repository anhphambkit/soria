<?php
namespace Packages\Media\Services\Eloquent;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Packages\Core\Traits\Services\PackageServicesTrait;
use Packages\Media\Entities\Media;
use Packages\Media\Custom\Repositories\MediaRepositories;
use Packages\Media\Custom\Services\MediaServices;

class EloquentMediaServices implements MediaServices {
    use PackageServicesTrait;

    private $repositories;
    public function __construct(MediaRepositories $repositories)
    {
        $this->repositories = $repositories;
        $this->repositories->setModel(new Media());
    }

    /**
     * Upload media to server
     * @param $request
     * @return mixed
     */
    public function upload(Request $request)
    {
        $pathStore = config('media.upload_folder'). Carbon::now()->format('/Y/m');
        $orgName = $request->file('file')->getClientOriginalName();
        $extension = $request->file('file')->guessClientExtension();
        $nameWithoutExtension = preg_replace('/\.[a-zA-Z0-9]+$/','', $orgName);
        $i = 0;
        while(Storage::disk('public')->exists($pathStore. '/'. $orgName)){
            $orgName = $nameWithoutExtension. $i. '.'. $extension;
            $i++;
        }
        // uploads/2018/04/image-12.png
        $fileStore =  Storage::disk('public')->putFileAs($pathStore, $request->file('file'), $orgName);
        $thumbnails = $this->createThumbnail(Storage::disk('public')->path($pathStore. '/'. $orgName), Storage::disk('public')->path($pathStore));

        if(empty($thumbnails['medium']) || empty($thumbnails['small'])){
            return $this->create(['name' => $orgName, 'path_org' => $fileStore, 'type' => $extension ]);
        } else {
            return $this->create(['name' => $orgName, 'path_org' => $fileStore, 'path_medium'    => $pathStore. '/'. $thumbnails['medium'], 'path_small'  => $pathStore. '/'. $thumbnails['small'], 'type' => $extension ]);
        }

    }

    /**
     * Create thumbnail image
     * @param String $path: File image to resize
     * @param String $destination: Directory to store
     * @return array: File name in $destination stored
     */
    private function createThumbnail($path, $destination){
        /**
         * Check is image or not
         */
        if(!getimagesize($path)){
            return null;
        }
        // create an image manager instance with favored driver
        $manager = new ImageManager();
        // to finally create image instances
        $medium = config('media.thumbnail.medium');
        $small = config('media.thumbnail.small');

        $image = $manager->make($path)->resize($medium[0], $medium[1]);
        $mediumPath = $image->filename. '_medium.'.$image->extension;
        $smallPath = $image->filename. '_small.'.$image->extension;
        $image->save($destination. '/'. $mediumPath);
        $image = $manager->make($path)->resize($small[0], $small[1]);
        $image->save($destination. '/'. $smallPath);

        return ['small' => $smallPath, 'medium' => $mediumPath];
    }

    /**
     * Remove file
     * @param int $id
     * @return bool
     */
    public function delete($id)
    {
        $file = $this->repositories->get($id);
        Storage::disk('public')->delete([$file->path_org, $file->path_medium, $file->path_small]);
        return $this->repositories->delete($id);
    }
}