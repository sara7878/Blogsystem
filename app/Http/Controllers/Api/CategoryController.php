<?php

namespace App\Http\Controllers\Api;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\ProgramResource;


class CategoryController extends Controller
{
    //
    function list(){
        $categories=Category::all();
        return response()->json($categories);
    }

    function getcat($id){
        $cat = Category::find($id);
        return response()->json($cat);
    }

    function store(Request $request){
        $count=count($request->all());
        if($count==1){
        $validated=$request->validate(['name' => 'required|min:5|max:10|unique:categories']);
        $category=new Category;
        $category->name = $validated['name'];
        $category->save();
        // return response()->json(['Program created successfully.', new ProgramResource($category)]);
        return response()->json($category);
        }
        else{
            return ["result"=>"error"];
        }
    }

    function update(Request $request,$id){
        $count=count($request->all());
        if($count==1){
            $validated=$request->validate([
            'name' => 'required|min:5|max:10|unique:categories'
        ]);
        $cat=Category::find($id);
        $cat->name = $validated['name'];
        $cat->update();
        return response()->json($cat);}
        else{
            return ["result"=>"error"];
        }
    }

    public function delete($id){
        $category =Category::findOrFail($id);
        if ($category){
            $category->delete();
            return ["result"=>"deleted"];
        }
        else
        return ["result"=>"error"];
    }

}
