<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

use OwenIt\Auditing\Contracts\Auditable as Auditing;
use \OwenIt\Auditing\Auditable;

class User extends Authenticatable implements Auditing
{
  use SoftDeletes, Notifiable, Auditable;
	
	
	protected $dates = [
		'created_at',
		'updated_at',
		'deleted_at'
	];


	protected $fillable = [
		'name',
		'email',
		'password',
		'is_active'
	];


	protected $casts = [
		'id'        		=> 'integer',
		'name'      		=> 'string',
		'email'     		=> 'string',
		'password'  		=> 'string',
		'is_active' 		=> 'boolean'
	];


	protected $hidden = [
		'password',
		'remember_token'
	];


	/* =================== */


	public function getEncryptedIdAttribute()
  {
    return encrypt($this->id);
  }


	public function scopeActive($query)
	{
		return $query->where('is_active', 1);
	}
}
