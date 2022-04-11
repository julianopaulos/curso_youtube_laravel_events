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

    public function store(Request $request){

        $event = new Event();
        
        $event->title = $request->title;
        $event->city = $request->city;
        $event->private = $request->private;
        $event->description = $request->description;
        
        $event->save();

        return redirect('/');
    }

    /*public function test($id){
        $search = request('search');
        return view('product', compact('id', 'search'));
    }*/
}
