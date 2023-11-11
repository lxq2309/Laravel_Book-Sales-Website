<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BookImage
 *
 * @property $ImageID
 * @property $BookID
 * @property $ImagePath
 * @property $Description
 *
 * @property Book $book
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class BookImage extends Model
{
    protected $table = "BookImage";
    protected $primaryKey = "ImageID";
    static $rules = [
        'ImageID' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['ImageID', 'BookID', 'ImagePath', 'Description'];

    public $timestamps = false;


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function book()
    {
        return $this->hasOne('App\Models\admin\Book', 'BookID', 'BookID');
    }


}
