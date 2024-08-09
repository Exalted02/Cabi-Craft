<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Exposide;
use Illuminate\Support\Facades\DB;
class Neworder extends Component
{
	public $new_order_form = true;
	public $view_order_form = false;
	public $kitchen_properties_form = false;
	public $customise_form = false;
	public $products ;
	public $search_product;
	public $search_button = true;
	public $moreload = '';
	public $remain;
	
	public function mount()
    {
		$count = env('PRODUCT_LIST_SHOW_NEW_ORDER');
		$this->products = DB::table('products')->where('status', '!=', 2)->limit($count)->orderBy('created_at', 'desc')->get();
		
		$this->moreload = env('PRODUCT_LIST_SHOW_NEW_ORDER');
		$product = DB::table('products')->where('status', '!=', 2)->get();
		$this->remain =  count($product) > $count ? count($product): 0 ;
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
	public function search()
	{
		$count = env('PRODUCT_LIST_SHOW_NEW_ORDER');
		
		if($this->search_button && $this->search_product!='')
		{
			$query = DB::table('products')->where('status', '!=', 2);
			if($this->search_product) {
				$searchTerm = $this->search_product;

				$query->where(function($q) use ($searchTerm) {
					$q->where('name', 'like', '%' . $searchTerm . '%')
					  ->orWhere('price', 'like', '%' . $searchTerm . '%')
					  ->orWhere('size', 'like', '%' . $searchTerm . '%');
				});
				
				$totalrecord = $this->totalRecord($this->search_product);
				//echo $totalrecord;die;
			}
			$this->search_button = false;
			
			$this->products = $query->limit($count)->orderBy('created_at', 'desc')->get();
			
			//---------------------
			$this->moreload = 1;
			$loadproducts = $this->products;
			$c1 = $totalrecord;
			$c2 = count($loadproducts);
			$this->remain = $c1-$c2;
		}
		else
		{
			$count = env('PRODUCT_LIST_SHOW_NEW_ORDER');
			$this->products = DB::table('products')->where('status', '!=', 2)->limit($count)->orderBy('created_at', 'desc')->get();
			$this->moreload = env('PRODUCT_LIST_SHOW_NEW_ORDER');
			$product = DB::table('products')->where('status', '!=', 2)->get();
			$this->remain =  count($product) > $count ? count($product): 0 ;
			
			$this->search_product = '';
			$this->search_button = true;
		}
	}
	public function totalRecord($search)
	{
		$query = DB::table('products')->where('status', '!=', 2);
		if($search) {
			$searchTerm = $search;

			$query->where(function($q) use ($searchTerm) {
				$q->where('name', 'like', '%' . $searchTerm . '%')
				  ->orWhere('price', 'like', '%' . $searchTerm . '%')
				  ->orWhere('size', 'like', '%' . $searchTerm . '%');
			});
		}
		$record = $query->get();
		return count($record);
	}
	public function loadMore()
	{
		$interval = env('LOAD_MORE_INTERVAL_NEW_ORDER');
		
		if($this->moreload)
		{
			$count = $this->moreload + $interval;
			$this->moreload = $count;
		}
		else{
			//$count = $interval; // new implement
			$this->moreload = $interval;
		}
		
		//-----------------------------------
		if($this->search_product!='')
		{
			$query = DB::table('products')->where('status', '!=', 2);
			if($this->search_product) {
				$searchTerm = $this->search_product;

				$query->where(function($q) use ($searchTerm) {
					$q->where('name', 'like', '%' . $searchTerm . '%')
					  ->orWhere('price', 'like', '%' . $searchTerm . '%')
					  ->orWhere('size', 'like', '%' . $searchTerm . '%');
				});
			}
			$this->search_button = false;
			
			$loadproducts = $query->limit($count)->orderBy('created_at', 'desc')->get();
			
			$totalrecord = $query->get();
			
			$c1 = count($totalrecord);
			$c2 = count($loadproducts);
			$this->remain = $c1-$c2;
			$this->products = $loadproducts;
		}
		else{
		//-------------
			$loadproducts = DB::table('products')->where('status', '!=', 2)->limit($count)->orderBy('created_at', 'desc')->get();
			
			$totalrecord = DB::table('products')->where('status', '!=', 2)->get();
			$c1 = count($totalrecord);
			$c2 = count($loadproducts);
			$this->remain = $c1-$c2;
			
			$this->products = $loadproducts;
		}
	}
    public function render()
    {
        return view('livewire.frontend.neworder')->with([
            'products' =>  $this->products,
			'exposide' =>  Exposide::all(),
        ]);
    }
}
