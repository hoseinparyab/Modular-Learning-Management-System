<?php

namespace Modules\Course\Livewire;

use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Modules\Course\Models\Lesson;
use Modules\Course\Models\Season;
use Illuminate\Contracts\View\View;
use Modules\Course\Enums\LessonStatus;

class CourseDetail extends Component
{
    use WithFileUploads;

    public $course_id;
    #[Rule('required')]
    public $title;
    public $season_id;

   #[Rule('required')]
    public $lesson_title,$lesson_e_title,$video,$is_free;

    public $attachment;

    public function mount($course_id)
    {
        $this->course_id = $course_id;
    }

    public function addSeason()
    {
        $season =Season::query()->where('course_id', $this->course_id)->latest()->first();
        if($season){
            Season::query()->create([
                'user_id'=>auth()->user()->id,
                'course_id'=>$this->course_id,
                'title'=>$this->title,
                'priority'=>$season->priority+1,
            ]);
        }else{
            Season::query()->create([
                'user_id'=>auth()->user()->id,
                'course_id'=>$this->course_id,
                'title'=>$this->title,
                'priority'=>1,
            ]);
        }

        $this->dispatch('closeSeasonModal');


    }

    public function AddLesson()
    {
        $this->validate();
         if($this->attachment){
             $attachment_name = $this->attachment->hashName();
         }

        $video_name = $this->video->hashName();

        Lesson::query()->create([
            'user_id'=>auth()->user()->id,
            'season_id'=>$this->season_id,
            'title'=>$this->lesson_title,
            'e_title'=>$this->lesson_e_title,
            'status'=>LessonStatus::Draft->value,
            'video'=>$video_name,
            'attachment'=>$this->attachment ? $attachment_name : null,
            'is_free'=>$this->is_free ?? false,
        ]);

        $this->attachment->store("attachments/courses/$this->course_id/$this->season_id",'public');
        $this->video->store("videos/courses/$this->course_id/$this->season_id",'public');

        $this->dispatch('closeLessonModal');

    }
    #[Layout('panel::layouts.app'),Title('جزئیات دوره')]
    public function render():View
    {
        $seasons = Season::query()->where('course_id', $this->course_id)
            ->orderBy('priority','ASC')->get();
        return view('course::livewire.course-detail', compact('seasons'));
    }
}