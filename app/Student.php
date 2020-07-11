<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
	protected $fillable = ['user_id', 'title'];

    public function courses()
    {
    	return $this->belongToMany(Course::class);
    }

    public function user()
    {
    	return $this->belongTo(User::class)->select('id', 'role_id', 'name', 'email');
    }
}
