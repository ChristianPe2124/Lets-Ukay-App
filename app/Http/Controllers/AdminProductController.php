<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $product = $request->all();
        $request->validate([
            'product_name' => ['required', 'max:255'],
            'product_desc' => ['required', 'max:255'],
            'product_seller' => ['required', 'max:255'],
            'product_price' => ['required', 'numeric', 'min:1', 'regex:/^\d+(\.\d{1,2})?$/'],
            'product_category' => ['required', 'in:skirt,short,blouse,dress,coat,swimwear,shirt,suit,formal,footwear'],
            'product_status' => ['required', 'in:instock,outofstock'],
        ]);

        // Input sent from Add ITEM
        $product = new Product();
        $product->product_name = $request->product_name;
        $product->product_desc = $request->product_desc;
        $product->seller_name = $request->product_seller;
        $product->price = $request->product_price;
        $product->category = $request->product_category;
        $product->status = $request->product_status;
        // Image upload and File Path for Storage
        if ($request->hasFile('src')) {
            $file = $request->file('src');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('storage/product_image', $filename);
            $product->src = $filename;
        }

        //dd($product);
        $product->save();

        if (!$product) {
            return redirect()->route('admin.home')->with('errors', 'All fields are required');
        }
        return redirect()->route('admin.home')->with('success', 'New item successfully created');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        /* if (!$id) {
        return Redirect::back()->with('errors', 'Something went wrong!');
        } */
        //$edit_products = DB::table('products')->where('product_id', $request->edit_id)->get();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'product_name' => ['required', 'max:255'],
            'product_desc' => ['required', 'max:255'],
            'product_seller' => ['required', 'max:255'],
            'product_price' => ['required', 'numeric', 'min:1', 'regex:/^\d+(\.\d{1,2})?$/'],
            'product_category' => ['required', 'in:skirt,short,blouse,dress,coat,swimwear,shirt,suit,formal,footwear'],
            'product_status' => ['required', 'in:instock,outofstock'],
        ]);

        // Input sent from Add ITEM
        $product = Product::find($id);
        $product->product_name = $request->product_name;
        $product->product_desc = $request->product_desc;
        $product->seller_name = $request->product_seller;
        $product->price = $request->product_price;
        $product->category = $request->product_category;
        $product->status = $request->product_status;

        // Image upload and File Path for Storage
        if ($request->hasFile('src')) {
            $destination = 'storage/product_image' . $product->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('src');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('storage/product_image', $filename);
            $product->src = $filename;
        }
        // dd($product);
        $product->update();

        if (!$product) {
            return redirect()->route('admin.home')->with('errors', 'All fields are required');
        }
        return redirect()->route('admin.home')->with('success', 'Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if ($product->status === "pending") {
            return redirect()->route('admin.home')->with('error', "You can't delete pending products!");
        }
        $image_path = public_path('storage/product_image') . '/' . $product->src;
        unlink($image_path);
        $product->delete();
        return redirect()->route('admin.home')->with('success', "Delete successfully!");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

}
