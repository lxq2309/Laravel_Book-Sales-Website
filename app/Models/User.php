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

    protected $primaryKey = 'UserID';
}
