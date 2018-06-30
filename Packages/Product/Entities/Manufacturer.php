<?php
namespace Packages\Product\Entities;
use Illuminate\Database\Eloquent\Model;
use Packages\Media\Entities\Media;

class Manufacturer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'logo_id', 'desc', 'establish_year', 'country', 'address', 'phone'];

    public function logo(){
        return $this->belongsTo(Media::class, 'logo_id');
    }
}