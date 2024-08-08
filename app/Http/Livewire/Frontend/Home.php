<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
class Home extends Component
{
	public function mount()
    {
        //dd(18);
		
    }
    public function render()
    {
        return view('livewire.frontend.home')->with([
            'data' =>  DB::table('products')->where('status', '!=', 2)->get(),
        ]);
    }
}
