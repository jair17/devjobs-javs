<?php

namespace App\Livewire;

use App\Models\Vacant;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditVacant extends Component
{
    use WithFileUploads;

    public $vacant;
    #[Validate('required|string')]
    public $title = '';
    #[Validate('required|integer|exists:salaries,id')]
    public $salary_id;
    #[Validate('required|integer|exists:categories,id')]
    public $category_id;
    #[Validate('required|string')]
    public $company = '';
    #[Validate('required')]
    public $last_day;
    #[Validate('required|string')]
    public $description;

    public $image;
    #[Validate('nullable|image|max:1024')]
    public $new_image;

    public function mount(Vacant $vacant)
    {
        $this->vacant = $vacant;
        $this->title = $vacant->title;
        $this->salary_id = $vacant->salary_id;
        $this->category_id = $vacant->category_id;
        $this->company = $vacant->company;
        $this->last_day = $vacant->last_day;
        $this->description = $vacant->description;
        $this->image = $vacant->image;

    }
    public function edit(){
        $data = $this->validate();

        if ($this->new_image) {
            $imagePath = $this->new_image->store('public/vacants');
            $imageName = str_replace('public/vacants/', '', $imagePath);

            Storage::delete('public/vacants/' . $this->image);

            $data['image'] = $imageName;
        } else {
            $data['image'] = $this->vacant->image;
        }

        $this->vacant->update([
            'title' => $data['title'],
            'salary_id' => $data['salary_id'],
            'category_id' => $data['category_id'],
            'company' => $data['company'],
            'last_day' => $data['last_day'],
            'description' => $data['description'],
            'image' => $data['image']
        ]);

        session()->flash('message',__('The vacant has been updated successfully!'));

        return redirect()->route('vacants.index');
    }

    public function render()
    {
        return view('livewire.edit-vacant');
    }
}
