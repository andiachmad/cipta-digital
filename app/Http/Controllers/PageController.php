<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project; 

class PageController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function projects()
    {
        // Later we will fetch from DB
        // $projects = Project::all();
        // return view('pages.projects', compact('projects'));
        return view('pages.projects');
    }

    public function contact()
    {
        return view('pages.contact');
    }
}
