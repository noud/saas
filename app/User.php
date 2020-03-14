<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Joselfonseca\LighthouseGraphQLPassport\HasLoggedInTokens;
use Joselfonseca\LighthouseGraphQLPassport\HasSocialLogin;
use Joselfonseca\LighthouseGraphQLPassport\MustVerifyEmailGraphQL;

class User extends Authenticatable
{
    // Authentication

    // use HasApiTokens;
    use HasSocialLogin;
    use MustVerifyEmailGraphQL;
    use HasLoggedInTokens;
    use Notifiable;
	
	public function withAccessToken()
	{
        return true;
    }

    // Attributes

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
