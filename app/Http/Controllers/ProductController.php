<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\RedirectResponse;




class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        //
        $products = Product::with('user')->latest()->get();
        $routes = [
        'show'    => '/products',
        'edit'    => '/products',
        'destroy' => '/products',
        ];
        return view('products.index',compact('products','routes'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        //
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request): RedirectResponse
    {
        //
        Product::create($request->validated() + ['user_id' => auth()->id()]);
        return redirect()->route('products.index') -> with('success','Producto creado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product): View     
    {
        //
        $product->load('user');
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product): View 
    {
        //
        $product->load('user');
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product): RedirectResponse    
    {
        //
        $product -> update ($request->validated());
        return redirect()->route('products.index')->with('success','Producto actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product): RedirectResponse
    {
        //
        $product->delete();
        return redirect()->route('products.index')->with('success','Producto eliminado');
    }
}
