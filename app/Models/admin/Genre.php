<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Genre
 *
 * @property $GenreID
 * @property $GenreName
 * @property $CategoryID
 * @property $CreatedDate
 * @property $CreatedBy
 * @property $ModifiedDate
 * @property $ModifiedBy
 *
 * @property Bookgenre[] $bookgenres
 * @property Category $category
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Genre extends Model
{
    protected $table = "Genre";
    protected $primaryKey = "GenreID";
    static $rules = [
        'GenreName' => 'required',
    ];

    protected $perPage = 20;

    const CREATED_AT = "CreatedDate";
    const UPDATED_AT = "ModifiedDate";

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['GenreName', 'CategoryID', 'CreatedBy', 'ModifiedBy'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bookgenres()
    {
        return $this->hasMany('App\Models\admin\BookGenre', 'GenreID', 'GenreID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function category()
    {
        return $this->hasOne('App\Models\admin\Category', 'CategoryID', 'CategoryID');
    }


}
