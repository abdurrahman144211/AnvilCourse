<?php

namespace App\Services\Teaching\Courses;

use App\Models\Course;
use App\Services\ServiceAbstract;
use Illuminate\Support\Arr;

class CourseStoreService extends ServiceAbstract
{
    protected $fillableCourseFields = [
        'title', 'short_overview',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($course) {
            $course->slug = uniqid();
        });
    }

    public function __construct(Course $courses)
    {
        $this->courses = $courses;
    }

    public function handle($data = [])
    {
        $course =  $this->courses->create(Arr::only($data, $this->fillableCourseFields));

        $course->subjects()->attach($data['subjects']);

        return $course;
    }
}
