<?php

namespace App\Models\admin;

use App\Models\admin\ShoppingCartDetail;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Book
 *
 * @property $BookID
 * @property $BookTitle
 * @property $Author
 * @property $PublisherID
 * @property $CostPrice
 * @property $SellingPrice
 * @property $QuantityInStock
 * @property $PageCount
 * @property $Weight
 * @property $Avatar
 * @property $CoverStyle
 * @property $Size
 * @property $YearPublished
 * @property $Description
 * @property $SetID
 * @property $ViewCount
 * @property $CreatedDate
 * @property $CreatedBy
 * @property $ModifiedDate
 * @property $ModifiedBy
 *
 * @property Bookgenre $bookgenre
 * @property Bookimage[] $bookimages
 * @property Bookset $bookset
 * @property Publisher $publisher
 * @property Purchaseorderdetail[] $purchaseorderdetails
 * @property Review[] $reviews
 * @property Salesorderdetail[] $salesorderdetails
 * @property Shoppingcartdetail[] $shoppingcartdetails
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Book extends Model
{
    protected $table = "Book";
    protected $primaryKey = "BookID";

    const CREATED_AT = "CreatedDate";
    const UPDATED_AT = "ModifiedDate";

    static $rules = [
		'BookTitle' => 'required',
        'Author' => 'required',
        'PublisherID' => 'required',
        'CostPrice' => 'required',
        'SellingPrice' => 'required',
        'PageCount' => 'required',
        'Weight' => 'required',
        'CoverStyle' => 'required',
        'YearPublished' => 'required'
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['BookTitle','Author','PublisherID','CostPrice','SellingPrice','PageCount','Weight','Avatar','CoverStyle', 'Size','YearPublished','Description','SetID','CreatedBy','ModifiedBy'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function bookgenre()
    {
        return $this->hasMany('App\Models\admin\BookGenre', 'BookID', 'BookID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bookimages()
    {
        return $this->hasMany('App\Models\admin\BookImage', 'BookID', 'BookID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function bookset()
    {
        return $this->hasOne('App\Models\admin\Bookset', 'SetID', 'SetID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function publisher()
    {
        return $this->hasOne('App\Models\admin\Publisher', 'PublisherID', 'PublisherID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function purchaseorderdetails()
    {
        return $this->hasMany('App\Models\admin\PurchaseOrderDetail', 'BookID', 'BookID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews()
    {
        return $this->hasMany('App\Models\admin\Review', 'BookID', 'BookID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function salesorderdetails()
    {
        return $this->hasMany('App\Models\admin\SalesOrderDetail', 'BookID', 'BookID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function shoppingcartdetails()
    {
        return $this->hasMany('App\Models\Shoppingcartdetail', 'BookID', 'BookID');
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'BookGenre', 'BookID', 'GenreID');
    }

    public function getCostPriceAttribute()
    {
        if (empty($this->attributes['CostPrice']))
        {
            return 0;
        }
        return $this->attributes['CostPrice'] * 1000;
    }

    public function setCostPriceAttribute($val)
    {
        $this->attributes['CostPrice'] = $val / 1000;
    }

    public function getSellingPriceAttribute()
    {
        if (empty($this->attributes['SellingPrice']))
        {
            return 0;
        }
        return $this->attributes['SellingPrice'] * 1000;
    }

    public function setSellingPriceAttribute($val)
    {
        $this->attributes['SellingPrice'] = $val / 1000;
    }

    public function getWeightAttribute()
    {
        if (empty($this->attributes['Weight']))
        {
            return 0;
        }
        return $this->attributes['Weight'] * 1000;
    }

    public function setWeightAttribute($val)
    {
        $this->attributes['Weight'] = $val / 1000;
    }



}
