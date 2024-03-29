<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Artical;
use App\Http\Requests\StoreCategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    function list(){
        $categories=Category::all();
        $articals = Artical::all();
        return view('dashboard.pages.categories',['categories'=>$categories,'articals'=>$articals]);
    }


    function create(){
        return view('categories.create');
    }

    // public function store(Request $request){
    //     $category=new Category;
    //     // $category->name = $request->catName;
    //     $category->updateOrInsert(['name' => $request->catName]);
    //     return redirect()->route('categories.list');
    // }

    public function store(StoreCategoryRequest $request){
        $validated=$request->validated();
        $category=new Category;
        $category->name = $validated['catName'];
        $category->save();
        return redirect()->route('categories.list');
    }

    function updateform($id){
        $cat = Category::find($id);
        return view('categories.update',['category'=>$cat]);
    }

    // function update(Request $request,$id){
    //     $cat=Category::find($id);
    //     $cat->name = $request->catName;
    //     $cat->update();
    //     return redirect()->route('categories.list');
    // }

    function update(StoreCategoryRequest $request,$id){
        $validated=$request->validated();
        $cat=Category::find($id);
        $cat->name = $validated['catName'];
        $cat->update();
        return redirect()->route('categories.list');
    }

    public function delete($id){
        $category =Category::findOrFail($id);

        // $category=Category::table('user')->where('userID', '=', $id);
        if ($category){
            $category->delete();
        }
        return redirect()->route('categories.list');
    }
}
