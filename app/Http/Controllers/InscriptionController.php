<?php

namespace App\Http\Controllers;

use App\Models\Membre;
use App\Models\ProjectOwner;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::find((Auth::id()));
        if($user->name == "Mehdaoui Omar")
        {
            $projets = Project::with('structure')->get();
        }
        else{

            $projets = Project::where('stucture_id',$user->structure_id)->with('structure')->get();

        }

        error_log($projets);

        return view("Inscription.index",compact(['projets']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Inscription.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $this->validate($request,[
            'projet'=>'string|required',
            'lieu_projet'=>'string|required',
            'type_projet'=>'string|nullable',
            'nombre_participants'=>'numeric|nullable',
            'but_projet'=>'string|nullable',
            'domaine'=>'string|nullable',
            'categorie'=>'string|nullable',
            'concurrence'=>'string|nullable',
            'conditions'=>'string|required',
            'benifices'=>'string|required',
         
        ]);

        $user = User::find(Auth::id());

        error_log($user);
        $data = $request->all();
        $data['stucture_id'] = $user->structure_id;
        $data['user_id'] = $user->id;

        $status = Project::create($data);
        if($status)
        {
            return redirect()->route('projet.index')->with('success','Project successfully created ');

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
        $projet = Project::find($id);
        
       
          
        return view("Inscription.view",compact(['projet']));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $projet = Project::find($id);

        return view('Inscription.edit',compact(['projet']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $projet = Project::find($id);

        if($projet)
        {  $this->validate($request,[
            'projet'=>'string|required',
            'lieu_projet'=>'string|required',
            'type_projet'=>'string|nullable',
            'nombre_participants'=>'numeric|nullable',
            'but_projet'=>'string|nullable',
            'domaine'=>'string|nullable',
            'categorie'=>'string|nullable',
            'concurrence'=>'string|nullable',
            'conditions'=>'string|required',
            'benifices'=>'string|required',
         
        ]);

        $data = $request->all();
        $data['stucture_id'] = $projet->stucture_id;
        $data['user_id'] = $projet->user_id;
        $status = $projet->fill($data)->save();
        if($status)
        {
            return redirect()->route('projet.index')->with('success','Product successfully updated ');

        }
        else
        {
            return back()->with('error','Something went wrong');

        }

        }
        else{
            return back()->with('error','Data not found');
        }
      
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $projet = Project::find($id);
       
       
        if($projet){
          
            $status = $projet->delete();
           
            if($status){
                return redirect()->route('projet.index')->with('success','Successfully deleted');
            }
            else{
                return back()->with('error','Something went wrong');
            }
        }
        else{
            return back()->with('error','Data not found');
        }
    
     
    }

    public function membre(string $id)
    {
        $projet = Project::find($id);
        
       
          
        return view("Inscription.membre",compact(['projet']));
        
    }

    public function membreStore(Request $request)
    {
        
    if($request->membre_id != "")
    { 
        error_log("/////////////");
        $this->validate($request,[
            'nom'=>'string|required',
            'prenom'=>'string|required',
            'date_naissance'=>'date|required',
            'lieu_naissance'=>'string|required',
            'niveau_etude'=>'string|required',
            'residance'=>'string|required',
            'phone'=>'string|required',
            'email'=>'email|required|unique:membres,email,'.$request->membre_id,
         
         
        ]);
        
    
        $data = $request->all();
        $membre = Membre::find($request->membre_id);
        $status = $membre->fill($data)->save();
        if($status)
        {
            return redirect()->route('projet.membre', $request->projet_id)->with('success','Participant successfully updated ');

        }
        else
        {
            return back()->with('error','Something went wrong');

        }

    }
    else{
       
        $this->validate($request,[
            'nom'=>'string|required',
            'prenom'=>'string|required',
            'date_naissance'=>'date|required',
            'lieu_naissance'=>'string|required',
            'niveau_etude'=>'string|required',
            'residance'=>'string|required',
            'phone'=>'string|required',
            'email'=>'email|required|unique:membres,email',
         
         
        ]);
        
    
        $data = $request->all();
        $status = Membre::create($data);
    if($status)
    {
       
       
        $projectOwner = new ProjectOwner();
        $projectOwner->project_id = $request->projet_id;
        $projectOwner->membre_id = $status->id;
        $projectOwner->save();

        return redirect()->route('projet.membre', $request->projet_id)->with('success','Participant successfully created ');

    }
    else
    {
        return back()->with('error','Something went wrong');

    }

    }
   
    
       
        
       
         
    }

    public function membreShow(Request $request)
    {
       
        $membre = Membre::find($request->input('id'));
        
        return response()->json([
            "membre" => $membre
        ]);
    }

    public function membreDelete(string $id){
        $membre = Membre::find($id);
        $projectOwner = ProjectOwner::where('membre_id',$id)->first();
        $projet_id = $projectOwner->project_id;
        if($membre){
            $status = $membre->delete();
            $projectOwner->delete();
            if($status){
                return redirect()->route('projet.membre',$projet_id)->with('success','Successfully deleted');
            }
            else{
                return back()->with('error','Something went wrong');
            }
        }
        else{
            return back()->with('error','Data not found');
        }
    }



    public function orienter()
    {

        $project = Project::find(request('projectId'));
        $project->orientation = request('orientation');
        $project->save();
        return redirect()->route('projet.index')->with('success','Successfully Oriented');

    }

    public function valider()
    {

        $project = Project::find(request('projectId'));
        $project->validation = request('validation');
        $project->save();
        return redirect()->route('projet.index')->with('success','Successfully Validated');

    }





}
