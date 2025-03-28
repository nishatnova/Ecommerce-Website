<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Session;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Session::get('customer_id'))
        {
            WishList::where('customer_id', $this->customer)
                ->where('product_id', $id)
                ->first();
            return view('website.wishlist.index');
        }
        return redirect('/login-register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Wishlist $wishlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Wishlist $wishlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wishlist $wishlist)
    {
        //
    }
}
