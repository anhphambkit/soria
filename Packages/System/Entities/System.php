<?php
namespace Packages\System\Entities;
use Illuminate\Database\Eloquent\Model;

class System extends Model
{
    protected $table = 'system_config';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];
}