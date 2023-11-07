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
        'SetTitle' => 'required',
        'SetAvatar' => 'image|mimes:jpeg,png,jpg,gif'
    ];

    protected $perPage = 20;

    const CREATED_AT = "CreatedDate";
    const UPDATED_AT = "ModifiedDate";

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['SetTitle', 'SetAvatar', 'Description', 'CreatedBy', 'ModifiedBy'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function books()
    {
        return $this->hasMany('App\Models\admin\Book', 'SetID', 'SetID');
    }


}
