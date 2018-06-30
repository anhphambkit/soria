<?php
namespace Packages\Media\Entities;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['path_org', 'path_medium', 'path_small', 'name', 'type'];
}