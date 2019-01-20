<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 7/15/18
 * Time: 11:54
 */

namespace App\Packages\SystemGeneral\Services\Implement;

use App\Packages\SystemGeneral\Services\MediaServices;
use App\Packages\SystemGeneral\Entities\Media;
use Illuminate\Support\Facades\Storage;

class ImplementMediaServices implements MediaServices{

    private $image_ext = ['jpg', 'jpeg', 'png', 'gif'];
    private $audio_ext = ['mp3', 'ogg', 'mpga'];
    private $video_ext = ['mp4', 'mpeg'];
    private $document_ext = ['doc', 'docx', 'pdf', 'odt'];

    /**
     * ImplementMediaServices constructor.
     */
    public function __construct()
    {
    }

    /**
     * Store new file media
     * @param  $file
     * @param  $rootPath
     * @return mixed
     */
    public function storeMedia($file, $rootPath)
    {
        $ext = $file->getClientOriginalExtension();
        $fileNameExt = $file->getClientOriginalName();
        $type = $this->getType($ext);
        $rootDir = '/' . $rootPath . '/' . $type;
        $path = Storage::putFileAs($rootDir, $file, $fileNameExt);
        $fileSize = round($file->getSize()/(1024*8), 2);

        $media = Media::create([
            'filename' => $fileNameExt,
            'path_org' => str_replace('public/', 'storage/', $path),
            'mime_type' => $file->getClientOriginalExtension(),
            'type' => $type,
            'file_size' => $fileSize . ' KB',
            'folder_id' => 1,
        ]);

        $fileObject = new \stdClass();
        $fileObject->name = str_replace($rootDir, '',$file->getClientOriginalName());
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
}