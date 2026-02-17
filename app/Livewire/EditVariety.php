<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Variety;
use App\Models\Category;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Validate;

class EditVariety extends Component
{
    use WithFileUploads;

    public $active;
    public $inStock;
    public $variety;
    public $subCategories;
    public $categories;
    public $varieties;
    public $MinimumOrder;
    public $ranges;
    public string $VarietyName = '';
    public $AltVarieties = [];
    public string $VarietyCode = '';
    public string $FlowerType = '';
    public string $Colour = '';
    public string $Category = '';
    public string $subCategory = '';
    #[Validate('image|max:1024')] // 1MB Max
    public $file;
    
    public function mount($id)
    {
        $this->variety = Variety::find($id);
        $this->VarietyName = $this->variety->VarietyName;
        $this->VarietyCode = $this->variety->VarietyCode;
        $this->FlowerType = $this->variety->FlowerType;
        $this->MinimumOrder = $this->variety->MinimumOrder;
        $this->Colour = $this->variety->Colour;
        $this->subCategory = $this->variety->SubCategory;
        $this->Category = $this->variety->Category;
        $AltVarieties = explode(',', $this->variety->AltVarieties);
        $this->AltVarieties = $AltVarieties;
        $this->picUrl = $this->variety->picUrl;
        $this->active = $this->variety->Active === 1;
        $this->inStock = $this->variety->InStock === 1;
        $this->categories = DB::select("SELECT * FROM categories WHERE name != 'MIXED BOX'");
        $this->subCategories = DB::select('SELECT * FROM sub_categories WHERE Category = ?', [$this->Category]);
        $this->varieties = DB::select('SELECT * FROM variety WHERE Category = ?', [$this->Category]);
    } 

    public function UpdateVariety()
    {
        if($this->file){
            $name = time().'-'.$this->file->getClientOriginalName();
            $path = $this->file->storeAs('images', $name, 'public');
            $this->variety->picUrl = $path;
        }

        $this->variety->VarietyName = $this->VarietyName;
        $this->variety->VarietyCode = $this->VarietyCode;
        $this->variety->FlowerType = $this->FlowerType;
        $this->variety->MinimumOrder = $this->MinimumOrder;
        $this->variety->Colour = $this->Colour;
        $this->variety->Category = $this->Category;
        $this->variety->SubCategory = $this->subCategory;
        $AltVarieties = implode(',', $this->AltVarieties);
        $this->variety->AltVarieties = $AltVarieties;
        $this->variety->Active = $this->active;
        $this->variety->InStock = $this->inStock;
        $this->variety->save();

        toastr()->success('Variety updated successfully', 'Congrats', ['positionClass' => 'toast-top-center']);
        $this->redirect(env('APP_ROOT').'varieties');
    }

    public function updatedCategory()
    {
        $this->subCategories = DB::select('SELECT * FROM sub_categories WHERE Category = ?', [$this->Category]);
        $this->varieties = DB::select('SELECT * FROM variety WHERE Category = ?', [$this->Category]);
    }

    public function updatedSubCategory()
    {
        $this->varieties = DB::select('SELECT * FROM variety WHERE SubCategory = ?', [$this->SubCategory]);
    }

    public function render()
    {
        return view('livewire.edit-variety');
    }
}
