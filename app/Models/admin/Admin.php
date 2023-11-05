<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Admin
 *
 * @property $AdminID
 * @property $Email
 * @property $Password
 * @property $FullName
 * @property $PhoneNumber
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Admin extends Model
{
  protected $table = "Admin";
  protected $primaryKey = "AdminID";

  static $rules = [
    'AdminID' => 'required',
  ];

  protected $perPage = 20;

  /**
   * Attributes that should be mass-assignable.
   *
   * @var array
   */
  protected $fillable = ['AdminID', 'Email', 'Password', 'FullName', 'PhoneNumber'];



}
