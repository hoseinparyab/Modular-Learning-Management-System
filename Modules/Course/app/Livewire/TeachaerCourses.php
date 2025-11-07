<?php

namespace Modules\Course\Livewire;

use Livewire\Component;
use Modules\Course\Models\Course;
use Modules\Course\Enums\CourseStatus;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

class TeachaerCourses extends Component
{

    protected $paginationTheme = 'bootstrap';
    #[Layout('panel::layouts.app'), Title('دوره های من')]
     public function render()
    {
        $courses = Course::query()->where('user_id', auth()->user()->id)->paginate(10);
        return view('course::livewire.teachaer-courses', compact('courses'));
    }
    
}
