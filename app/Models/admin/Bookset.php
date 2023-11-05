<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Bookset
 *
 * @property $SetID
 * @property $SetTitle
 * @property $SetNumber
 * @property $SetAvatar
 * @property $CreatedDate
 * @property $CreatedBy
 * @property $ModifiedDate
 * @property $ModifiedBy
 *
 * @property Book[] $books
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Bookset extends Model
{
  protected $table = "BookSet";
  protected $primaryKey = "SetID";

  static $rules = [
    'SetID' => 'required',
  ];

  protected $perPage = 20;

  /**
   * Attributes that should be mass-assignable.
   *
   * @var array
   */
  protected $fillable = ['SetID', 'SetTitle', 'SetNumber', 'SetAvatar', 'CreatedDate', 'CreatedBy', 'ModifiedDate', 'ModifiedBy'];


  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function books()
  {
    return $this->hasMany('App\Models\admin\Book', 'SetID', 'SetID');
  }


}
