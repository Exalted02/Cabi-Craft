<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class Browsecatalogue extends Component
{
	public function mount()
    {
        // dd(18);
    }
    public function render()
    {
        return view('livewire.frontend.browsecatalogue')->with([
            'data' =>  [],
        ]);
    }
}
