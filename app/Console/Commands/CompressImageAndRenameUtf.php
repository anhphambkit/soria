<?php

namespace App\Console\Commands;

use function App\Helper\to_slug_helper;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use App\Packages\SystemGeneral\Services\MediaServices;

class CompressImageAndRenameUtf extends Command
{
    protected $mediaServices;
    protected $compressImage;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'image:format';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * CompressImageAndRenameUtf constructor.
     * @param MediaServices $mediaServices
     * @param int $compressImage
     */
    public function __construct(MediaServices $mediaServices, $compressImage = 80)
    {
        parent::__construct();
        $this->mediaServices = $mediaServices;
        $this->compressImage = $compressImage;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        ini_set('memory_limit', '-1');
        ini_set('max_execution_time', '-1');
        $images = DB::table('media__files')->where('type', 'images')->get();

        $updateImages = 0;
        $updateOther = 0;

        DB::transaction(function () use ($images, &$updateImages, &$updateOther) {
            foreach ($images as $image) {
                ob_start();
                $path = str_replace('storage/', 'public/', $image->path_org);

                // Format File name:
                $filenameExplode = explode('.', $image->filename);

                $filenameFormatted = to_slug_helper($filenameExplode[0]);

                $fileNameFormattedExt = "{$filenameFormatted}.{$filenameExplode[1]}";

                $filenameFormattedUnique = $fileNameFormattedExt;

                $type = $this->mediaServices->getType($filenameExplode[1]);

                if (!file_exists(storage_path("app/{$path}")) || empty($type)) {
                    DB::table('media__files')
                        ->where('id', $image->id)
                        ->delete();
                    if (file_exists(storage_path("app/{$path}")))
                        unlink(storage_path("app/{$path}"));
                }
                else {
                    $parts = explode('/', $path);
                    array_pop($parts);
                    $rootDir = implode('/', $parts);

                    $newPath = "{$rootDir}/{$filenameFormattedUnique}";

                    if ($type == "images") {
                        $imageInstance = Image::make(storage_path("app/{$path}"));

                        $imageInstance->save(storage_path("app/{$newPath}"), $this->compressImage);

                        // Create thumbnail 300x300:
                        $imagePath300x300 = $this->mediaServices->createThumbnail($path, $rootDir, $filenameFormattedUnique);

                        // Create thumbnail 300x400:
                        $imagePath300x400 = $this->mediaServices->createThumbnail($path, $rootDir, $filenameFormattedUnique, 300, 400);

                        // Create thumbnail 150x150:
                        $imagePath150x150 = $this->mediaServices->createThumbnail($path, $rootDir, $filenameFormattedUnique, 150, 150);

                        // Create thumbnail 880x400:
                        $imagePath880x400 = $this->mediaServices->createThumbnail($path, $rootDir, $filenameFormattedUnique, 880, 400);

                        // Get size after compress:
                        $fileSize = round($imageInstance->filesize()/(1024*8), 2);

                        DB::table('media__files')
                            ->where('id', $image->id)
                            ->update([
                                'filename' => $filenameFormattedUnique,
                                'path_org' => str_replace('public/', 'storage/', $newPath),
                                'path_300x300' => !empty($imagePath300x300) ? str_replace('public/', 'storage/', $imagePath300x300) : null,
                                'path_300x400' => !empty($imagePath300x400) ? str_replace('public/', 'storage/', $imagePath300x400) : null,
                                'path_880x400' => !empty($imagePath880x400) ? str_replace('public/', 'storage/', $imagePath880x400) : null,
                                'path_150x150' => !empty($imagePath150x150) ? str_replace('public/', 'storage/', $imagePath150x150) : null,
                                'file_size' => $fileSize . ' KB',
                            ]);
                        $updateImages++;
                    }
                    else {
                        DB::table('media__files')
                            ->where('id', $image->id)
                            ->update([
                                'filename' => $filenameFormattedUnique,
                                'path_org' => str_replace('public/', 'storage/', $newPath),
                                'type' => $type
                            ]);
                        $updateOther++;
                    }
                    ob_clean();
                    ob_end_flush();
                }
            }
        }, 3);

        print_r("Image Updated \n");
        print_r($updateImages);
        print_r("\n");
        print_r("Update Other: \n");
        print_r($updateOther);
        print_r("\n");
    }
}
