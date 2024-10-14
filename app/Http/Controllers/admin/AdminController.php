<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();

        // Lấy tổng số sản phẩm của mỗi danh mục
        $categories = Category::withCount('products')->get();
// dd($categories->toArray());
        // Lấy tổng lượt xem (giả sử bạn có trường views trong model Product)
        $totalViews = Product::sum('views');

        return view('admin.index', compact('totalProducts', 'categories','totalViews'));
        
    }
}
