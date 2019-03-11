<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Intervention\Image\Facades\Image;
use App\Packages\SystemGeneral\Services\MediaServices;

class CompressAllImageFromStorage extends Command
{
    protected $mediaServices;
    protected $compressImage;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'image:compress';

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
        $compressImages = 0;
        $compressOther = 0;
        $this->scandirAndCompressImage("app/public/", $compressImages, $compressOther);
        print_r("Image Compress \n");
        print_r($compressImages);
        print_r("\n");
        print_r("Others: \n");
        print_r($compressOther);
        print_r("\n");
    }

    public function scandirAndCompressImage($path, &$compressImages, &$compressOther) {
        $files = preg_grep('/^([^.])/', scandir(storage_path($path)));
        foreach ($files as $file) {
            try {
                ob_start();
                if (is_file(storage_path("{$path}/{$file}"))) {
                    // Format File name:
                    $filename = basename(storage_path("{$path}/{$file}"));
                    $filenameExplode = explode('.', $filename);
                    $type = $this->mediaServices->getType($filenameExplode[1]);
                    if ($type == "images") {
                        $imageInstance = Image::make(storage_path("{$path}/{$file}"));
                        if (strpos($file, 'avatar.png') !== false) {
                            $imageInstance->resize(200, 200);
                            print_r("Resize \n");
                        }
                        $imageInstance->save(storage_path("{$path}/{$file}"), $this->compressImage);
                        $compressImages++;
                    }
                    else
                        $compressOther++;
                }
                else if (is_dir(storage_path("{$path}/{$file}")))
                    $this->scandirAndCompressImage("{$path}/{$file}", $compressImages, $compressOther);
                ob_clean();
                ob_end_flush();
            }
            catch (\Exception $e) {
                print_r("File Error \n");
                print_r("{$path}/{$file}");
                print_r("\n");
            }
        }
    }
}
