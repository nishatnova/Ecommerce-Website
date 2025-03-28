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

 

  
   

  


}
