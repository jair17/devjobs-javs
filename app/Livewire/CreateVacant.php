<?php

namespace App\Livewire;

use App\Models\Salary;
use App\Models\Vacant;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateVacant extends Component
{
    use WithFileUploads;

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
    #[Validate('required|image|max:1024')]
    public $image;

    public function save()
    {
        $data = $this->validate();
        $image = $this->image->store('public/vacants');
        $imageName = str_replace('public/vacants/', '', $image);

        Vacant::create([
            'title' => $data['title'],
            'salary_id' => $data['salary_id'],
            'category_id' => $data['category_id'],
            'company' => $data['company'],
            'last_day' => $data['last_day'],
            'description' => $data['description'],
            'image' => $imageName,
            'user_id' => auth()->user()->id
        ]);
        session()->flash('message',__('The vacant has been created successfully!'));

        return redirect()->route('vacants.index');
    }

    public function render()
    {
        return view('livewire.create-vacant');
    }
}
