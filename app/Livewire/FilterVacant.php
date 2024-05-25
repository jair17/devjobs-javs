<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Salary;
use Livewire\Attributes\On;
use Livewire\Component;

class FilterVacant extends Component
{

    public $term;
    public $category;
    public $salary;


    public function readDataSearch()
    {
        $this->dispatch('searchTerms', $this->term, $this->category, $this->salary);
    }

    public function render()
    {
        $salaries = Salary::all();
        $categories = Category::all();
        return view('livewire.filter-vacant', compact('salaries', 'categories'));
    }
}
