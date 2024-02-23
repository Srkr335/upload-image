<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Productimage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductImageController extends Controller
{
    public function index(int $productId)
    {
            $product = Category::findOrFail($productId);

            $productImages= Productimage::where('product_id',$productId)->get();


        return view('product-image.index', compact('product','productImages'));


    }


    public function store(Request $request,int $productId)
    {
           $request->validate([
            'images.*'=>'required|image|mimes:png,jpg,jpeg,webp'
           ]);
           
           $product = Category::findOrFail($productId);

           $imageData=[];
           if($files= $request->file('images')){

            foreach($files as $file){

                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $path = 'uploads/category/';
                $file->move($path, $filename);
                $imageData[]=[
                    'product_id'=> $product->id,
                    'image' => $path.$filename,


                ];


            }
           }

           Productimage::insert( $imageData);
           return redirect()->back()->with('status',' Updated Successfully');

    }

    public function delete(int $productImageId){

        $productImage =Productimage::findOrFail($productImageId);

        if (File::exists($productImage->image)) {
            File::delete($productImage->image);

    }

        $productImage->delete();
        return redirect()->back()->with('status','Image Deleted Successfully');
           }
}

