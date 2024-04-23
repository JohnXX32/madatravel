<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\Authenticatable;

class Admins extends Model  implements Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'admins';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function login($email,$password){
        $tab=User::fromQuery("select * from admins where email='".$email."' and password='".$password."'");
        $id=0;
        if(count($tab)==0){
            return null;
        }
        return $tab[0];
    }

    public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    // Méthodes non utilisées dans cette application, laissées telles quelles

    public function getRememberToken()
    {
        // Implémentez la logique correspondante si nécessaire
    }

    public function setRememberToken($value)
    {
        // Implémentez la logique correspondante si nécessaire
    }

    public function getRememberTokenName()
    {
        // Implémentez la logique correspondante si nécessaire
    }
    
}
