<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Variety;
use Livewire\WithFileUploads;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Validate;

class NewVariety extends Component
{
    use WithFileUploads;

    public $categories;
    public $subCategories;
    public $varieties;
    public $MinimumOrder;
    public string $VarietyName = '';
    public $AltVarieties = [];
    public string $VarietyCode = '';
    public string $FlowerType = '';
    public string $Colour = '';
    public string $Category = 'AAA ROSES';
    public string $SubCategory = '';
    #[Validate('image|max:1024')] // 1MB Max
    public $file;

    public function mount()
    {
        $this->categories = DB::select("SELECT * FROM categories WHERE name != 'MIXED BOX'");
        $this->subCategories = DB::select('SELECT * FROM sub_categories WHERE Category = ?', [$this->Category]);
        $this->varieties = DB::select('SELECT * FROM variety WHERE Category = ?', [$this->Category]);
    }

    public function creatVariety()
    {
        // Colour, Active, PicUrl
       
        $name = time().'-'.$this->file->getClientOriginalName();
        $path = $this->file->storeAs('images', $name, 'public');

        $variety = new Variety;
        $variety->VarietyName = $this->VarietyName;
        $variety->VarietyCode = $this->VarietyCode;
        $variety->FlowerType = $this->FlowerType;
        $variety->MinimumOrder = $this->MinimumOrder;
        $variety->Colour = $this->Colour;
        $variety->Category = $this->Category;
        $variety->SubCategory = $this->SubCategory;
        $variety->picUrl = $path;
        $AltVarieties = implode(',', $this->AltVarieties);
        $variety->AltVarieties = $AltVarieties;
        $variety->InStock = true;
        $variety->save();

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
        return view('livewire.new-variety');
    }
}
