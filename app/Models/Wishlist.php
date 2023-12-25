<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;
    private static $wishlist;

    public static function newWishlist($customer,$product, $request)
    {
        self::$wishlist = new Wishlist();
        self::$wishlist->customer_id       = $customer->id;
        self::$wishlist->product_id       = $product->id;
        self::$wishlist->wishlist_date        = date('Y-m-d');
        self::$wishlist->wishlist_timestamp   = strtotime(date('Y-m-d'));
        self::$wishlist->save();
        return self::$wishlist;
    }
}
