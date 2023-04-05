<?php
namespace App\Http\Controllers;
use App\Models\Posts;
use Illuminate\Http\Request;
use File;
use DataTables;
class PostController extends Controller
{
    public function index(){
        $posts = Posts::latest()->paginate();
        return view('posts.index', compact('posts')) ->with('i', (request()->input('page', 1) - 1) * 5);
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
            $file = $request->file('images');
            $fileName = $request->file('images')->getClientOriginalName();             
            $path = $request->file('images')->storeAs('post_image', $fileName);
            $data = Posts::create([
                'title' => $request->title,
                'description' => $request->description,
                'images' => $path,
    
            ]);
           return redirect()->route('posts.index')
            ->with('success','Facebook has been created successfully.');
    }

    public function show($id)
    {
        $post= Posts::find($id);
        return view('posts.show',compact('post'));
    }

    public function edit($id)
    {
        $post= Posts::find($id);
        return view('posts.edit',compact('post'));  
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',    
            'description' => 'required',  
        ]);
          if($_FILES['images']['name'] != ''){
            $file = $request->file('images');
            $fileName = $request->file('images')->getClientOriginalName(); 
            if($fileName != ''){
                $path = $request->file('images')->storeAs('post_image', $fileName);
            }else{
                $path = $request['hidden_post_image'];
            }           
            $UpdateDetails = Posts::where('id', $request->id)->update(array(
             "title" => $request->title,
             "description" => $request->description,
             "images" => $path,
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
    public function destroy($id)
    {
      $idd = Posts::findOrFail($id);
      $idd->delete();
      return redirect('/posts')->with('completed', 'Post has been deleted');
    }

}
