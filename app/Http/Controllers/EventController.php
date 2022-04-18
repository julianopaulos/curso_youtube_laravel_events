<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
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

        $user = auth()->user();
        $event->user_id = $user->id;
        
        $event->save();

        return redirect('/')->with('msg', 'Evento criado com sucesso!');
    }

    public function show($id){
        $event = Event::findOrFail($id);
        $eventOwner = User::where('id', $event->user_id)->first();#$eventOwner->name
        #$eventOwner = User::where('id', $event->user_id)->first()->toArray(); #$eventOwner['name']

        return view('events.show', compact(['event', 'eventOwner']));
    }

    public function dashboard(){
        $user = auth()->user();
        
        $events = $user->events;

        $eventsAsParticipant = $user->eventsAsParticipant;
        
        return view('events.dashboard', compact(['events', 'eventsAsParticipant']));
    }

    public function destroy($id){
        $user = auth()->user();
        $event = Event::findOrFail($id);
        if($user->id != $event->user_id){
            return redirect('/dashboard');
        }
        $event->delete();
        return redirect('/dashboard')->with('msg', 'Evento excluído com sucesso!');
    }

    public function edit($id){
        $user = auth()->user();
        $event = Event::findOrFail($id);
        if($user->id != $event->user_id){
            return redirect('/dashboard');
        }
        return view('events.edit', compact('event'));
    }

    public function update(Request $request){
        $data = $request->all();

        //image upload
        if($request->hasFile('image') && $this->validate($request, ['image' => 'required|image|mimes:jpeg,png,jpg|max:4012'])){
            $requestImage = $request->file('image');
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName().strtotime('NOW')).".".$extension;

            $requestImage->move(public_path('img/events'), $imageName);
            $data['image'] = $imageName;
        }
        
        Event::findOrFail($request->id)->update($data);
        return redirect('/dashboard')->with('msg', 'Evento alterado com sucesso!');
    }

    public function joinEvent($id){
        $user = auth()->user();

        //o nome da função chamada aqui depende do nome que foi colocado na model (neste caso a model user)
        $user->eventsAsParticipant()->attach($id);
        $event = Event::findOrFail($id);
        
        return redirect('/dashboard')->with('msg', "Sua presença está confirmada no evento {$event->title}");
    }

    /*public function test($id){
        $search = request('search');
        return view('product', compact('id', 'search'));
    }*/
}
