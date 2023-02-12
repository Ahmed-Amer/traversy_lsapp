<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $title = "Home Page";
        return view('pages.index', compact('title'));
    }

    public function about()
    {
        $title = "About us Page";
        return view('pages.about')->with('title', $title);
    }

    public function features()
    {
        $data = array(
            'title' => 'Features',
            'features' => ['Create Post', 'Upload Media']
        );
        return view('pages.features')->with($data);
    }
}
