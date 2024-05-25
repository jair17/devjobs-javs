<?php

namespace App\Livewire;

use App\Models\Vacant;
use Livewire\Attributes\On;
use Livewire\Component;

class ShowVacants extends Component
{

    #[On('OnDeleteVacant')]
    public function deleteVacant(Vacant $vacant) {
        $vacant->delete();
        $this->dispatch('deleted');
    }
    public function render()
    {
        $vacants = Vacant::where('user_id', auth()->user()->id)->paginate(10);
        return view('livewire.show-vacants', compact('vacants'));
    }
}
