<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class User extends Model implements Authenticatable
{
    use HasFactory;

    use AuthenticableTrait;

    protected $table = "User";

    protected $primaryKey = 'UserID';


    protected $fillable = [
        'UserName',
        'password',
        'email',
        'FirstName',
        'LastName',
        'Gender',
        'PhoneNumber',
        'DateOfBirth',
        'ModifiedDate',
    ];

    public $timestamps = false;

    protected static function boot()
    {
        parent::boot();

        static::updating(function ($user) {
            $user->ModifiedDate = Carbon::now('Asia/Bangkok');
        });
    }
}
