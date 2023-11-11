<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ShippingAddress
 *
 * @property $AddressID
 * @property $UserID
 * @property $FullName
 * @property $City
 * @property $District
 * @property $Ward
 * @property $Address
 * @property $PhoneNumber
 * @property $IsDefault
 *
 * @property Salesorder[] $salesorders
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ShippingAddress extends Model
{

    protected $table = "ShippingAddress";

    protected $primaryKey = "AddressID";

    static $rules = [
        'AddressID' => 'required',
    ];

    protected $perPage = 20;

    public $timestamps = false;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['AddressID','UserID','FullName','City','District','Ward','Address','PhoneNumber','IsDefault'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function salesorders()
    {
        return $this->hasMany('App\Models\Salesorder', 'ShippingAddressID', 'AddressID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'UserID', 'UserID');
    }


}
