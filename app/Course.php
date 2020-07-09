<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    const PUBLISHED = 1;
    const PENDING = 2;
    const REJECTED = 3;

    public function category()
    {
    	return $this->belongTo(Category::class);
    }

    public function goals()
    {
    	return $this->hasMany(Goal::class);
    }

    public function level()
    {
    	return $this->belongTo(Level::class);
    }

    public function reviews()
    {
    	return $this->hasMany(Review::class);
    }

    public function requirements()
    {
    	return $this->hasMany(Requirement::class);
    }

    public function students()
    {
    	return $this->belongToMany(Student::class);
    }

    public function teacher()
    {
    	return $this->belongTo(Teacher::class);
    }
}
