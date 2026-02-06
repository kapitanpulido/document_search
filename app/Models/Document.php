<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

use OwenIt\Auditing\Contracts\Auditable as Auditing;
use \OwenIt\Auditing\Auditable;

class Document extends Model implements Auditing
{
  use SoftDeletes, Auditable;


	protected $connection = 'mysql';

	
	protected $dates = [
    'created_at',
    'updated_at',
    'deleted_at'
  ];
	

  protected $fillable = [
    'filename',
    'filepath',
    'filetype',
    'content_text',
  ];


  

  /* =================== */


	public function getEncryptedIdAttribute()
  {
    return encrypt($this->id);
  }


}
