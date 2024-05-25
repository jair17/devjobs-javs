<?php

namespace App\Livewire;

use Livewire\Component;

class ShowVacant extends Component
{
    public $vacant;

    public function render()
    {
        return view('livewire.show-vacant');
    }
}
