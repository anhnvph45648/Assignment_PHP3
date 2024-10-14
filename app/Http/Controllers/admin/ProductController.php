<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $data = Product::latest('id')->paginate(15);

        return view('admin.products.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except('thumbnail');

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = Storage::put('products', $request->file('thumbnail'));
        }

        Product::create($data);
        return redirect()->route('admin.products.index')->with('message', 'ADD SUCCESS');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $categories = Category::all();

        return view('admin.products.show', compact('categories', 'product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();

        return view('admin.products.edit', compact('categories', 'product'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->except('thumbnail');

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = Storage::put('products', $request->file('thumbnail'));
        }


        $currentthumbnail = $product->thumbnail;

        $product->update($data);

        if (
            $request->hasFile('thumbnail')
            && !empty($currentthumbnail)
            && Storage::exists($currentthumbnail)
        ) {
            Storage::delete($currentthumbnail);
        }


        return redirect()->back()->with('message', 'cap nhat thanh cong');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {

        $product->delete();

        if (!empty($Product->thumbnail) && Storage::exists($product->thumbnail)) {
            Storage::delete($product->thumbnail);
        }


        return redirect()->route('admin.products.index')->with('message', 'xoa thanh cong');



    }

    
}

