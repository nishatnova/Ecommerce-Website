<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOffer extends Model
{
    use HasFactory;
    private static $productOffer, $image, $imageName, $extension, $directory, $imageUrl;

    private static function getImageUrl($request)
    {
        self::$image        = $request->file('image');
        self::$extension    = self::$image->getClientOriginalExtension();
        self::$imageName    = time().'.'.self::$extension;
        self::$directory    = 'upload/productOffer-images/';
        self::$image->move(self::$directory, self::$imageName);
        return self::$directory.self::$imageName;
    }

    public static function newProductOffer($request)
    {
        if ($request->file('image'))
        {
            self::$imageUrl = self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl = 'upload/product.png';
        }

        self::$productOffer = new ProductOffer();
        self::$productOffer->product_id          = $request->product_id;
        self::$productOffer->title_one           = $request->title_one;
        self::$productOffer->title_two           = $request->title_two;
        self::$productOffer->title_three         = $request->title_three;
        self::$productOffer->description         = $request->description;
        self::$productOffer->image               = self::$imageUrl;
        self::$productOffer->save();
        return self::$productOffer;
    }

    public static function updateProductOffer($request, $productOffer)
    {
        if ($request->file('image'))
        {
            if (file_exists($productOffer->image))
            {
                unlink($productOffer->image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl = $productOffer->image;
        }

        self::$productOffer->product_id          = $request->product_id;
        self::$productOffer->title_one           = $request->title_one;
        self::$productOffer->title_two           = $request->title_two;
        self::$productOffer->title_three         = $request->title_three;
        self::$productOffer->description         = $request->description;
        self::$productOffer->image               = self::$imageUrl;
        $productOffer->save();
    }

    public static function deleteProductOffer($productOffer)
    {
        if (file_exists($productOffer->image))
        {
            unlink($productOffer->image);
        }
        $productOffer->delete();
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }



}
