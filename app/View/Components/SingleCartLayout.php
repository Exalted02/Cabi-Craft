<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class SingleCartLayout extends Component
{
	public $id;
    /**
     * Get the view / contents that represents the component.
     */
	public function __construct($id)
    {
        $this->id = $id;
    }
    public function render(): View
    {
        return view('_includes.single-cart');
    }
}
