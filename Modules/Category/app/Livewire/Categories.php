<?php

namespace Modules\Category\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Category\Models\Category;

class Categories extends Component
{
    use WithPagination;

    public $parent_id=0;
    public $title;
    public $editedIndex;
    protected $paginationTheme = 'bootstrap';


    protected $rules = [
        'title' => 'required|string|min:3|max:255',
        'parent_id' => 'required|numeric'
    ];

    public function createCategory()
    {
        $validatedData = $this->validate();

        Category::query()->create([
            'title' => $validatedData['title'],
            'parent_id' => (int)$validatedData['parent_id'] ?? 0
        ]);

        $this->reset(['title', 'parent_id']);
        $this->dispatch('swal', [
            'title' => 'دسته‌بندی با موفقیت ایجاد شد',
            'timer' => 3000,
            'icon' => 'success',
            'toast' => true,
            'position' => 'top-end',
            'showConfirmButton' => false
        ]);
    }

    public function editRow($id)
    {
        $category = Category::query()->find($id);
        $this->title = $category->title;
        $this->parent_id = $category->parent_id;
        $this->editedIndex=$id;
    }

    public function updateRow()
    {
        $validatedData = $this->validate();

        $category = Category::query()->find($this->editedIndex);
        if ($category) {
            $category->update([
                'title' => $validatedData['title'],
                'parent_id' => (int)$validatedData['parent_id']
            ]);

            $this->reset(['title', 'parent_id', 'editedIndex']);
            $this->dispatch('swal', [
                'title' => 'دسته‌بندی با موفقیت ویرایش شد',
                'timer' => 3000,
                'icon' => 'success',
                'toast' => true,
                'position' => 'top-end',
                'showConfirmButton' => false
            ]);
        }
    }

    #[On('destroy-category')]
    public function destroyCategory($id)
    {
        $category = Category::find($id);
        if ($category) {
            $category->delete();
            $this->dispatch('swal', [
                'title' => 'دسته‌بندی با موفقیت حذف شد',
                'timer' => 3000,
                'icon' => 'success',
                'toast' => true,
                'position' => 'top-end',
                'showConfirmButton' => false
            ]);
        }
    }

    #[Layout('panel::layouts.app'),Title('دسته بندی ها')]
    public function render():View
    {
        $parentCategories=Category::query()->where('parent_id',0)->pluck('title','id');
        $categories = Category::query()->paginate(10);
        return view('category::livewire.categories',compact('categories','parentCategories'));
    }
}
