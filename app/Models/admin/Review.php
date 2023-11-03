<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Review
 *
 * @property $ReviewID
 * @property $BookID
 * @property $UserID
 * @property $Content
 * @property $Rating
 * @property $CreatedDate
 * @property $ModifiedDate
 *
 * @property Book $book
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Review extends Model
{
    protected $table = "Review";
    protected $primaryKey = "ReviewID";
    static $rules = [
        'ReviewID' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['ReviewID', 'BookID', 'UserID', 'Content', 'Rating', 'CreatedDate', 'ModifiedDate'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function book()
    {
        return $this->hasOne('App\Models\admin\Book', 'BookID', 'BookID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\admin\User', 'UserID', 'UserID');
    }


}
