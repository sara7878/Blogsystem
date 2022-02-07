<?php

namespace App\Http\Controllers;
use App\Models\Artical;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreArticalRequest;

class ArticalController extends Controller
{
    //
    function list($id){
        $articals = Artical::where('category_id','=', $id)->get(); 
        $category =Category::find($id); 
        return view('articles.list',['articals'=>$articals,'category_id'=>$id,'category'=>$category]);
    }

    function create($id){
        return view('articles.create',['categoryid'=>$id]);
    }

    // public function store(Request $request,$id){
    //     $artical=new Artical();
    //     $artical->updateOrInsert(['name' => $request->articalName,'details'=>$request->artialdesc,'slug'=>$request->articalslug,'category_id'=>$id,'is_used'=>1]);
    //     return redirect()->route('categories.articles.list',$id);
    // }


    public function store(StoreArticalRequest $request,$id){
        $artical=new Artical();
        $validated=$request->validated();
        $artical->updateOrInsert(['name' => $validated['articalName'],'details'=>$validated['artialdesc'],'slug'=>$validated['articalslug'],'category_id'=>$id,'is_used'=>1]);
        return redirect()->route('categories.articles.list',$id);
    }

    function updateform($id){
        $artical = Artical::find($id);
        return view('articles.update',['artical'=>$artical]);
    }

    function update(StoreArticalRequest $request,$id){
        $artical=Artical::find($id);
        $validated=$request->validated();
        $artical->name = $validated['articalName'];
        $artical->details = $validated['artialdesc'];
        $artical->slug = $validated['articalslug'];
        $artical->update();
        return redirect()->route('categories.articles.list',$artical->category_id);
    }

    public function delete($id){
        $artical =Artical::findOrFail($id);

        // $category=Category::table('user')->where('userID', '=', $id);
        if ($artical){
            $artical->delete();
        }
        return redirect()->route('categories.articles.list',$artical->category_id);
    }
}
