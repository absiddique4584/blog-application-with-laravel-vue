<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Exception;

class CategoryController extends Controller
{

    public function add_category(Request $request){
        $this->validate($request,[
            'cat_name'=>'required|min:2|max:50'
        ]);

        $category =new Category();
        $category ->cat_name =$request->cat_name;
        $category->save();
        return ['message'=>'ok'];
               // Category::create([
               //     'cat_name' =>$request->cat_name,
               // ]);

            //return redirect()->back();
        }



    public function all_category(){
      $categories = Category::orderBy('id','DESC')->get();
      return response()->json([
         'categories'=>$categories
      ],200);
    }

    public function delete_category($id){
        $category = Category::find($id);
        $category->delete();
    }



    public function edit_category($id){
        $category = Category::find($id);
        return response()->json([
            'category'=>$category
        ],200);
    }
    public function update_category(Request $request,$id){
        $this->validate($request,[
            'cat_name'=>'required|min:2|max:50'
        ]);
        $category = Category::find($id);
        $category->cat_name = $request->cat_name;
        $category->save();
    }
    public function selected_category($ids){
        $all_id = explode(',',$ids);
        foreach ($all_id as $id){
            $category = Category::find($id);
            $category->delete();
        }
    }
}
