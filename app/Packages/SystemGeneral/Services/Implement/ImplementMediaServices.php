<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 7/15/18
 * Time: 11:54
 */

namespace App\Packages\SystemGeneral\Services\Implement;

use function App\Helper\to_slug_helper;
use App\Packages\SystemGeneral\Services\MediaServices;
use App\Packages\SystemGeneral\Entities\Media;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;

class ImplementMediaServices implements MediaServices{

    private $image_ext = ['jpg', 'jpeg', 'png', 'gif'];
    private $audio_ext = ['mp3', 'ogg', 'mpga'];
    private $video_ext = ['mp4', 'mpeg'];
    private $document_ext = ['doc', 'docx', 'pdf', 'odt', 'xlsx', 'xls'];

    /**
     * ImplementMediaServices constructor.
     */
    public function __construct()
    {
    }

    /**
     * @param $file
     * @param $rootPath
     * @param int $compressImage
     * @return mixed|\stdClass
     */
    public function storeMedia($file, $rootPath, $compressImage = 80)
    {
        $ext = $file->getClientOriginalExtension();
        $fileNameExt = $file->getClientOriginalName();

        $filenameWithoutExtension = $fileNameOnly = pathinfo($fileNameExt, PATHINFO_FILENAME);

        // Format File name:
        $filenameFormated = to_slug_helper($filenameWithoutExtension);

        $fileNameFormatedExt = "{$filenameFormated}.{$ext}";

        $filenameFormatedUnique = $this->getNewUniqueFilename($fileNameFormatedExt);

        $type = $this->getType($ext);

        $rootDir = $rootPath . '/' . $type;

        // If image, create thumbnail + compress image
        if ($type === "images") {
            // instance an image
            $newImage = Image::make($file->getRealPath());
            $path = "{$rootDir}/{$filenameFormatedUnique}";
            $newImage->save(storage_path("app/{$path}"), $compressImage);

            // Create thumbnail 300x300:
            $this->createThumbnail($file, $rootDir, $filenameFormatedUnique);

            // Create thumbnail 300x400:
            $this->createThumbnail($file, $rootDir, $filenameFormatedUnique, 300, 400);

            // Create thumbnail 150x150:
            $this->createThumbnail($file, $rootDir, $filenameFormatedUnique, 150, 150);

            // Create thumbnail 880x400:
            $this->createThumbnail($file, $rootDir, $filenameFormatedUnique, 880, 400);

            // Get size after compress:
            $fileSize = round($newImage->filesize()/(1024*8), 2);;
        }
        else {
            $path = Storage::putFileAs($rootDir, $file, $filenameFormatedUnique);
            $fileSize = round($file->getSize()/(1024*8), 2);
        }


        $media = Media::create([
            'filename' => $filenameFormatedUnique,
            'path_org' => str_replace('public/', 'storage/', $path),
            'mime_type' => $file->getClientOriginalExtension(),
            'type' => $type,
            'file_size' => $fileSize . ' KB',
            'folder_id' => 1,
        ]);

        $fileObject = new \stdClass();
        $fileObject->name = $filenameFormatedUnique;
        $fileObject->size = $fileSize;
        $fileObject->fileID = $media->id;
        $fileObject->url = str_replace('public/', 'storage/', $path);

        return $fileObject;
    }

    /**
     * Get type by extension
     * @param  string $ext Specific extension
     * @return string      Type
     */
    public function getType($ext)
    {
        $ext = strtolower($ext);
        if (in_array($ext, $this->image_ext)) {
            return 'images';
        }

        if (in_array($ext, $this->audio_ext)) {
            return 'audios';
        }

        if (in_array($ext, $this->video_ext)) {
            return 'videos';
        }

        if (in_array($ext, $this->document_ext)) {
            return 'documents';
        }
    }

    /**
     * Get all extensions
     * @return array Extensions of all file types
     */
    public function allExtensions()
    {
        return array_merge($this->image_ext, $this->audio_ext, $this->video_ext, $this->document_ext);
    }

    /**
     * Get directory for the specific user
     * @return string Specific user directory
     */
    public function getUserDir()
    {
//        return Auth::user()->name . '_' . Auth::id();
    }

    /**
     * @param $fileName
     * @return string
     */
    public function getNewUniqueFilename($fileName)
    {
        $fileNameOnly = pathinfo($fileName, PATHINFO_FILENAME);
        $fileExists = Media::where('filename', 'LIKE', "$fileNameOnly%")->orderBy('created_at', 'desc')->exists();
        $maxCurrentId = Media::max('id') + 1;
        if ($fileExists) {
            $extension = pathinfo($fileName, PATHINFO_EXTENSION);
            $fileNameFormat = $fileNameOnly . '_' . $maxCurrentId . '_' . Carbon::now()->timestamp . '.' . $extension;
            $lengthFileName = strlen($fileNameFormat);
            $maxLengthFileNameAccept = config('setting.max_length_file_name');
            if ($lengthFileName > $maxLengthFileNameAccept) // 255 length of filename in DB
                $fileNameFormat = substr($fileNameFormat, $lengthFileName - $maxLengthFileNameAccept);
            return $fileNameFormat;
        }
        return $fileName;
    }

    /**
     * @param $file
     * @param $rootDir
     * @param $filename
     * @param int $with
     * @param int $height
     * @param int $compressImage
     * @return mixed
     */
    public function createThumbnail($file, $rootDir, $filename, $with = 300, $height = 300, $compressImage = 80) {
        // Create thumbnail 300x300 image from file:
        $pathThumb = "app/{$rootDir}/thumbnail_{$with}x{$height}";
        $image = Image::make($file->getRealPath());
        if (!file_exists(storage_path($pathThumb))) {
            mkdir(storage_path($pathThumb), 0777);
        }
        $image->resize($with, $height)
            ->save(storage_path("{$pathThumb}/{$filename}"), $compressImage);
        return $image;
    }
}