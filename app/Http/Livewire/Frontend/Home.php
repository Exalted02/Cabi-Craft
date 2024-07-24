<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class Home extends Component
{
	public function mount()
    {
        //dd(18);
    }
    public function render()
    {
        return view('livewire.frontend.home')->with([
            'data' =>  [],
        ]);
    }
}
