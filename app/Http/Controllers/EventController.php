<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(){
        $search = request('search');

        if($search){
            $events = Event::where([
                ['title', 'like', "%{$search}%"]
            ])->get();
        }else{
            $events = Event::All();
        }

        
        return view('welcome', compact(['events', 'search']));
    }

    public function create(){
        return view('events.create');
    }

    public function store(Request $request){

        $event = new Event();
        
        $event->title = $request->title;
        $event->date = $request->date;
        $event->city = $request->city;
        $event->private = $request->private;
        $event->description = $request->description;
        $event->items = $request->items;
        
        //image upload
        if($request->hasFile('image') && $this->validate($request, ['image' => 'required|image|mimes:jpeg,png,jpg|max:4012'])){
            $requestImage = $request->file('image');
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName().strtotime('NOW')).".".$extension;

            $requestImage->move(public_path('img/events'), $imageName);
            $event->image = $imageName;
        }
        
        $event->save();

        return redirect('/')->with('msg', 'Evento criado com sucesso!');
    }

    public function show($id){
        $event = Event::findOrFail($id);
        return view('events.show', compact('event'));
    }

    /*public function test($id){
        $search = request('search');
        return view('product', compact('id', 'search'));
    }*/
}
