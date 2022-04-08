<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(){
        $events = Event::All();
        return view('welcome', compact('events'));
    }

    public function create(){
        return view('events.create');
    }

    public function test($id){
        $search = request('search');
        return view('product', compact('id', 'search'));
    }
}
