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
use App\Models\Temporderroomtype;
//use App\Providers\RouteServiceProvider;

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
	protected $listeners = ['projectTypeSelected','roomTypeSelected','roomMaterialTypeSelected','roomBoxInnerTypeSelected','roomShutterTypeSelected','roomShFinishTypeSelected','roomSktTypeTypeSelected','roomSktHtTypeSelected','roomHandleTypeSelected','modalRoomHandleTypeSelected','submitModalKitchenOrderForm','modalRoomMaterialSelected','open_kitchen_properties_form'];
	//protected $listeners = ['roomTypeSelected'];
	public $get_rooms;
	public $hasRoomDetails = false;
	public $select_rooms;
	public $room_cabinet_material;
	public $room_box_inner_lam;
	public $room_shutter_material;
	public $room_shutter_finish;
	public $room_skt_type;
	public $room_skt_height;
	public $room_handeltype_val;
	public $select_room_type_validation = false;
	//public $indivisual_room_data;
	//public $user_order_dtls;
	public $modal_room_cabinet_material;
	public $modal_room_box_inner_lam;
	public $modal_room_shutter_material;
	public $modal_room_shutter_finish;
	public $modal_room_skt_type;
	public $modal_room_skt_height;
	public $modal_room_handeltype_val;
	
	protected $rulesForForm1  = [
        'project_name' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'zip_code' => 'required|string|max:255',
        'state' => 'required|string|max:255',
        'country' => 'required|string|max:255',
        'mobile' => 'required|string|max:255',
        'project_type' => 'required|exists:projecttype,id',
	];
	
	protected $rulesForForm2  = [
        'room_cabinet_material' => 'required|string|max:255',
        'room_box_inner_lam' => 'required|string|max:255',
        'room_shutter_material' => 'required|string|max:255',
        'room_shutter_finish' => 'required|string|max:255',
        'room_skt_type' => 'required|string|max:255',
        'room_skt_height' => 'required|string|max:255',
        'room_handeltype_val' => 'required|string|max:255',
    ];
	
	protected $rulesForForm3  = [
        'modal_room_cabinet_material' => 'required|string|max:255',
        'modal_room_box_inner_lam' => 'required|string|max:255',
        'modal_room_shutter_material' => 'required|string|max:255',
        'modal_room_shutter_finish' => 'required|string|max:255',
        'modal_room_skt_type' => 'required|string|max:255',
        'modal_room_skt_height' => 'required|string|max:255',
        'modal_room_handeltype_val' => 'required|string|max:255',
    ];
	
	public function projectTypeSelected($value)
	{
		//dd($value);
		$this->project_type = $value;
		$this->edit_id  = '';
	}
	public function roomTypeSelected($value)
	{
		$hasdetails = Temporderroomtype::where(['order_id'=>session()->get('session_order_id'),'user_id'=>auth()->user()->id,'id'=>$value])->first();
		if($hasdetails->cabinet_material!=0 || $hasdetails->box_Inner_laminate!=0 || $hasdetails->shutter_material!=0 || $hasdetails->shutter_finish!=0 || $hasdetails->skt_type!=0 || $hasdetails->skt_height!=0 || $hasdetails->handle_types)
		{
			//$this->dispatchBrowserEvent('openRoomDetailsModal','true');
			$this->dispatchBrowserEvent('openRoomDetailsModal', ['status' => 'true']);
			$this->hasRoomDetails = true;
			
		}
		else{
			$this->modal_room_cabinet_material 	= '';
			$this->modal_room_box_inner_lam 	= '';
			$this->modal_room_shutter_material 	= '';
			$this->modal_room_shutter_finish 	= '';
			$this->modal_room_skt_type 			= '';
			$this->modal_room_skt_height 		= '';
			$this->modal_room_handeltype_val 	= '';
			
			$this->hasRoomDetails = false;
			$this->dispatchBrowserEvent('openRoomDetailsModal', ['status' => 'false']);
			//$this->dispatchBrowserEvent('openRoomDetailsModal','false');
			//$this->dispatchBrowserEvent('openRoomDetailsModal', ['someKey' => 'someValue']);
		}
		$this->select_room_type_validation = false;
		$this->select_rooms = $value;
	}
	public function roomMaterialTypeSelected($value)
	{
		$this->room_cabinet_material = $value;
		//$this->modal_room_cabinet_material = $value;
	}
	public function roomBoxInnerTypeSelected($value)
	{
		$this->room_box_inner_lam = $value;
	}
	public function roomShutterTypeSelected($value)
	{
		$this->room_shutter_material = $value;
	}
	public function roomShFinishTypeSelected($value)
	{
		$this->room_shutter_finish = $value;
	}
	public function roomSktTypeTypeSelected($value)
	{
		$this->room_skt_type = $value;
	}
	public function roomSktHtTypeSelected($value)
	{
		$this->room_skt_height = $value;
	}
	public function roomHandleTypeSelected($value)
	{
		$this->room_handeltype_val = $value;
	}
	/*public function modalRoomHandleTypeSelected($value)
	{
		$this->modal_room_cabinet_material = $value;
		$this->dispatchBrowserEvent('modalopenRoomDetailsModal');
	}*/
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
		//if(empty($this->edit_id))
		$this->edit_id  = empty($this->edit_id) ? '' : $this->edit_id;
    }
	public function mount()
    {	
		//session()->forget('steps');	
		//session()->forget('session_order_id');	
        $this->limitPerLoad = config('custom.PRODUCT_LIST_SHOW_NEW_ORDER');
		
		$roomData    = Temporderroomtype::select('room_name')->where(['order_id'=> session()->get('session_order_id'),'user_id'=>auth()->user()->id])->get();
		foreach($roomData as $val)
		{
			$this->rooms[] = $val->room_name;
		}
		
		//$this->modal_room_cabinet_material = $this->modal_room_cabinet_material;
	}
	public function submitNewOrderForm()
    {
        $this->validate($this->rulesForForm1);
		//dd($this->project_type);
		$rm = !empty(json_decode($this->room_names)) ? implode(',', json_decode($this->room_names)) : '';
		//dd($this->project_name);
		$msg = '';
		if($this->edit_id=='' || $this->edit_id==0)
		{
			//dd($this->project_name);
			$model=new Cartorderforms();
			$model->user_id			=	auth()->user()->id;
			$model->project_name	=	$this->project_name;
			$model->address			=	$this->address;
			$model->city			=	$this->city;
			$model->zip_code		=	$this->zip_code;
			$model->state			=   $this->state;
			$model->country			=   $this->country;
			$model->mobile			=   $this->mobile;
			$model->project_type	=   $this->project_type  ?? 0;
			//$model->room_name		=   $rm;
			$model->status			=   1;
			$model->created_at		=   date('Y-m-d h:i:s');
			$model->save();
			$this->edit_id  =  $model->id;
			
			if(!empty($rm))
			{
				$expRooms = explode(",", $rm);
				foreach($expRooms as $val)
				{
					$roommodel = new Temporderroomtype();
					$roommodel->order_id		=	$model->id;
					$roommodel->user_id			=	auth()->user()->id;
					$roommodel->room_name		=	$val;
					$roommodel->status			=	1;
					$roommodel->created_at		=   date('Y-m-d h:i:s');
					$roommodel->save();
				}
			}
			$msg = 'New Order Form Added Successfully';
		}
		else
		{
			$model = Cartorderforms::find($this->edit_id);
			if($model)
			{
				//$model	=	Cartorderforms::find($this->edit_id);
				$model->user_id			=	auth()->user()->id;
				$model->project_name	=	$this->project_name;
				$model->address			=	$this->address;
				$model->city			=	$this->city;
				$model->zip_code		=	$this->zip_code;
				$model->state			=   $this->state;
				$model->country			=   $this->country;
				$model->mobile			=   $this->mobile;
				$model->project_type	=   $this->project_type;
				//$model->room_name		=   $rm;
				$model->status			=   1;
				$model->created_at		=   date('Y-m-d h:i:s');
				$model->updated_at=date('Y-m-d H:i:s');
				$model->save();
				$this->edit_id  =  $this->edit_id;
			}
			
			if(!empty($rm))
			{
				Temporderroomtype::where(['order_id'=>$this->edit_id,'user_id'=>auth()->user()->id])->delete();
				$expRooms = explode(",", $rm);
				foreach($expRooms as $val)
				{
					$roommodel = new Temporderroomtype();
					$roommodel->order_id		=	$this->edit_id;
					$roommodel->user_id			=	auth()->user()->id;
					$roommodel->room_name		=	$val;
					$roommodel->status			=	1;
					$roommodel->updated_at		=   date('Y-m-d h:i:s');
					$roommodel->save();
				}
			}
			$msg = 'New Order Form Updated Successfully';
		}
		session()->put('steps', 2);
		session()->put('session_order_id', $this->edit_id);
		
		$this->new_order_form = false;
		$this->view_order_form = true;
		$this->exists_cart_data = false;
		$this->project_name_label = $this->project_name;
		return redirect()->route('neworder')->with('success',$msg);
    }
	public function addToCart($productId)
    {
		$errmsg = '';
		$emptyOrderForm = Cartorderforms::where(['id'=>session()->get('session_order_id'),'user_id'=>auth()->user()->id])->count();
		//dd($emptyOrderForm);
		if($emptyOrderForm==0)
		{
			$errmsg = 'Submit New Order Form';
			session()->put('steps', 1);
		}
		elseif($this->select_rooms=='')
		{
			$errmsg = 'Select The Room';
			session()->put('steps', 2);
		}
		else{
			if($this->select_rooms!='')
			{
				$check_room_data = Temporderroomtype::where(['order_id'=>session()->get('session_order_id'),'user_id'=>auth()->user()->id,'id'=>$this->select_rooms])->first();
				if($check_room_data->cabinet_material!=0 && $check_room_data->box_Inner_laminate!=0 && $check_room_data->shutter_material!=0 && $check_room_data->shutter_finish!=0 && $check_room_data->skt_type!=0 && $check_room_data->skt_height!=0 && $check_room_data->handle_types!=0)
				{
					$chkProductExist = Tempaddtocart::where(['user_id'=>auth()->user()->id,'order_id'=>$check_room_data->order_id,'room_type_id'=>$check_room_data->id,'product_id'=>$productId])->count();
					if($chkProductExist==0)
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
							$model->order_id		=   $check_room_data->order_id;
							$model->room_type_id	=   $check_room_data->id;
							$model->save();
						}
					}
					$this->new_order_form = false;
					$this->view_order_form = true;
					$this->exists_cart_data = true;
					if(auth()->check()) {
						$this->list_add_to_cart = Tempaddtocart::where(['user_id'=>auth()->user()->id,'order_id'=>$check_room_data->order_id,'room_type_id'=>$check_room_data->id])->get();
						$this->total_cart_price =  Tempaddtocart::where(['user_id'=>auth()->user()->id,'order_id'=>$check_room_data->order_id,'room_type_id'=>$check_room_data->id])->sum('price');
					}
				}
				else{
					$errmsg = 'Fill The Room Details';
					return redirect()->route('neworder')->with('error',$errmsg);
				}
			}
		}
		if($errmsg!='')
		{
			return redirect()->route('neworder')->with('error',$errmsg);
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
		session()->put('steps', 1);
    }
	public function open_kitchen_properties_form()
    {
		//dd($this->hasRoomDetails);
		if($this->select_rooms != null && $this->hasRoomDetails ==true)
		{
			$indivisual_room_data = Temporderroomtype::where(['order_id'=>session()->get('session_order_id'),'user_id'=>auth()->user()->id,'id'=>$this->select_rooms])->first();
		
			$this->modal_room_cabinet_material =  $indivisual_room_data->cabinet_material;
			$this->modal_room_box_inner_lam = $indivisual_room_data->box_Inner_laminate;
			$this->modal_room_shutter_material =  $indivisual_room_data->shutter_material;
			$this->modal_room_shutter_finish =  $indivisual_room_data->shutter_finish;
			$this->modal_room_skt_type = $indivisual_room_data->skt_type;
			$this->modal_room_skt_height = $indivisual_room_data->skt_height;
			$this->modal_room_handeltype_val = $indivisual_room_data->handle_types;
			
			$this->dispatchBrowserEvent('openRoomDetailsModal', ['status' => 'false']);
			//$this->kitchen_properties_form = true;
		}
		else{
			//dd($this->hasRoomDetails);
			$this->kitchen_properties_form 		= false;
		}
		
		$this->select_room_type_validation = $this->select_rooms != null ? false : true;
		$this->view_order_form = false;
        //$this->kitchen_properties_form = true;
    }
	public function open_customise_form($productId)
    {
		$this->product_details = Products::where('id',$productId)->first();
        $this->kitchen_properties_form = false;
        $this->view_order_form = false;
        $this->customise_form = true;
		session()->put('steps', 3);
    }
	public function return_view_order_form()
    {
        $this->new_order_form = false;
        $this->kitchen_properties_form = false;
        $this->customise_form = false;
        $this->view_order_form = true;
    }
	public function submitKitchenOrderForm()
	{
		$this->validate($this->rulesForForm2);
		Temporderroomtype::where(['room_name'=>$this->select_rooms,'user_id'=>auth()->user()->id,'order_id'=>session()->get('session_order_id')])
        ->update([
            'cabinet_material'    	=> $this->room_cabinet_material,
            'box_Inner_laminate'    => $this->room_box_inner_lam,
            'shutter_material'    	=> $this->room_shutter_material,
            'shutter_finish'    	=> $this->room_shutter_finish,
            'skt_type'    			=> $this->room_skt_type,
            'skt_height'    		=> $this->room_skt_height,
            'handle_types'    		=> $this->room_handeltype_val
		]);
		$this->new_order_form = false;
		$this->view_order_form = true;
		$this->customise_form = false;
	}
	public function modalRoomMaterialSelected($value)
	{
		$this->modal_room_cabinet_material = $value;
	}
	public function submitModalKitchenOrderForm()
	{
		//dd($this->select_rooms);
		$model = Temporderroomtype::find($this->select_rooms);
		$model->cabinet_material	=   $this->modal_room_cabinet_material;
		$model->box_Inner_laminate	=   $this->modal_room_box_inner_lam;
		$model->shutter_material	=   $this->modal_room_shutter_material;
		$model->shutter_finish		=   $this->modal_room_shutter_finish;
		$model->skt_type			=   $this->modal_room_skt_type;
		$model->skt_height			=   $this->modal_room_skt_height;
		$model->handle_types		=   $this->modal_room_handeltype_val;
		$model->updated_at=date('Y-m-d H:i:s');
		if($model->save())
		{
			return redirect()->route('neworder')->with('success','Room Details Updated');
		}
		else{
			return redirect()->route('neworder')->with('error','Error Try Again');
		}
	}
	public function render()
    {
		$this->edit_id = session()->get('session_order_id');
		$this->get_rooms   = Temporderroomtype::select('id','room_name')->where(['order_id'=> session()->get('session_order_id'),'user_id'=>auth()->user()->id])->get();
		
		$user_order_dtls    = Cartorderforms::where(['id'=>session()->get('session_order_id'),'user_id'=>auth()->user()->id])->first();

		if(!empty($user_order_dtls->project_name))
		{
			$this->project_name = $this->project_name ?? $user_order_dtls->project_name;
		}
		
		if(!empty($user_order_dtls->address))
		{
			$this->address = $this->address ?? $user_order_dtls->address;
		}
		if(!empty($user_order_dtls->city))
		{
			$this->city = $this->city ?? $user_order_dtls->city;
		}
		if(!empty($user_order_dtls->zip_code))
		{
			$this->zip_code = $this->zip_code ?? $user_order_dtls->zip_code;
		}
		if(!empty($user_order_dtls->state))
		{
			$this->state = $this->state ?? $user_order_dtls->state;
		}
		if(!empty($user_order_dtls->country))
		{
			$this->country = $this->country ?? $user_order_dtls->country;
		}
		if(!empty($user_order_dtls->mobile))
		{
			$this->mobile = $this->mobile ?? $user_order_dtls->mobile;
		}
		if(!empty($user_order_dtls->project_type))
		{
			$this->project_type = $this->project_type ?? $user_order_dtls->project_type;
		}
		if(!empty($user_order_dtls->project_name))
		{
			$this->project_name_label = $user_order_dtls->project_name;
		}
		
		if(session()->get('steps')==1)
		{
			$this->new_order_form = true;
			$this->view_order_form = false;
			$this->customise_form = false;
		}
		elseif(session()->get('steps')==2)
		{
			$this->new_order_form = false;
			$this->view_order_form = true;
			$this->customise_form = false;
			//$this->exists_cart_data = false;
		}
		/*elseif(session()->get('steps')==3)
		{
			$this->kitchen_properties_form = false;
			$this->view_order_form = false;
			$this->customise_form = true;
		}*/
		
		//$this->load_product();
        return view('livewire.frontend.neworder')->with([
            //'products' =>  $this->products,
			'products' => Products::query()
                ->where('status', '!=', 2)
                ->where(function (Builder $query) {
                    if ($this->search) {
                        $query->where('name', 'like', '%' . $this->search . '%')
							->orWhere('price', 'like', '%' . $this->search . '%');
							//->orWhere('size', 'like', '%' . $this->search . '%');
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
