<?php

namespace App\Http\Controllers;

use App\Models\Orientation;
use App\Models\Project;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('layouts.dashboard');
    }

    public function dashboard()
    {
        $projets = Project::all();
        $projets_orientes = Project::where('orientation','!=','Non Oriente')->get();
        $projets_valides = Project::where('validation','!=','Non Valide')->get();
        $projets_pub = Orientation::all();



        return view('dashboard.index',compact(['projets','projets_orientes','projets_valides','projets_pub']));
    }
}
