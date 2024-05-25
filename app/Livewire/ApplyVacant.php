<?php

namespace App\Livewire;

use App\Models\Vacant;
use App\Notifications\NewApplicantNotification;
use Illuminate\Support\Facades\Notification;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class ApplyVacant extends Component
{
    use WithFileUploads;
    #[Validate('required|mimes:pdf')]
    public $cv;
    public $vacant;

    public function mount(Vacant $vacant){
        $this->vacant = $vacant;
    }

    public function apply(){
        $data = $this->validate();
        $cv = $this->cv->store('public/cv');
        $data['cv'] = str_replace('public/cv/', '', $cv);
        $this->vacant->applicants()->create([
            'user_id' => auth()->user()->id,
            'cv' => $data['cv']
        ]);

        session()->flash('message',__('You have successfully applied for this vacancy'));

        $this->vacant->recluiter->notify(new NewApplicantNotification($this->vacant,auth()->user()->id));

        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.apply-vacant');
    }
}
