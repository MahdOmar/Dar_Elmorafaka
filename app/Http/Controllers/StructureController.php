<?php

namespace App\Http\Controllers;

use App\Models\Structure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class StructureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $structures = Structure::all();
        $users = User::with('structure')->get();
        return view("structures.index",compact(['users','structures']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $structures = Structure::all();


        return view("structures.create",compact(['structures']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
           
        ]);

       

        $data = $request->all();
        $data['password'] = Hash::make($request['password']);
        

        $status = User::create($data);
        if($status)
        {
            return redirect()->route('structure')->with('success','User successfully created ');

        }
        else
        {
            return back()->with('error','Something went wrong');

        }

        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $user = User::with('structure')->where('id',$id)->first();
        error_log($user);
        $structures = Structure::all();


        return view("structures.edit",compact(['structures','user']));
       
 
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);

        if($user)
        {
            $this->validate($request, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'. $user->id],
                "structure_id" =>['required'],
    
               
            ]);
    
           
    
            $data = $request->all();
           
            
    
            $status = $user->fill($data)->save();
            if($status)
            {
                return redirect()->route('structure')->with('success','User successfully updated ');
    
            }
            else
            {
                return back()->with('error','Something went wrong');
    
            }
    

        }
        
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        
        if($user){
            $status = $user->delete();
            if($status){
                return redirect()->route('structure')->with('success','Successfully deleted');
            }
            else{
                return back()->with('error','Something went wrong');
            }
        }
        else{
            return back()->with('error','Data not found');
        }
    }

    public function reset(string $id)
    {
        $user = User::find($id);

        $user->password = Hash::make('user');
        $user->save();
        return redirect()->route('structure')->with('success','Pasword reset Successfully');

    }


    public function changerly()
    {
        return view('structures.changepwd');
    }






    public function changer(Request $request)
    {
        

        $this->validate($request, [
            'current_password' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
           
        ]);

        error_log('confffffffffffffffffffffff');

        $user = User::find(Auth::id());

        
    if (!Hash::check($request->current_password, $user->password)) {


        return redirect()->back()->with('error', 'The current password is incorrect.');
    }

    $user->update(['password' => Hash::make($request->password)]);

    return redirect()->back()->with('success', 'Password changed successfully.');

        

    }


}
