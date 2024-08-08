<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class Browsecatalogue extends Component
{
	public $new_order_form = true;
	public $view_order_form = false;
	public $kitchen_properties_form = false;
	public $customise_form = false;
	public $project_name = '';
	
	public function mount()
    {
		dd($this->project_name);
    }
	public function submit_new_order_form()
    {
        $this->new_order_form = false;
        $this->view_order_form = true;
    }
	public function edit_new_order_form()
    {
        $this->new_order_form = true;
        $this->view_order_form = false;
    }
	public function open_kitchen_properties_form()
    {
        $this->view_order_form = false;
        $this->kitchen_properties_form = true;
    }
	public function open_customise_form()
    {
        $this->kitchen_properties_form = false;
        $this->view_order_form = false;
        $this->customise_form = true;
    }
	public function return_view_order_form()
    {
        $this->new_order_form = false;
        $this->kitchen_properties_form = false;
        $this->customise_form = false;
        $this->view_order_form = true;
    }
    public function render()
    {
        return view('livewire.frontend.browsecatalogue')->with([
            'data' =>  [],
        ]);
    }
}
