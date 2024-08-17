<?php 
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Blog;
use App\Models\Rate;
use App\Models\Shop_info;

class HomeController extends Controller
{
    public $active;
    public function __construct()
    {
    }
    public function home() {
        $active = 'home';
        $shop_info = Shop_info::where('level', 1)->first();
        $rates= Rate::where('rate', 5)->inRandomOrder()->orderBy('date','DESC')->limit(6)->get();
        $cats = Category::orderBy('name', 'asc')->get();
        $products = Product::where('status', 1)->orderBy('date','DESC')->limit(8)->get();
        $SaleProducts = Product::where('status', 1)->where('sale_price','>', 0)->orderBy('date','DESC')->limit(3)->get();
        $randomProducts = Product::where('status', 1)->where('sale_price','>', 0)->inRandomOrder()->limit(8)->get();
        $blogs = Blog::where('status', 1)->orderBy('date','DESC')->limit(3)->get();
        return view('home', compact('shop_info','rates','cats','products','blogs','SaleProducts','randomProducts','active'));

    }

    public function product(Product $product) {
        $shop_info = Shop_info::where('level', 1);
        $active = 'product';
        return view('product', compact('active','product','shop_info'));
    }
    

    public function about() {
        $shop_info = Shop_info::where('level', 1)->first();
        $active = 'about';
        return view('about', compact('active','shop_info'));
    }
    
    public function shop(Category $cat) {
        $shop_info = Shop_info::where('level', 1)->first();
        $cates = Category::orderBy('name', 'asc')->get();
        $products = Product::orderBy('id','desc')->get();
        
        if ($cat) {
            $products = Product::where('category_id', $cat->id)->orderBy('id','desc')->get();
        }
        $active = 'shop';
        return view('shop', compact('cates', 'products', 'cat', 'active','shop_info'));
    }

    public function blog() {
        $shop_info = Shop_info::where('level', 1)->first();
        $active = 'blog';
        return view('blog', compact('active','shop_info'));
    }
    
    public function contact() {
        $shop_info = Shop_info::where('level', 1)->first();
        $active = 'contact';
        return view('contact', compact('active','shop_info'));
    }
}