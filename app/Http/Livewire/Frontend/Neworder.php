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
use App\Models\Cartorderforms;
use Illuminate\Http\Request;
use App\Models\Tempaddtocart;
use Illuminate\Validation\Rule;

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
	
	
	public $project_name;
    public $address;
    public $city;
    public $zip_code;
    public $state;
    public $country;
    public $mobile;
    public $project_type;
	
    public $room_names;
    public $edit_id =0;
    public $project_name_label;
    public $total_cart_price = 0;
    public $exists_cart_data = false;
    public $list_add_to_cart;
    public $product_details;
    public $room_validation  = false;
	protected $listeners = ['projectTypeSelected'];
	public $get_rooms;
	
	protected $rules = [
        'project_name' => 'required|string|max:255|unique:cartorderforms,project_name',
        'address' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'zip_code' => 'required|string|max:255',
        'state' => 'required|string|max:255',
        'country' => 'required|string|max:255',
        'mobile' => 'required|string|max:255',
        'project_type' => 'required|exists:projecttype,id',
    ];
	
	public function projectTypeSelected($value)
	{
		$this->project_type = $value;
		$this->edit_id  = 0;
	}
	public function addRoom()
    {
        if (!empty($this->roomName)) {
            $this->rooms[] = $this->roomName;
            $this->roomName = ''; // Clear the input field after adding
			
			$this->room_names = json_encode($this->rooms);
			$this->room_validation = false;			
        }
		else
		{
			$this->room_validation = true;
		}
		$this->edit_id  = 0;
    }
	public function mount()
    {		
        $this->limitPerLoad = config('custom.PRODUCT_LIST_SHOW_NEW_ORDER');
    }
	public function submitNewOrderForm()
    {
        $this->validate();
		//dd($this->project_type);
		$rm = !empty(json_decode($this->room_names)) ? implode(',', json_decode($this->room_names)) : '';
		
		if($this->edit_id==0)
		{
			$model=new Cartorderforms();
			$model->project_name	=	$this->project_name;
			$model->address			=	$this->address;
			$model->city			=	$this->city;
			$model->zip_code		=	$this->zip_code;
			$model->state			=   $this->state;
			$model->country			=   $this->country;
			$model->mobile			=   $this->mobile;
			$model->project_type	=   $this->project_type  ?? 0;
			$model->room_name		=   $rm;
			$model->status			=   1;
			$model->created_at		=   date('Y-m-d h:i:s');
			$model->save();
			$this->edit_id  =  $model->id;
			
			//$this->dispatchBrowserEvent('show-success-message', ['message' => 'Successfully Submitted']);
		}
		else
		{
			$model=Cartorderforms::find($this->edit_id);
			$model->project_name	=	$this->project_name;
			$model->address			=	$this->address;
			$model->city			=	$this->city;
			$model->zip_code		=	$this->zip_code;
			$model->state			=   $this->state;
			$model->country			=   $this->country;
			$model->mobile			=   $this->mobile;
			$model->project_type	=   $this->project_type  ?? 0;
			$model->room_name		=   $rm;
			$model->status			=   1;
			$model->created_at		=   date('Y-m-d h:i:s');
			$model->updated_at=date('Y-m-d H:i:s');
			$model->save();
			$this->edit_id  =  $this->edit_id;
		}
		$this->get_rooms    = $rm;
		$this->new_order_form = false;
		$this->view_order_form = true;
		$this->exists_cart_data = false;
		$this->project_name_label = $this->project_name;
    }
	public function addToCart($productId)
    {
        $product = Products::find($productId);
		//dd($product);
        if ($product) {
            $model=new Tempaddtocart();
			$model->user_id			=	auth()->user()->id;
			$model->product_id		=	$productId;
			$model->product_name	=	$product->name;
			$model->price			=	$product->price;
			$model->length			=	$product->length;
			$model->breadth			=	$product->breadth;
			$model->deep			=   $product->deep;
			$model->save();
        }
		
		$this->new_order_form = false;
		$this->view_order_form = true;
		$this->exists_cart_data = true;
		if(auth()->check()) {
			$this->list_add_to_cart = Tempaddtocart::where('user_id', auth()->user()->id)->get();
			$this->total_cart_price =  Tempaddtocart::where('user_id', auth()->user()->id)->sum('price');
		}
    }
	public function deleteFromCart($cartId)
	{
		Tempaddtocart::where(['user_id'=>auth()->user()->id,'id'=>$cartId])->delete();
		$this->new_order_form = false;
		$this->view_order_form = true;
		$this->exists_cart_data = true;
		if(auth()->check()) {
			$this->list_add_to_cart = Tempaddtocart::where('user_id', auth()->user()->id)->get();
			$this->total_cart_price =  Tempaddtocart::where('user_id', auth()->user()->id)->sum('price');
			$emptyCart = !Tempaddtocart::where('user_id', auth()->user()->id)->exists();
			if($emptyCart)
			{
				$this->exists_cart_data = false;
			}
		}
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
	public function open_customise_form($productId)
    {
		$this->product_details = Products::where('id',$productId)->first();
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
