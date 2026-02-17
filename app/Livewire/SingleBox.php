<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Client;
use App\Models\PriceHeader;
use App\Models\PackRateHeader;
use App\Models\PriceLine;
use App\Models\PackRateLine;
use App\Models\Brand;
use App\Models\varietyRange;
use stdclass;
use Illuminate\Support\Facades\DB;

class SingleBox extends Component
{
    public $brands = 'AAA ROSES';
    public $varietyRange = '';
    public $ranges;
    public $varieties;
    public $client;
    public $price;
    public $packRate;
    public $length = 'len60';
    public $groupedVarieties = [];


    public $order_lines;
    
    public function mount()
    {
        // $this->varieties= DB::select('SELECT * FROM variety WHERE brand = ? AND v_range = ?', [$this->brands, $this->range]);
        $this->client = Client::firstWhere('ClientCode', auth()->user()->usercode);
        $this->price = PriceHeader::firstWhere('Name', $this->client->Price);
        $this->packRate = PackRateHeader::firstWhere('Name', $this->client->PackRate);
        $this->ranges = DB::select('SELECT * FROM variety_ranges WHERE brand = ?', [$this->brands]);
        // $this->varieties= DB::select('SELECT * FROM variety WHERE brand = ?', [$this->brands]);

        $this->formatvariety();
    }

    public function updatedBrands()
    {
        // dd($this->brands);
        $this->ranges = DB::select('SELECT * FROM variety_ranges WHERE brand = ?', [$this->brands]);
        $this->varieties= DB::select('SELECT * FROM variety WHERE brand = ?', [$this->brands]);

        $this->formatvariety();
    }

    public function updatedLength()
    {
        $this->formatvariety();
    }

    public function updatedQuantity()
    {
        $this->varietyRange = '';
    }

    private function formatvariety()
    {
        $this->groupedVarieties = [];
        foreach ($this->ranges as $range) {
            $formattedRange = new StdClass();
            $formattedRange->name = $range->Name;
            $selectedVarietyRange = varietyRange::firstWhere('Name', $range->Name);
            $this->varieties= DB::select('SELECT * FROM variety WHERE brand = ? AND VarietyRangeId = ?', [$this->brands, $selectedVarietyRange->id]);

            foreach ($this->varieties as $variety) {
                $variety->currency= $this->price->Currency;
                $priceLine = PriceLine::where('price_header_id', $this->price->id)->where('variety', $variety->VarietyName)->first();
                $packrateLine = PackRateLine::where('pack_rate_header_id', $this->packRate->id)->where('variety', $variety->VarietyName)->first();
                $variety->price= $priceLine->len60;
                $variety->packrate= $packrateLine[$this->length];
                $variety->stems= 0;
                $variety->quantity= '';
                $variety->sub_total= 0;
            }

            $formattedRange->varieties = $this->varieties;
            array_push($this->groupedVarieties, $formattedRange);
        }
    }

    public function onEnterQuantity($gv_index, $v_index, $value)
    {
        $variety = $this->groupedVarieties[$gv_index]->varieties[$v_index];
        $variety->stems = $variety->packrate * $value;
        $variety->sub_total = $variety->price * $value;
        // dd($value);
        //$this->varietyRange = $itemId;
        // Access the selected item data using $itemId (e.g., database query)
        // $selectedItem = Item::find($itemId);

        // Update component state, perform actions, etc. based on $selectedItem
        // $this->selectedItemId = $itemId; // Example: store the ID for further use
    }

    public function addToCart($gv_index, $v_index)
    {
        // $this->order_lines->dd();
        $variety = $this->groupedVarieties[$gv_index]->varieties[$v_index];
        // $order_lines = collect([$variety->FlowerType,$variety->brand, $variety->varietyRange, $variety->currency, $variety->price,$variety->sub_total]);
        $selectedBrand = Brand::firstWhere('name', $variety->brand);
        if(is_null($this->order_lines)){
            $this->order_lines = collect([
                ['VarietyId' => $variety->id, 'VarietyRangeId' => $variety->VarietyRangeId, 'Length' => substr($this->length,3), 'BoxType' => $this->packRate->id, 'StemQty' => $variety->stems, 'PackRate' => $variety->packrate, 'Boxes' => $variety->quantity, 'Farm' => $selectedBrand->farm, 'VarietyName' => $variety->VarietyName]
            ]);
        }
        else{
            if($this->order_lines->contains('VarietyId', $variety->id)){
                foreach ($this->order_lines as $key => $value) {
                    $ordered = (object) $value;
                    if($ordered->VarietyId === $variety->id){
                        unset($this->order_lines[$key]);
                    }
                }
            }
            $this->order_lines->push(['VarietyId' => $variety->id, 'VarietyRangeId' => $variety->VarietyRangeId, 'Length' => substr($this->length,3), 'BoxType' => $this->packRate->id, 'StemQty' => $variety->stems, 'PackRate' => $variety->packrate, 'Boxes' => $variety->quantity, 'Farm' => $selectedBrand->farm, 'VarietyName' => $variety->VarietyName]);
        }

        toastr()->success('Item added successfully', 'Congrats', ['positionClass' => 'toast-top-center']);
        session(['order_lines' => $this->order_lines]);
    }

    public function render()
    {
        return view('livewire.single-box')->with([
            'varieties' => $this->varieties,
        ]);
    }
}
