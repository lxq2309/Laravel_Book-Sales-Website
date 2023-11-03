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
  protected $table = "Categoy";
  protected $primaryKey = "CategoryID";
  static $rules = [
    'CategoryID' => 'required',
  ];

  protected $perPage = 20;

  /**
   * Attributes that should be mass-assignable.
   *
   * @var array
   */
  protected $fillable = ['CategoryID', 'CategoryName', 'CreatedDate', 'CreatedBy', 'ModifiedDate', 'ModifiedBy'];


  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function genres()
  {
    return $this->hasMany('App\Models\admin\Genre', 'CategoryID', 'CategoryID');
  }


}
