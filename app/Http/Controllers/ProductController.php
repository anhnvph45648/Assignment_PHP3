<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $categories = DB::table('categories')->get();
        $products = DB::table('products')->get();

        return view('client.index', compact('categories', 'products'));
    }

    public function detail($id)
    {
        $categories = DB::table('categories')->get();
        $product = DB::table('products')->where('id', $id)->first();
        $products = DB::table('products')->get();

        return view('client.detail', compact('categories', 'product', 'products'));
    }
    public function category($id)
    {
        $categories = DB::table('categories')->get();
        $product = DB::table('categories')->where('id', $id)->first();
        $products = DB::table('products')->where('category_id', $id)->get(); // Lấy sản phẩm theo category_id
        return view('client.category', compact('categories', 'products'));
    }


    public function search(Request $request)
    {
        $categories = DB::table('categories')->get();
        $keyword = $request->input('keyword');
// dd($request->all());
        $products = DB::table('products')->where('name', 'like', "%{$keyword}%")->paginate(3);
      

        return view('client.search', compact('categories', 'keyword', 'products'));
    }
}
