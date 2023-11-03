<?php

namespace App\Http\Controllers;

use App\Models\Orientation;
use App\Models\Project;
use App\Models\ProjectLinks;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrientationController extends Controller
{
    public function index()
    {

     $user = User::find((Auth::id()));

     if($user->name == "Mehdaoui Omar")
     {
        $orientations = Orientation::all();
     }
     else{

       

        $orientations = Project::join('orientations', 'projects.id', '=', 'orientations.project_id')
        ->where('projects.stucture_id', $user->structure_id)
    ->select('orientations.*')
    ->get();


     }

       

        return view("publicity.index",compact('orientations'));



    }

    public function create()
    {
        $user = User::find((Auth::id()));
        if($user->name == "Mehdaoui Omar")
        {
            $projects = Project::whereDoesntHave('orientation')->where('validation','!=','Non Valide')
            ->get();
        }
        else{
            
           
        $projects = Project::whereDoesntHave('orientation')->where('validation','!=','Non Valide')->where('stucture_id',$user->structure_id)
        ->get();

        }
      
        return view("publicity.create",compact('projects'));



    }

    public function store(Request $request)
    {
            
          
        $this->validate($request,[
            'title'=>'string|required',
            'description'=>'string|required',
            'photo'=>'string|required',
            'links'=>'array|required',
          
        ]);


        $data = $request->all();

        $data2 = $request->input('links');


        

        $status = Orientation::create($data);
        if($status)
        {
            foreach ($data2 as $item)
            {
                $project_link = new ProjectLinks();
                $project_link->project_id = $request->input('project_id');
                $project_link->link = $item;
                $project_link->save();

            }

            return redirect()->route('publicity')->with('success','Publicity successfully created ');

        }
        else
        {
            return back()->with('error','Something went wrong');

        }

      



    }

    public function show(string $id)
    {
        $orientation = Orientation::find($id);
        
       
        $links = Project::where('id',$orientation->project_id)->with('links')->first();
        
        return view("publicity.details",compact(['orientation']));
        
    }

    public function edit(string $id)
    {
        $orientation = Orientation::find($id);
       
       
        $project = Project::where('id',$orientation->project_id)->with('links')->first();
        
        return view("publicity.edit",compact(['orientation','project']));
        
    }

    public function update(Request $request,string $id)
    {

        $orientation = Orientation::find($id);
            
        if($orientation){

       
        $this->validate($request,[
            'title'=>'string|required',
            'description'=>'string|required',
            'photo'=>'string|required',
            'links'=>'array|required',
          
        ]);


        $data = $request->all();

        $data2 = $request->input('links');


        $status = $orientation->fill($data)->save();
        if($status)
        {
            $project_link = ProjectLinks::where('project_id',$orientation->project_id)->get();
            foreach ($data2 as $key => $item)
            {
                $project_link[$key]->link = $item;
                $project_link[$key]->save();

            }

            return redirect()->route('publicity')->with('success','Publicity successfully updated ');

        }
        else
        {
            return back()->with('error','Something went wrong');

        }

    }

      



    }

    public function destroy(string $id){
        $orientation = Orientation::find($id);
       
       
        if($orientation){
           $prl = ProjectLinks::where('project_id',$orientation->project_id)->get();
           error_log($prl);
            $status = $orientation->delete();
           
            if($status){
                return redirect()->route('publicity')->with('success','Successfully deleted');
            }
            else{
                return back()->with('error','Something went wrong');
            }
        }
        else{
            return back()->with('error','Data not found');  
        }
    }
     
}
