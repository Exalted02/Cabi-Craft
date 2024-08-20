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

class KitchenModalFormComponent extends Component
{
	public $modal_room_cabinet_material;
    public $modal_room_box_inner_lam;
    public $modal_room_shutter_material;
    public $modal_room_shutter_finish;
    public $modal_room_skt_type;
    public $modal_room_skt_height;
    public $modal_room_handeltype_val;
    
	protected $listeners = ['updateCabinetMaterial'];
    protected $rules = [
        'modal_room_cabinet_material' => 'required|string|max:255',
        'modal_room_box_inner_lam' => 'required|string|max:255',
        'modal_room_shutter_material' => 'required|string|max:255',
        'modal_room_shutter_finish' => 'required|string|max:255',
        'modal_room_skt_type' => 'required|string|max:255',
        'modal_room_skt_height' => 'required|string|max:255',
        'modal_room_handeltype_val' => 'required|string|max:255',
    ];
    
	public function updateCabinetMaterial($value)
    {
        $this->modal_room_cabinet_material = $value;
		//$this->emit('modal_room_cabinet_material', $value);
		//$this->dispatchBrowserEvent('openRoomDetailsModal', ['status' => 'false']);
    }
    public function submitModalKitchenOrderForm()
    {
		dd($this->modal_room_cabinet_material);
        $this->validate();

        // Perform the action you need on successful validation
        // For example, save the data to the database
        // ...

        // Optionally, close the modal and reset the form
        //$this->reset();
        //$this->dispatchBrowserEvent('modalClosed');
    }
    public function render()
    {

        return view('livewire.frontend.kitchen-modal-form-component')->with([
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
