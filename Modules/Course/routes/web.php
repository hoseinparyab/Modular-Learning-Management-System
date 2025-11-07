<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth'], 'prefix' => 'panel'], function () {
    Route::get('courses', \Modules\Course\Livewire\Courses::class)->name('panel.courses');
    Route::get('teacher-courses', \Modules\Course\Livewire\TeachaerCourses::class)->name('panel.teacher-courses');
Route::get('add_course', \Modules\Course\Livewire\AddCourse::class)->name('panel.add_course');
Route::get('course/{course_id}/details', \Modules\Course\Livewire\CourseDetail::class)->name('panel.course_details');
});
