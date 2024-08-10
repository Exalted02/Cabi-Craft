<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Products;
use App\Models\Exposide;
use App\Models\Cabinet;
use App\Models\Material;
use App\Models\ShutterMaterial;
use App\Models\Legtype;
use App\Models\Handeltype;
use App\Models\Projecttype;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;

class Neworder extends Component
{
	public $new_order_form = true;
	public $view_order_form = false;
	public $kitchen_properties_form = false;
	public $customise_form = false;
	
	public $search;
	public $limitPerLoad = '';
	
	public $widthEnabled = true;
    public $lengthEnabled = true;
    public $deepEnabled = true;
	
	public $roomName = '';
    public $rooms = [];
	
	public function addRoom()
    {
        if (!empty($this->roomName)) {
            $this->rooms[] = $this->roomName;
            $this->roomName = ''; // Clear the input field after adding
        }
    }
	public function mount()
    {		
        $this->limitPerLoad = config('custom.PRODUCT_LIST_SHOW_NEW_ORDER');
    }
	public function seeMore()
    {
        $this->limitPerLoad = $this->limitPerLoad + config('custom.LOAD_MORE_INTERVAL_NEW_ORDER');
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
		//$this->load_product();
        return view('livewire.frontend.neworder')->with([
            //'products' =>  $this->products,
			'products' => Products::query()
                ->where('status', '!=', 2)
                ->where(function (Builder $query) {
                    if ($this->search) {
                        $query->where('name', 'like', '%' . $this->search . '%')
							->orWhere('price', 'like', '%' . $this->search . '%')
							->orWhere('size', 'like', '%' . $this->search . '%');
                    }
                })->paginate($this->limitPerLoad),
			'exposide' =>  Exposide::all(),
			'expocolour' =>  DB::table('expo_shutter_colour')->where('status', '!=', 2)->get(),
			'shutter_finish' =>  DB::table('expo_shutter_colour')->where('status', '!=', 2)->get(),
			'box_inner_laminate' =>  Cabinet::where('status', '!=', 2)->get(),
			'material' =>  Material::where('status', '!=', 2)->get(),
			'shutter_material' =>  ShutterMaterial::where('status', '!=', 2)->get(),
			'legtype' =>  Legtype::where('status', '!=', 2)->get(),
			'handeltype' =>  Handeltype::where('status', '!=', 2)->get(),
			'projecttype' =>  DB::table('projecttype')->where('status', '!=', 2)->get(),
        ]);
    }
}
