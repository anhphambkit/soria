<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 3/2/19
 * Time: 10:51
 */
namespace App\Packages\Shop\Entities;


use App\Packages\Shop\Constants\MainServiceConfig;
use Illuminate\Database\Eloquent\Model;

class MainService extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = MainServiceConfig::MAIN_SERVICES_TBL;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'desc',
        'icon',
        'order'
    ];

    public $timestamps = true;
}