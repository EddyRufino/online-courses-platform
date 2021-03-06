<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    const PUBLISHED = 1;
    const PENDING = 2;
    const REJECTED = 3;

    protected $withCount = ['reviews', 'students'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function pathAttachment()
    {
        return '/images/courses/' . $this->picture;
    }

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function goals()
    {
    	return $this->hasMany(Goal::class);
    }

    public function level()
    {
    	return $this->belongsTo(Level::class);
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
    	return $this->belongsToMany(Student::class);
    }

    public function teacher()
    {
    	return $this->belongsTo(Teacher::class);
    }

    public function getCustomRatingAttribute()
    {
        return $this->reviews->avg('rating');
    }

    public function relatedCourses () {
        return Course::with('reviews')->whereCategoryId($this->category->id)
            ->where('id', '!=', $this->id)
            ->latest()
            ->limit(6)
            ->get();
    }
}
