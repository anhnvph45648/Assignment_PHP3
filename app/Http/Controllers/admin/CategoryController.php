<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $data = Category::latest('id')->paginate(15);

        return view('admin.categories.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.categories.create', compact('categories'));
    }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    public function store(Request $request)
    {
        $data = $request->except('thumbnail');

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = Storage::put('categories', $request->file('thumbnail'));
        }

        Category::create($data);
      
        return redirect()->route('admin.categories.index')->with('message', 'ADD SUCCESS');;
    }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(Product $Product)
    // {
    //     $categories = Category::all();

    //     return view('admin.products.show', compact('categories', 'product'));
    // }

    // // /**
    //  * Show the form for editing the specified resource.
    //  */
    public function edit(Category $category)
    {

        return view('admin.categories.edit', compact('category'));

    }

    // /**
    //  * Update the specified resource in storage.
    //  */
    public function update(Request $request, Category $category)
    {

        $data = $request->all();

        $category->update($data);

        return redirect()->route('admin.categories.index');
    }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(Product $Product)
    // {

    //     $Product->delete();

    //     if (!empty($Product->thumbnail) && Storage::exists($Product->thumbnail)) {
    //         Storage::delete($Product->thumbnail);
    //     }


    //     return redirect()->route('admin.products.index')->with('message', 'xoa thanh cong');



    // }

}
