<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Application
 * 
 * @property string $name
 * @property int $id
 * @property string|null $description
 * @property string|null $photo_url
 * @property int $category_id
 * @property int $author_id
 * @property string $status
 * @property Carbon $created_at
 * @property string|null $photo_after_url
 * @property string|null $reject_reason
 * 
 * @property Category $category
 * @property User $user
 *
 * @package App\Models
 */
class Application extends Model
{
	protected $table = 'applications';
	public $timestamps = false;

	protected $casts = [
		'category_id' => 'int',
		'author_id' => 'int'
	];

	protected $fillable = [
		'name',
		'description',
		'photo_url',
		'category_id',
		'author_id',
		'status',
		'photo_after_url',
		'reject_reason'
	];

	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'author_id');
	}
}
