<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }

    public function index() {
        if (!auth()->user()){
            // return view('landing-page');
            return redirect('login');
        }else{
            return redirect()->intended('dashboard');
            // return redirect('client-home');
        }
    }

    public function dashboard() {
        $data = array(
            'title'=>'Visitors',
            'Description'=>'This is New Application',
            'author'=>'foo'
        );

        if(auth()->user()->role === 'Admin') {
            return view('admin-dashboard')->with([
                'data' => (object) $data
            ]);
        }

        if(auth()->user()->role === 'Foreign') {
            // $categories = DB::table('categories')
            //     ->orderBy('id', 'desc')
            //     ->get();
            // foreach ($categories as $key => $value) {
            //     $category = (object) $value;
            //     $category->param = Str::lower(Str::replace(' ', '-', $category->name));
            // }

            // return view('category')->with([
            //     'categories' => $categories
            // ]);

            return redirect('client-home');
        }

        return view('local-dashboard');
    }

    public function guest() {
        $categories = DB::table('categories')
                ->orderBy('id', 'desc')
                ->get();
        foreach ($categories as $key => $value) {
            $category = (object) $value;
            $category->param = Str::lower(Str::replace(' ', '-', $category->name));
        }

        return view('category')->with([
            'categories' => $categories
        ]);
    }

    public function incrementOrderItem($index) {
        $order_lines = session('order_lines');
        $order_line = $order_lines[$index];
        $order_line->bunches = $order_line->bunches + 1;
        // unset($order_lines[$index]);
        // array_push($order_lines, $order_line);
        // session(['order_lines' => $order_lines]);
        return redirect(env('APP_ROOT').'sub-category-component/'.$order_line->category);
    }

    public function decrementOrderItem($index) {
        $order_lines = session('order_lines');
        $order_line = $order_lines[$index];
        $order_line->bunches = $order_line->bunches > 0 ? $order_line->bunches - 1 : $order_line->bunches;
        if($order_line->bunches == 0){
            unset($order_lines[$index]);
            session(['order_lines' => $order_lines]);
        }
        return redirect(env('APP_ROOT').'sub-category-component/'.$order_line->category); 
    }

    public function removeBunch($index) {
        $box = session('box');
        $box->currentQuantity = $box->currentQuantity - $box->bunches[$index]->quantity;
        unset($box->bunches[$index]);
        $box = count($box->bunches) > 0 ? $box : null;
        session(['box' => $box]);

        toastr()->success('Bunch deleted successfully', 'Congrats', ['positionClass' => 'toast-top-center']);

        return redirect(request()->header('Referer'));
    }
}
