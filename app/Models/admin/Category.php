<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 *
 * @property $CategoryID
 * @property $CategoryName
 * @property $CreatedDate
 * @property $CreatedBy
 * @property $ModifiedDate
 * @property $ModifiedBy
 *
 * @property Genre[] $genres
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Category extends Model
{
  protected $table = "Category";
  protected $primaryKey = "CategoryID";
  static $rules = [
    'CategoryName' => 'required',
  ];

  protected $perPage = 20;

    const CREATED_AT = "CreatedDate";
    const UPDATED_AT = "ModifiedDate";

  /**
   * Attributes that should be mass-assignable.
   *
   * @var array
   */
  protected $fillable = ['CategoryName', 'CreatedBy', 'ModifiedBy'];


  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function genres()
  {
    return $this->hasMany('App\Models\admin\Genre', 'CategoryID', 'CategoryID');
  }
}
