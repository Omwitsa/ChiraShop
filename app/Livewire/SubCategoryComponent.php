<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\SubCategory;
use Illuminate\Support\Facades\DB;
use stdclass;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Arr;

class SubCategoryComponent extends Component
{
    public $subCategories;
    public $category;
    public $selectedVariety;
    public $length = 'len60';
    public $boxCapacity = 10;
    public $stemsPerBunch = 10;
    public $currency = 'Ksh:';
    public $amount = 500;
    public $currentBoxQuantity = 0;

    public function mount($category)
    {
        $this->category = $category;
        $box = session('box');
        $this->currentBoxQuantity = isset($box) ? $box->currentQuantity : 0;
        $this->length = isset($box) ? $box->Length : 'len60';
        $this->subCategories  = DB::select('SELECT * FROM sub_categories WHERE Category = ? AND Active = true', [$category]);
        $this->populateQuantity();
    }

    public function populateQuantity()
    {
        $box = session('box');
        foreach ($this->subCategories as $key => $value) {
            $subCategory = (object) $value;
            $varieties= DB::select('SELECT * FROM variety WHERE Category = ? AND SubCategory = ? AND Active = true', [$subCategory->Category, $subCategory->Name]);
            foreach ($varieties as $v_key => $v_value) {
                $variety = (object) $v_value;
                $variety->quantity = $variety->MinimumOrder;
                $variety->focused = false;
                $this->orderedQnty($box, $variety);
            }
            $subCategory->varieties = $varieties;
        }
    }

    public function orderedQnty($box, $variety){
        if($box){
            // $filtered = array_filter($orderedItems, function ($order_line) use ($variety)  {
           //     return ($order_line->VarietyName == $variety->VarietyName);
           // });
           $orderedItem = Arr::first($box->bunches, function ($bunch) use ($variety) {
               return ($bunch->VarietyName == $variety->VarietyName);
           });

           if($orderedItem){
               $variety->quantity = $orderedItem->quantity;
           }
       }
    }

    public function render()
    {
        return view(view: 'livewire.sub-category-component');
    }

    public function increment($index, $v_index)
    {
        $variety = $this->subCategories[$index]->varieties[$v_index];
        $variety->quantity++;
    }

    public function decrement($index, $v_index)
    {
        $variety = $this->subCategories[$index]->varieties[$v_index];
        $variety->quantity--;
        $variety->quantity = $variety->quantity < 1 ? 1 : $variety->quantity;
    }

    public function add($index, $v_index)
    {
        $subCategory = $this->subCategories[$index];
        $variety = $subCategory->varieties[$v_index];

        $box = session('box'); 
        if(!isset($box)){
            $box = new StdClass();
            $box->category = null;
            $box->Length = null;
            $box->bunches = [];
        }
        
        if($box->category &&  $box->category != $variety->Category){
            toastr()->error('Current active box category is '.$box->category . '. Mixing within a box not allowed', 'Sorry', ['positionClass' => 'toast-top-center']);
            // return redirect(env('APP_ROOT').'sub-category-component/'.$box->category);
            return redirect('/sub-category-component/'.$box->category);
        }

        if($box->Length &&  $box->Length != $this->length){
            $length = substr($box->Length,3);
            toastr()->error('Current active box length is  '.$length . ' cm. Mixing within a box not allowed', 'Sorry', ['positionClass' => 'toast-top-center']);
            // return redirect(env('APP_ROOT').'sub-category-component/'.$box->category);
            return redirect('/sub-category-component/'.$box->category);
        }

        $this->handleCurrentBox($variety, $box);
        return redirect(request()->header('Referer'));
    }

    public function handleCurrentBox($variety, $box){
        $box->BoxType = '';
        $box->BoxMarking = '';
        $box->Length = $this->length;

        $box->PackRate = 0;
        $box->capacity = $this->boxCapacity;
        $box->category = $variety->Category;
        $box->currentQuantity = isset($box->currentQuantity) ? $box->currentQuantity : 0;
        $variety->cost = $variety->quantity * $this->amount;
        $variety->normalizedName = $variety->VarietyName;
        $currentQuantity = $box->currentQuantity + $variety->quantity;
        $this->currentBoxQuantity = $box->currentQuantity;
        
        if($currentQuantity > $box->capacity){
            toastr()->error('Maximum box capacity is '.$box->capacity.' bunches', 'Sorry', ['positionClass' => 'toast-top-center']);
            return;
        }
       
        if(in_array($variety->VarietyName, array_column($box->bunches, 'VarietyName'))){
            toastr()->error('The variety already exist in the box', 'Sorry', ['positionClass' => 'toast-top-center']);
            return redirect(request()->header('Referer'));
        }
        
        $box->currentQuantity += $variety->quantity;
        array_push($box->bunches, $variety);
        session(['box' => $box]);
        if($box->currentQuantity == $box->capacity){
            Session::push('boxes', $box);
            $this->subCategories  = SubCategory::all();
            Session::forget('box');
            $box->currentQuantity = 0;
        }
    }

    public function loadAlternatives($index, $v_index)
    {
        $subCategory = $this->subCategories[$index];
        $this->selectedVariety = $subCategory->varieties[$v_index];
        
        foreach ($subCategory->varieties as $key => $value) {
            $value->focused = false;
        }
        $this->selectedVariety->focused = true;
        
        if(!$this->selectedVariety->AltVarieties){
            $this->selectedVariety->AltVarieties = '';
        }

        $AltVarieties = explode(',',  $this->selectedVariety->AltVarieties);
        $alternatives = DB::table('variety')
            ->where('Active', '=', true)
            ->where('InStock', '=', true)
            ->whereIn('id', $AltVarieties)
            ->get();

        $box = session('box');
        foreach ($alternatives as $v_key => $value){
            $value->quantity = $value->MinimumOrder;
            $this->orderedQnty($box, $value);
        }  

        $this->selectedVariety->alternatives = $alternatives;

    }

    public function closeAlternative($index, $v_index){
        $subCategory = $this->subCategories[$index];
        $this->selectedVariety = $subCategory->varieties[$v_index];
        $this->selectedVariety->focused = false;
    }

    public function addAlternative($index)
    {
        $alternative = $this->selectedVariety->alternatives[$index];
        $box = session('box');
        $this->handleCurrentBox($alternative, $box);
        return redirect(request()->header('Referer'));
    }

    public function incrementAlternative($index)
    {
        $alternative = $this->selectedVariety->alternatives[$index];
        $alternative->quantity++;
    }

    public function decrementAlternative($index)
    {
        $alternative = $this->selectedVariety->alternatives[$index];
        $alternative->quantity--;
        $alternative->quantity = $alternative->quantity < 1 ? 1 : $alternative->quantity;
    }
}
