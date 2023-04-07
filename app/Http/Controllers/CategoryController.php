<?php
namespace App\Http\Controllers;
use File;
use DataTables;
use App\Models\Category;
use Illuminate\Http\Request;
class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::latest()->paginate();
        return view('category.index', compact('category')) ->with('i', (request()->input('page', 1) - 1) * 5);    
    }
    public function create()
    {
        return view('category.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);
        $data = Category::create([
            'title' => $request->title,
        ]);
        return redirect()->route('category.index')
            ->with('success','Category has been created successfully.');
    }
    public function show($id)
    {
        $category= Category::find($id);
        return view('category.show',compact('category'));
    }
    public function edit($id)
    {
        $category= Category::find($id);
        return view('category.edit',compact('category'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',     
        ]);
          $UpdateDetails = Category::where('id', $request->id)->update(array(
            "title" => $request->title,
        ));
        return redirect()->route('category.index')
                       ->with('success','Category updated successfully');
    }
    public function destroy($id)
    {
        $idd = Category::findOrFail($id);
        $idd->delete();
        return redirect('/category')->with('completed', 'Category has been deleted');
    }
}
