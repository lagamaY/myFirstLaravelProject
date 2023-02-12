<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB; //laravel query builder

use App\Models\product; //laravel eloquent


class PagesController extends Controller
{
    //
    public function home() 
    {
        return view('welcome');
    }


    public function about() 
    {
       // $products = DB::table('products') ->get();

        $products = product::get();
        return view('pages.about')->with('products',$products );
    }


    public function services($name) 
    {
       // return view('pages.services');
        return 'Mon nom est:'. $name;
    }

    public function details($id) 
    {
        /*$products = DB::table('products') 
                        ->where('id', $id)
                        ->first(); */
        $products = product :: find($id);
        return view('pages.details')->with('products',$products);
    }


}




