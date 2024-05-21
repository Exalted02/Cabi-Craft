<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class MultiCartLayout extends Component
{
	public $id;
	public $page;
	public $qty;
    /**
     * Get the view / contents that represents the component.
     */
	public function __construct($id, $page, $qty)
    {
        $this->id = $id;
        $this->page = $page;
        $this->qty = $qty;
    }
    public function render(): View
    {
        return view('_includes.multi-cart');
    }
}
