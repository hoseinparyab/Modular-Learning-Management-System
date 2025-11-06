<?php
namespace Modules\Course\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Category\Models\Category;
use Modules\Course\app\Enums\CourseStatus;
use Modules\Course\Models\Course;
use Modules\Panel\app\Helpers\helper;

class AddCourse extends Component
{
    use WithFileUploads;
    #[Rule('required')]
    public $category_id;
    #[Rule('required')]
    public $title;
    #[Rule('required')]
    public $price;
    #[Rule('required')]
    public $description;
    #[Rule('required')]
    public $level;
    #[Rule('required')]
    public $video;
    #[Rule('required|mimes:jpg,png')]
    public $image;

    public function createTeacherCourse(): void
    {

        $this->validate();

        $image_name = $this->image->hashName();
        $video_name = $this->video->hashName();

        $course = Course::query()->create([
            'user_id'     => auth()->user()->id,
            'category_id' => $this->category_id['value'],
            'title'       => $this->title,
            'slug'        => Helper::make_slug($this->title),
            'price'       => $this->price,
            'description' => $this->description,
            'level'       => $this->level['value'],
            'status'      => CourseStatus::Draft->value,
            'video'       => $video_name,
            'image'       => $image_name,
        ]);

        $this->image->store("images/courses/$course->title", 'public');
        $this->video->store("videos/courses/$course->title", 'public');

        session()->flash('message', 'دوره با موفقیت ثبت شد');
        $this->redirectRoute('panel.teacher-courses');

    }

    #[Layout('panel::layouts.app'), Title('اضافه کردن دوره')]
    public function render(): View
    {
        $categories = Category::query()->where('parent_id', '!=', 0)->pluck('title', 'id');
        return view('course::livewire.add-course', compact('categories'));
    }
}
