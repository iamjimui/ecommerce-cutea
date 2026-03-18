<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Topping;
use App\Models\ProductSize;
use Illuminate\Http\Request;
use App\Http\Requests\ProductUpdateRequest;

class ProductController extends Controller
{

    public function products(Request $request){
		// Ici se trouvera le code qui récupèrera la liste des articles
		// la variable $articles contient une liste d'articles
        $page = $request->has('page') ? intval($request->get('page')) : 0;
        $allproducts = Product::all();
	    $products = Product::skip(0)->take(8)->get();
        $numberOfProducts = count($allproducts);
        $numberOfPages = ceil($numberOfProducts / 8);
        if ($page !== 0) {
            $products = Product::skip(8 * ($page-1))->take(8)->get();
        }
        $toppings = Topping::all();

        return view('home', compact('products', 'toppings', 'numberOfProducts', 'numberOfPages', 'page'));
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Product $product, ProductUpdateRequest $request)
    {
        $product->create(array_merge($request->validated()));

        return redirect()->route('home.index')
            ->withSuccess(__('Produit crée avec succès'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateRequest $request, $productid)
    {
        $product = Product::findOrFail($productid); 

        $validatedData = $request->validated();

        $validatedData['price'] = floatval($validatedData['price']);
        
        $product->update($validatedData);

    return redirect()->route('home.index')
        ->withSuccess(__('Carte modifiée avec succès!'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $productid)
    {
        $product = Product::findOrFail($productid); 

        $product->delete();

    return redirect()->route('home.index')
        ->withSuccess(__('Carte supprimée avec succès!'));
     
    }

    /**
     * Get all products
     */
    public function fetchAllProducts()
    {
        $products = Product::all();

        return response()->json($products);
    }

     /**
     * Get all sizes
     */
    public function fetchAllSizes()
    {
        $product_sizes = ProductSize::all();

        return response()->json($product_sizes);
    }

    /**
     * Get all toppings
     */
    public function fetchAllToppings()
    {
        $toppings = Topping::all();

        return response()->json($toppings);
    }

}
