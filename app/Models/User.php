<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

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
}
