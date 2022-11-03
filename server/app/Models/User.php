<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * 
 * @property int $id
 * @property string $role
 * @property string $fio
 * @property string $email
 * @property string $password
 * 
 * @property Collection|Application[] $applications
 *
 * @package App\Models
 */
class User extends Model
{
	protected $table = 'users';
	public $timestamps = false;

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'role',
		'fio',
		'email',
		'password'
	];

	public function applications()
	{
		return $this->hasMany(Application::class, 'author_id');
	}
}
