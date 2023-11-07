<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Publisher
 *
 * @property $PublisherID
 * @property $PublisherName
 * @property $IsActive
 * @property $CreatedDate
 * @property $CreatedBy
 * @property $ModifiedDate
 * @property $ModifiedBy
 *
 * @property Book[] $books
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Publisher extends Model
{
  protected $table = "Publisher";
  protected $primaryKey = "PublisherID";
    static $rules = [
		'PublisherName' => 'required',
    ];

    protected $perPage = 20;

    const CREATED_AT = "CreatedDate";
    const UPDATED_AT = "ModifiedDate";

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['PublisherName','IsActive','CreatedBy','ModifiedBy'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function books()
    {
        return $this->hasMany('App\Models\admin\Book', 'PublisherID', 'PublisherID');
    }


}
