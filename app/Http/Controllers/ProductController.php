<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB; //laravel query builder

use App\Models\product; //laravel eloquent

use Session;

class ProductController extends Controller
{


    public function create(){
        return view('form.saveProduct');
    }



    //
    public function saveProduct(Request $request) 
        
    {
        // 1: Using the query Builder
      
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_description'] =  $request->product_description;
        $data['product_price'] =  $request->product_price;

        DB::table('products')->insert($data); 

        Session::put('success', 'Produit enregistré avec succèes !');
        

        return redirect('/create'); // pour rediriger après l'inseretion des données

        /*$this->validate($request, ['product_name' => 'required',
                                    'product_description' => 'required',                     
                                     'product_price' => 'required' ]); la validation avec laravel collective */
       
 // 1: Using laravel eloquent


       /* 
        
        $product = new product();
        $product->product_name = $request->product_name; 
        $product->product_description =  $request->product_description;
        $product->product_price =  $request->product_price;

        
        $product->save();  */
    }



    public function edit($id){
        $product = product::find($id);

        return view('form.edit')->with('product', $product);
    }


    public function updateProduct(Request $request){
      /*  $product = product::find($request->id);

        $product->product_name = $request->product_name; 
        $product->product_description =  $request->product_description;
        $product->product_price =  $request->product_price;


        $product->update();*/


          // 1: Using the query Builder
      
          $data = array();
          $data['product_name'] = $request->product_name;
          $data['product_description'] =  $request->product_description;
          $data['product_price'] =  $request->product_price;
  
          DB::table('products')->where('id',$request->id )->update($data); 
        // Session::put('success', 'Mise à jour effectuée !');
        return redirect('/about');
    }





    public function delete($id){
       /* $product = product::find($id);
       
        $product->delete(); */

        $product = DB::table('products')
                        ->where('id', $id)
                        ->first();

        DB::table('products')
                ->where('id', $id)
                ->delete();

        Session::put('success', 'Mise à jour effectuée !');
        return redirect('/about');
    }
}
