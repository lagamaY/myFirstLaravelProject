<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB; //laravel query builder

use App\Models\product; //laravel eloquent
use Session;


class SandraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products = product::get();
        
        return view('form.courses.index')->with('products',$products );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('form.courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'product_name' => 'required',
            'product_price' => 'required',
            'product_description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1666'
        ]); 
    
        // Gestion de l'image
        $image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
         move_uploaded_file($image,$imageName);
        // Enregistrement des données dans la base de données
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_description'] =  $request->product_description;
        $data['product_price'] =  $request->product_price;
        $data['image'] =  $imageName;
    
        DB::table('products')->insert($data); 
    
        // Affichage du message de succès
        Session::put('success', 'Produit enregistré avec succès !');
        return redirect('/courses')->with('success', 'Product has been added'); // pour rediriger après l'insertion des données
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $products = product :: find($id);
        return view('form.courses.show')->with('products',$products);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $product = product::find($id);

        return view('form.courses.edit')->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $product = product::find($id);

        $product->product_name = $request->product_name; 
        $product->product_description =  $request->product_description;
        $product->product_price =  $request->product_price;


        $product->update();

        return redirect('/courses');
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $product = Product::findOrFail($id);
        $product->delete();

    return redirect('/courses')->with('success', 'Product has been deleted successfully.');
    }
}
