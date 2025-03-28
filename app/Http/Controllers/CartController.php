<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    public static $product;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('website.cart.index',[
        'products' => Cart::content()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        self::$product = Product::find($request->id);

        Cart::add([
            'id' => $request->id,
            'name' => self::$product->name,
            'qty' => $request->qty,
            'price' => self::$product->selling_price,
            'options' =>
                    [
                        'image' => self::$product->image,
                        'code' => self::$product->code,
                        'size' => $request->size,
                        'color' => $request->color
                    ]
        ]);

        return redirect('/cart')->with('message', 'Added Successfully!');
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return $request;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Cart::remove($id);
        return back()->with('message', 'Cart updated sucessfully!');
    }

    public function delete(string $id)
    {
        Cart::remove($id);
        return back()->with('message', 'Cart updated sucessfully!');
    }
    public function updateProduct(Request $request)
    {
       foreach ($request->data as $item)
       {
           Cart::update($item['rowId'], $item['qty']);
       }
       return redirect('/cart')->with('message', 'Cart Product Updated Sucessfully!');
    }
}
