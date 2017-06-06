<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coment extends Model
{

	protected $fillable = [
        'coment', 'user_id',
    ];

    public function user()
  {
    return $this->belongsTo('App\User');
  }
}
