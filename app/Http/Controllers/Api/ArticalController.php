<?php

namespace App\Http\Controllers\Api;
use App\Models\Artical;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticalController extends Controller
{
    
        function listAll(){
            $articals=Artical::with('category')->get();
            return response()->json($articals);
        }
    

        function getcat($id){
            $art = Artical::find($id);
            return response()->json($art);
        }

    
    
        function add(Request $request){
            // $validated=$request->validate([
            //     'name' => 'required|min:5|max:10|unique:articals',
            //     'details' => 'required|min:20|max:255',
            //     'slug' => 'required|min:5|max:255',
            // ]); 
            $artical=new Artical();
            $artical->name = $request->name;
            $artical->details = $request->details;
            $artical->slug = $request->slug;
            $artical->category_id=$request->category_id;
            $artical->is_used=$request->is_used;
            $artical->save();
            
            return ["result"=>"done"];
    }


        function update(Request $request,$id){
            $artical=Artical::find($id);
            $validated=$request->validate([
                'name' => 'required|min:5|max:10|unique:articals',
                'details' => 'required|min:20|max:255',
                'slug' => 'required|min:5|max:255',
            ]);
            $artical->name = $validated['name'];
            $artical->details = $validated['details'];
            $artical->slug = $validated['slug'];
            $artical->update();
            return ["result"=>"done"];
        }
    


        public function delete($id){
            $artical =Artical::findOrFail($id);
    
            // $category=Category::table('user')->where('userID', '=', $id);
            if ($artical){
                $artical->delete();
            }
            return  ["result"=>"done"];
        }
}
