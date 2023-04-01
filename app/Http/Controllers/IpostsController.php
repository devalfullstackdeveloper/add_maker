<?php

namespace App\Http\Controllers;
use App\Models\Iposts;
 use File;

use Illuminate\Http\Request;

class IpostsController extends Controller
{
    public function index()
    {
        $iposts = Iposts::latest()->paginate(5);
        $iposts = Iposts::all();
        return view('iposts.index', compact('iposts')) ->with('i', (request()->input('page', 1) - 1) * 5);    
    }

    public function create()
    {
        return view('iposts.create');
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
            $data = Iposts::create([
            'title' => $request->title,
            'description' => $request->description,
            'images' => $imagewithfolder,
            ]);

            
           return redirect()->route('iposts.index')
            ->with('success','Facebook has been created successfully.');
    }

    public function show(Iposts $ipost)
    {
        return view('iposts.show', compact('ipost'));
    }

    public function edit(Iposts $ipost)
    {
        return view('iposts.edit', compact('ipost'));
        
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
    
            $UpdateDetails = Iposts::where('id', $request->id)->update(array(
           "title" => $request->title,
           "description" => $request->description,
           "images" => $imagewithfolder,
           
         ));
    
          }else{
           $UpdateDetails = Iposts::where('id', $request->id)->update(array(
            "title" => $request->title,
            "description" => $request->description,
           
         ));
    
          }
          
          return redirect()->route('iposts.index')
                       ->with('success','Post updated successfully');
        }

       public function destroy(Iposts $ipost)
    {
        $ipost->delete();
        return redirect()->route('iposts.index')
            ->with('success','Product deleted successfully'); 
    }


}
