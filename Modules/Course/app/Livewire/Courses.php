<?php

namespace Modules\Course\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Course\app\Enums\CourseStatus;
use Modules\Course\Models\Course;
use Modules\User\app\Models\User;

class Courses extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';


    public function changeCourseStatus($course_id)
    {
        $course = Course::query()->findOrFail($course_id);
        if($course->status == CourseStatus::Draft->value){
            $course->update([
                'status' => CourseStatus::Active->value
            ]);
        }else if($course->status == CourseStatus::Active->value){
            $course->update([
                'status' => CourseStatus::Rejected->value
            ]);
        }else if($course->status == CourseStatus::Rejected->value){
            $course->update([
                'status' => CourseStatus::Archived->value
            ]);
        }else if($course->status == CourseStatus::Archived->value){
            $course->update([
                'status' => CourseStatus::Draft->value
            ]);
        }
    }
    #[Layout('panel::layouts.app'),Title('لیست دوره ها')]
    public function render():View
    {
        $courses = Course::query()->paginate(10);
        return view('course::livewire.courses', compact('courses'));
    }
}