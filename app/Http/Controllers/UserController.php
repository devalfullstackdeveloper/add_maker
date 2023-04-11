<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::latest()->paginate();
      
        return view('user.index',compact('user'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data= User::find($id);
        return view('user.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $data= user::find($id);
        return view('user.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
        'namePrefix' => 'max:255',
            'firstname'=> 'max:255',
            'lastname'=> 'max:255',
            'middlename'=> 'max:255',
            'nickname'=> 'max:255',
            'nameSuffix'=> 'max:255',
            'email'=> 'max:255',
            'mobileno'=> 'max:255',
            'google_id'=> 'max:255',
            'facebook_id'=> 'max:255',
            'instagram_id'=> 'max:255',
            'apple_id'=> 'max:255'
      ]);

    //  print_r($request->all());exit();  

        $UpdateDetails = User::where('id', $request->id)->update(array(
            'namePrefix' => $request->namePrefix,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'middlename' => $request->middlename,
            'nickname' => $request->nickname,
            'nameSuffix' => $request->nameSuffix,
            'email' => $request->email,
            'google_id' => $request->google_id,
            'facebook_id' => $request->facebook_id,
            'instagram_id' => $request->instagram_id,
            'apple_id' => $request->apple_id
     ));

      return redirect()->route('user.index')
                   ->with('success','user updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $idd = User::findOrFail($id);
        $idd->delete();
        return redirect('/user')->with('completed', 'user has been deleted');
    }
}
