<?php

namespace App\Http\Controllers;
use App\Models\Posts;
use Illuminate\Http\Request;
use File;

class PostController extends Controller
{
    public function index(){
        $posts = Posts::latest()->paginate(5);
        $posts = Posts::all();
        return view('posts.index', compact('posts')) ->with('i', (request()->input('page', 1) - 1) * 5);

        $users= users::latest()->paginate(5);
        return view('admin.user_info',compact('users'))
          ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
             
            $path = public_path('images');

            if(!File::isDirectory($path)){
            File::makeDirectory($path, 0777, true, true);
             $imageName = time().'.'.$request->images->extension();  
             $request->images->move(public_path('images'), $imageName);
             $imagewithfolder = 'public\images\\'.$imageName;

            }else{
            $imageName = time().'.'.$request->images->extension();
            $request->images->move(public_path('images'), $imageName);
            $imagewithfolder = 'public\images\\'.$imageName;
            }
            $data = Posts::create([
            'title' => $request->title,
            'description' => $request->description,
            'images' => $imagewithfolder,
            ]);

            
           return redirect()->route('posts.index')
            ->with('success','Facebook has been created successfully.');
    }

    public function show(Posts $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Posts $post)
    {
        return view('posts.edit', compact('post'));
        
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'title' => 'required',    
            'description' => 'required', 
            
          ]);
       
    
          if($_FILES['images']['name'] != ''){
               
            $path = public_path('images');
    
            if(!File::isDirectory($path)){
              File::makeDirectory($path, 0777, true, true);
              $imageName = time().'.'.$request->images->extension();  
              $request->images->move(public_path('images'), $imageName);
              $imagewithfolder = 'public\images\\'.$imageName;
    
            }else{
              $imageName = time().'.'.$request->images->extension();
              $request->images->move(public_path('images'), $imageName);
              $imagewithfolder = 'public\images\\'.$imageName;
            }
    
            $UpdateDetails = Posts::where('id', $request->id)->update(array(
           "title" => $request->title,
           "description" => $request->description,
           "images" => $imagewithfolder,
           
         ));
    
          }else{
           $UpdateDetails = Posts::where('id', $request->id)->update(array(
            "title" => $request->title,
            "description" => $request->description,
           
         ));
    
          }
          
          return redirect()->route('posts.index')
                       ->with('success','Post updated successfully');
        }

    public function destroy(Posts $post)
    {
        $post->delete();
        return redirect()->route('posts.index')
            ->with('success','Product deleted successfully'); 
    }

}
