<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\Size;
use App\Models\SubCategory;
use App\Models\Unit;
use App\Models\ProductImage;
use App\Models\ProductSize;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $subCategories;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.product.index', ['products' => Product::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.add', [
            'categories' => Category::all(),
            'sub_categories' => SubCategory::all(),
            'brands' => Brand::all(),
            'units' => Unit::all(),
            'colors' => Color::all(),
            'sizes' => Size::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

       $this->product = Product::newProduct($request);
       ProductColor::newProductColor($request->colors, $this->product->id);
       ProductSize::newProductSize($request->sizes, $this->product->id);
       ProductImage::newProductImage($request->other_image, $this->product->id);
       return back()->with('message', 'Product info create successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('admin.product.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('admin.product.edit', [
            'categories' => Category::all(),
            'sub_categories' => SubCategory::all(),
            'brands' => Brand::all(),
            'units' => Unit::all(),
            'colors' => Color::all(),
            'sizes' => Size::all(),
            'product' => $product,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        Product::updateProduct($request, $product);
        ProductColor::updateProductColor($request->colors, $product->id);
        ProductSize::updateProductSize($request->colors, $product->id);

        if ($request->other_image)
        {
            ProductImage::updateProductImage($request->other_image, $product->id);
        }
        return redirect('/product')->with('message', 'Product info update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        Product::deleteProduct($product);
        return back()->with('message', 'Product info delete successfully.');
    }

    public function getSubCategoryByCategory()
    {
        $this->subCategories = SubCategory::where('category_id', $_GET['id'])->get();
        return response()->json($this->subCategories);
    }
}
