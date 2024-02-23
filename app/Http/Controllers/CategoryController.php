<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    
    public function create(){

        return view('category.create');

     }



     public function store(Request $request){

$request->validate([

    'name'=>'required|max:225|string',
    'description'=>'required|max:225|string',
    'image'=>'nullable|mimes:png,jpg,jpeg,webp',
    'is_active'=>'sometimes'

]);

Category::create([
    'name' => $request->name,
    'description' => $request->description,
    'image' => $path.$filename,
    'is_active' => $request->is_active == true ? 1 : 0,
]);

return redirect('dashboard/create')->with('status', 'Category Created');

     }




     public function edit(int $id){

        $category =Category::find($id);

return view('category.edit',compact('category'));


        // return view('category.create');

     }
     public function update(Request $request,int $id){


        $request->validate([

            'name'=>'required|max:225|string',
            'description'=>'required|max:225|string',
            'is_active'=>'sometimes'

        ]);


      $category = Category::findorFail($id);

if ($request->has('image')) {

    $file = $request->file('image');
    $extension = $file->getClientOriginalExtension();
    $filename = time() . '.' . $extension;
    $path = 'uploads/category/';
    $file->move($path, $filename);


    if (File::exists($category->image)) {
        File::delete($category->image);

}


}


        $category  ->update([
        'name'=>$request->name,
        'description'=>$request->description,
        'image' => $path.$filename,
        'is_active'=>$request->is_active == true ? 1:0,
        ]);
        return redirect()->back()->with('status','Category Updated');
             }



             public function delete(int $id){



                $category =Category::findOrFail($id);

                if (File::exists($category->image)) {
                    File::delete($category->image);

            }

                $category->delete();
                return redirect()->back()->with('status','Category Deleted Successfully');
                   }


}
