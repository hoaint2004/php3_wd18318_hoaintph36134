<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index(){
        $categories = DB::table('categories')->get();
        return view('admin.categories.index', compact('categories'));
    }

    public function category($id){
        $category = Category::with('');
        

        dd($category);
        return view('user.category', compact('category'));
    }
}
