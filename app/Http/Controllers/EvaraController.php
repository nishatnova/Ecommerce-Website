<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductOffer;
use Illuminate\Http\Request;

class EvaraController extends Controller
{
    private $product;
    public function index()
    {
        return view('website.home.index',[
            'products' =>Product::take(8)
                ->where('featured_status',1)
                ->orderBy('id','desc')
                ->get(),
                'productOffers' => ProductOffer::all(),
                //->get('id', 'name', 'image', 'category_id', 'selling_price', 'regular_price'),
        ]);
    }

    public function category($id)
    {
        return view('website.category.index', [
            'products' =>Product::where('category_id',$id)->orderBy('id','desc')->get(),
        ]);
    }

    public function product($id)
    {
        $this->product = Product::find($id);
        return view('website.product.index', [
            'product' => $this->product,
            'category_products' => Product::where('category_id', $this->product->category_id)->orderBy('id', 'desc')->take(4)->get()
        ]);
    }
}
