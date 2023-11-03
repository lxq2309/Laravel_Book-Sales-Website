<?php

namespace App\Models\admin;

use App\Models\Shippingaddress;
use App\Models\Shoppingcart;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 *
 * @property $UserID
 * @property $UserName
 * @property $password
 * @property $email
 * @property $FirstName
 * @property $LastName
 * @property $Gender
 * @property $PhoneNumber
 * @property $DateOfBirth
 * @property $CreatedDate
 * @property $ModifiedDate
 * @property $ConfirmCode
 *
 * @property Review[] $reviews
 * @property Salesorder[] $salesorders
 * @property Shippingaddress[] $shippingaddresses
 * @property Shoppingcart[] $shoppingcarts
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class User extends Model
{
    protected $table = "User";
    protected $primaryKey = "UserID";
    const UPDATED_AT = "ModifiedDate";
    const CREATED_AT = "CreatedDate";
    static $rules = [
		'UserName' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['UserName','password','email','FirstName','LastName','Gender','PhoneNumber','DateOfBirth'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews()
    {
        return $this->hasMany('App\Models\admin\Review', 'UserID', 'UserID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function salesorders()
    {
        return $this->hasMany('App\Models\admin\SalesOrder', 'UserID', 'UserID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function shippingaddresses()
    {
        return $this->hasMany('App\Models\Shippingaddress', 'UserID', 'UserID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function shoppingcarts()
    {
        return $this->hasMany('App\Models\Shoppingcart', 'UserID', 'UserID');
    }


}
