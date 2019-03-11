<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 11/11/18
 * Time: 16:31
 */

namespace App\Packages\SystemGeneral\Entities;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'media__files';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'filename', 'path_org', 'path_medium', 'path_small', 'extension',
        'mime_type', 'file_size', 'folder_id',
        'path_300x300', 'path_300x400', 'path_880x400', 'path_150x150', 'type'
    ];

    public $timestamps = true;
}