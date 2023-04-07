<?php

namespace App\Http\Controllers;

use App\Models\AllPosts;
use App\Models\Industry;
use App\Models\Category;
use Illuminate\Http\Request;
use File;

class AllPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $all_posts = AllPosts::latest()->paginate();
    
        
       return view('all_posts.index',compact('all_posts'))
          ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $industryType = Industry::select('id', 'industry_type')->get();
        $category = Category::select('id', 'title')->get();

         return view('all_posts.create', compact('industryType','category'));
      

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'industry_type' => 'required',
            'category_type' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'caption' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'status'=> 'required'

            ]);
             
            $file1 = $request->file('image');
            $fileName1 = $request->file('image')->getClientOriginalName();             
            $path1 = $request->file('image')->storeAs('allpost_image', $fileName1);
            $file2 = $request->file('thumbnail');
            $fileName2 = $request->file('thumbnail')->getClientOriginalName();             
            $path2 = $request->file('thumbnail')->storeAs('allpost_thumbnail', $fileName2);

            //$industryType = select::Industry('id', 'industry_type')->get();

            $data = AllPosts::create([
            'name' => $request->name,
            'industry_type' => $request->industry_type,
            'category_type' => $request->category_type,
            'description' => $request->description,
            'image' => $path1,
            'thumbnail' => $path2,
            'caption'=>  $request->caption,
            'start_date'=>  $request->start_date,
            'end_date'=>  $request->end_date,
            'status'=> $request->status,

        ]);
            return redirect()->route('allposts.index')
          ->with('success','all posts has been created successfully.');

       

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\All_Posts  $all_Posts
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $data= AllPosts::find($id);
        return view('all_posts.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\All_Posts  $all_Posts
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $industryType = Industry::select('id', 'industry_type')->get();
        $data= AllPosts::find($id);
        return view('all_posts.edit',compact('data', 'industryType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\All_Posts  $all_Posts
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'industry_type' => 'required',
            'category_type' => 'required',
            'description' => 'required',
            'caption' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'status'=> 'required'
      ]);

        
// main image start
    if(($_FILES['allpost_image']['name'] != '') && ($request->hidden_allpost_image != '')){
            $file1 = $request->file('allpost_image');
            $fileName1 = $request->file('allpost_image')->getClientOriginalName(); 
            $path1 = $request['allpost_image']->storeAs('allpost_image', $fileName1);

    }else{
            $file1 = $request->file('hidden_allpost_image');
            $fileName1 = $request->file('hidden_allpost_image'); 
            $path1 = $request['hidden_allpost_image'];
    
    }

   
// // main image end
   

// thuumb image start
    if(($_FILES['allpost_thumbnail']['name'] != '') && ($request->hidden_allpost_thumbnail != '')){
    $file2 = $request->file('allpost_thumbnail');
    $fileName2 = $request->file('allpost_thumbnail')->getClientOriginalName();  
    $path2 = $request['allpost_thumbnail']->storeAs('allpost_thumbnail', $fileName2);
  
    }else{

    $file2 = $request->file('hidden_allpost_thumbnail');
    $fileName2 = $request->file('hidden_allpost_thumbnail');       
     $path2 = $request['hidden_allpost_thumbnail'];
    }
    
// thuumb image end
    

    $UpdateDetails = AllPosts::where('id', $request->id)->update(array(
    'name' => $request->name,
    'industry_type' => $request->industry_type,
    'category_type' => $request->category_type,
    'description' => $request->description,
    'image' => $path1,
    'thumbnail' => $path2 ,
    'caption'=>  $request->caption,
    'start_date'=>  $request->start_date,
    'end_date'=>  $request->end_date,
    'status'=> $request->status,

    ));
      return redirect()->route('allposts.index')
                   ->with('success','updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\All_Posts  $all_Posts
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        //
        $id=AllPosts::find($id);
        $id->delete();
        return redirect('/allposts')->with('success','Deleted successfully');

    }
}
