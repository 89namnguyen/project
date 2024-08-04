<?php 
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    public function home() {
        $ghes = Product::where('category_id', 2)->orderBy('id','desc')->limit(3)->get();
        $bans = Product::where('category_id', 3)->get();
        $tus = Product::where('category_id', 8)->get();
        
        return view('home', compact('ghes','bans','tus'));
    }

    public function product(Product $product) {
    //    $product = Product::find($id);
    //    $product = Product::where('id', $id)->first();
    // if ($product) {

    // } else {
    //     return abort(404);
    // }
    //    dd ($product);
        return view('product', compact('product'));
    }
    

    public function about() {
        return view('about');
    }
    
    public function shop(Category $cat) {
        $cates = Category::orderBy('name', 'asc')->get();
        $products = Product::orderBy('id','desc')->get();
        
        if ($cat) {
            $products = Product::where('category_id', $cat->id)->orderBy('id','desc')->get();
        }
        return view('shop', compact('cates', 'products', 'cat'));
    }

    public function blog() {
        return view('blog');
    }
    
    public function service() {
        return view('service');
    }
    
    public function contact() {
        return view('contact');
    }
}