<?php 
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Blog;
use App\Models\Rate;
use App\Models\Shop_info;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public $active;
    public function __construct()
    {
    }
    public function home() {
        $active = 'home';
        $shop_info = Shop_info::where('level', 1)->first();
        $rates= Rate::where('rate', 4)->inRandomOrder()->orderBy('date','DESC')->limit(6)->get();
        $cats = Category::orderBy('name', 'asc')->get();
        $SaleProducts = Product::where('status', 1)->where('sale_price','>', 0)->orderBy('date','DESC')->limit(3)->get();
        $randomProducts = Product::where('status', 1)->where('sale_price','>', 0)->inRandomOrder()->limit(8)->get();
        $blogs = Blog::where('status', 1)->orderBy('date','DESC')->limit(3)->get();
        return view('home', compact('shop_info','rates','cats','blogs','SaleProducts','randomProducts','active'));

    }

    public function product(Product $product) {
        $shop_info = Shop_info::where('level', 1);
        $active = 'product';
        return view('product', compact('active','product','shop_info'));
    }
    

    public function about() {
        $shop_info = Shop_info::where('level', 1)->first();
        $rates= Rate::where('rate', 4)->inRandomOrder()->orderBy('date','DESC')->limit(6)->get();
        $active = 'about';
        return view('about', compact('active','rates','shop_info'));
    }
    
    public function shop(Product $prod) {
        $shop_info = Shop_info::where('level', 1)->first();
        $cates = Category::orderBy('name', 'asc')->get();
        $products = Product::where('status', 1)->get();
        $active = 'shop';
        if ($prod->if) {
            return view('shop_detial', compact('cates', 'products', 'active','shop_info'));
        }else{
            return view('shop', compact('cates', 'products', 'active','shop_info'));
        }
    }

    public function blog(Blog $blog) {
        $shop_info = Shop_info::where('level', 1)->first();
        $active = 'blog';
        return view('blog', compact('active','shop_info'));
        if ($prod->if) {
            return view('blog_detial', compact('active','shop_info'));
        }else{
            return view('blog', compact('active','shop_info'));
        }
    }
    
    public function contact() {
        $shop_info = Shop_info::where('level', 1)->first();
        $contacts = Shop_info::orderBy('name', 'asc')->get();
        $active = 'contact';
        return view('contact', compact('active','shop_info','contacts'));
    }
}