<?php

namespace App\Models\Laravel;

use App\Models\Laravel\Base\User as BaseUser;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Joselfonseca\LighthouseGraphQLPassport\HasSocialLogin;

class User extends BaseUser
{
	use HasApiTokens;
	use Notifiable;
	use HasSocialLogin;

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'name',
		'email',
		'email_verified_at',
		'password',
		'remember_token'
	];
}
