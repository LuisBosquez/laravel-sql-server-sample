<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    //
	public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
