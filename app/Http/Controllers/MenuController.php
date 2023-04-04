<?php
namespace App\Http\Controllers;
use App\Models\Menu;
use Illuminate\Http\Request;
use DataTables;
use File;
class MenuController extends Controller
{
    public function index(){
        $menu = Menu::latest()->paginate(5);
        return view('menu.index', compact('menu')) ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function create()
    {
        return view('menu.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required',
            ]); 
            $file = $request->file('images');
            $fileName = $request->file('images')->getClientOriginalName();             
            $path = $request->file('images')->storeAs('menu_image', $fileName);
            $data = Menu::create([
                'title' => $request->title,
                'description' => $request->description,
                'images' => $path,
                'price' => $request->price,
                
            ]); 
           return redirect()->route('menu.index')
            ->with('success','Menu has been created successfully.');
    }
    public function show($id)
    {
        $menu= Menu::find($id);
        return view('menu.show',compact('menu'));
    }
    public function edit( $id)
    {
        $menu= Menu::find($id);
        return view('menu.edit',compact('menu'));  
    }
    public function update(Request $request, $id)
    {
        $request->validate([
        'title' => 'required',    
        'description' => 'required',
        'price' => 'required',    
        ]);
        if($_FILES['images']['name'] != ''){
            $file = $request->file('images');
            $fileName = $request->file('images')->getClientOriginalName(); 
            if($fileName != ''){
                $path = $request->file('images')->storeAs('menu_image', $fileName);
            }else{
                $path = $request['hidden_menu_image'];
            }           
            $UpdateDetails = Posts::where('id', $request->id)->update(array(
                "title" => $request->title,
                "description" => $request->description,
                "images" => $path,
                "price" => $request->price,
            ));
        }else{
            $UpdateDetails = Menu::where('id', $request->id)->update(array(
            "title" => $request->title,
            "description" => $request->description,
            "price" => $request->price,
           
        ));
    
          }
          
          return redirect()->route('menu.index')
                       ->with('success','Menu updated successfully');
        }


    public function destroy($id)
    {
        $idd = Menu::findOrFail($id);
        $idd->delete();
        return redirect()->route('menu.index')
            ->with('success','Menu deleted successfully'); 
    }
}
