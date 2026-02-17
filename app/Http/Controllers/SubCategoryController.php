<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use stdclass;
use Illuminate\Support\Facades\DB;
use App\Models\Variety;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Session;

class SubCategoryController extends Controller
{
    public function subCategory($categoryName) {
        dd($categoryName);
        $categoryName = Str::upper(Str::replace('-', ' ', $categoryName));
        $category = Category::firstWhere('name', $categoryName);
        $subCategories  = DB::select('SELECT * FROM sub_categories WHERE Category = ?', [$categoryName]);
        foreach ($subCategories as $key => $value) {
            $subCategory = (object) $value;
            $subCategory->param = Str::lower(Str::replace(' ', '-', $subCategory->Name));
        }
        return view('sub-category')->with([
            'category' => (object) $category,
            'subCategories' => $subCategories
        ]);
    }

    public function variety($subCategory) {
        $categoryId = Str::replace('--', '', substr($subCategory, 0 , 3));
        $category = Category::firstWhere('id', $categoryId);
        $subCategoryName = Str::upper(Str::replace('-', ' ', substr($subCategory,3)));
        $subCategory = SubCategory::firstWhere('Name', $subCategoryName);
        $varieties= DB::select('SELECT * FROM variety WHERE Category = ? AND SubCategory = ?', [$category->name, $subCategoryName]);
        
        foreach ($varieties as $key => $value) {
            $variety = (object) $value;
            $variety->param = $categoryId . '--' . $subCategory->id . '--' . $variety->VarietyCode;
        }

        return view('variety')->with([
            'category' => $category,
            'subCategory' => $subCategory,
            'varieties' => $varieties,
        ]);
    }

    public function addToCart($param)
    {
        $collection = Str::of($param)->explode('--');
        $category = Category::firstWhere('id', $collection->get(0));
        $subCategory = SubCategory::firstWhere('id', $collection->get(1));
        $varietyCode = $collection->get(2);
        $variety = Variety::firstWhere('VarietyCode', $varietyCode);

        $order_line = new StdClass();
        $order_line->BoxType = '';
        $order_line->BoxMarking = '';
        $order_line->VarietyCode = $variety->VarietyCode;
        $order_line->VarietyName = $variety->VarietyName;
        $order_line->subCategory = $subCategory->Name;
        $order_line->category = $category->name;
        $order_line->Length = 'len60';
        $order_line->Boxes = $variety->MinimumOrder;
        $order_line->MinimumOrder = $variety->MinimumOrder;
        $order_line->PackRate = 0;
        $order_line->StemQty = $order_line->PackRate * $order_line->Boxes;
       
        $order_lines = session('order_lines');
        if($order_lines == null){
            Session::push('order_lines', $order_line);
        }
        
        if($order_lines != null && !in_array($variety->VarietyName, array_column($order_lines, 'VarietyName'))){
            Session::push('order_lines', $order_line);
        }

        toastr()->success('Item added successfully', 'Congrats', ['positionClass' => 'toast-top-center']);
        $subCategory->param = Str::lower(Str::replace(' ', '-', $subCategory->Name));
        $param = "variety/$category->id--$subCategory->param";
        return redirect($param);
    }
}
