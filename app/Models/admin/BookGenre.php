<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BookGenre
 *
 * @property $BookID
 * @property $GenreID
 *
 * @property Book $book
 * @property Genre $genre
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class BookGenre extends Model
{
    protected $table = "BookGenre";
    protected $primaryKey = ["BookID", "GenreID"];
    public $incrementing = false;

    static $rules = [

    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['BookID', 'GenreID'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function book()
    {
        return $this->hasOne('App\Models\admin\Book', 'BookID', 'BookID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function genre()
    {
        return $this->hasOne('App\Models\admin\Genre', 'GenreID', 'GenreID');
    }


}
