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

    /*public function test($id){
        $search = request('search');
        return view('product', compact('id', 'search'));
    }*/
}
