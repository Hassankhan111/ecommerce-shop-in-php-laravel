<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use function Laravel\Prompts\password;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements AuthenticatableContract
{
    use HasFactory, Notifiable;
  public $table = 'users';
    public $primaryKey = 'userId';
   protected $fillable = [
    'fullname',
    'username',
    'phone',
    'email',
    'password',
    'address',
   ];

   protected function casts(){

   return [
           'password' => 'hashed',
   ];

   }
}
