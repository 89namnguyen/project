<?php 
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    public $active;
    public function home() {
        $ghes = Product::where('category_id', 2)->orderBy('id','desc')->limit(3)->get();
        $bans = Product::where('category_id', 3)->get();
        $tus = Product::where('category_id', 8)->get();
        $active = 'home';
        return view('home', compact('active','ghes','bans','tus'));
    }

    public function product(Product $product) {
    //    $product = Product::find($id);
    //    $product = Product::where('id', $id)->first();
    // if ($product) {

    // } else {
    //     return abort(404);
    // }
    //    dd ($product);
        $active = 'product';
        return view('product', compact('active','product'));
    }
    

    public function about() {
        $active = 'about';
        return view('about', compact('active'));
    }
    
    public function shop(Category $cat) {
        $cates = Category::orderBy('name', 'asc')->get();
        $products = Product::orderBy('id','desc')->get();
        
        if ($cat) {
            $products = Product::where('category_id', $cat->id)->orderBy('id','desc')->get();
        }
        $active = 'shop';
        return view('shop', compact('cates', 'products', 'cat', 'active'));
    }

    public function blog() {
        $active = 'blog';
        return view('blog', compact('active'));
    }
    
    public function contact() {
        $active = 'contact';
        return view('contact', compact('active'));
    }
}