<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function create(){
        return view('events.create');
    }

    public function test($id){
        $search = request('search');
        return view('product', compact('id', 'search'));
    }
}
