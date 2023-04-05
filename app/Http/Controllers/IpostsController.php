<?php

namespace App\Http\Controllers;
use App\Models\Iposts;
use File;
use DataTables;
use Illuminate\Http\Request;
class IpostsController extends Controller
{
    public function index()
    {
        $iposts = Iposts::latest()->paginate();
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
            $file = $request->file('images');
            $fileName = $request->file('images')->getClientOriginalName();             
            $path = $request->file('images')->storeAs('ipost_image', $fileName);
            $data = Iposts::create([
                'title' => $request->title,
                'description' => $request->description,
                'images' => $path,
    
            ]);
           return redirect()->route('iposts.index')
            ->with('success','Facebook has been created successfully.');
    }
    public function show($id)
    {
        $ipost= Iposts::find($id);
        return view('iposts.show',compact('ipost'));
    }
    public function edit($id)
    {
        $ipost= Iposts::find($id);
        return view('iposts.edit',compact('ipost'));
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
                $path = $request->file('images')->storeAs('ipost_image', $fileName);
            }else{
                $path = $request['hidden_ipost_image'];
            }           
            $UpdateDetails = Iposts::where('id', $request->id)->update(array(
             "title" => $request->title,
             "description" => $request->description,
             "images" => $path,
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
    public function destroy( $id)
    {
        $idd = Iposts::findOrFail($id);
        $idd->delete();
        return redirect('/iposts')->with('completed', 'Post has been deleted');
    }
}
