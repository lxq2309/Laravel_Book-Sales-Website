<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Authenticatable
{
    use HasFactory;

    use AuthenticableTrait;

    protected $table = "User";

    protected $fillable = [
        'UserName',
        'Password',
        'Email',
        'FirstName',
        'LastName',
        'Gender',
        'PhoneNumber',
        'DateOfBirth',
    ];

    public $timestamps = false;

    // // Create an alias for the "Email" field
    // public function getEmailAttribute()
    // {
    //     return $this->attributes['Email'];
    // }

    // // Create an alias for the "Password" field
    // public function getPasswordAttribute()
    // {
    //     return $this->attributes['Password'];
    // }
}
