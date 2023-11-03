<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Supplier
 *
 * @property $SupplierID
 * @property $SupplierName
 * @property $IsActive
 * @property $CreatedDate
 * @property $CreatedBy
 * @property $ModifiedDate
 * @property $ModifiedBy
 *
 * @property Purchaseorder[] $purchaseorders
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Supplier extends Model
{
  protected $table = "Supplier";
  protected $primaryKey = "SupplierID";
  static $rules = [
    'SupplierID' => 'required',
  ];

  protected $perPage = 20;

  /**
   * Attributes that should be mass-assignable.
   *
   * @var array
   */
  protected $fillable = ['SupplierID', 'SupplierName', 'IsActive', 'CreatedDate', 'CreatedBy', 'ModifiedDate', 'ModifiedBy'];


  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function purchaseorders()
  {
    return $this->hasMany('App\Models\admin\PurchaseOrder', 'SupplierID', 'SupplierID');
  }


}
