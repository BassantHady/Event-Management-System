<?php

namespace App\Http\Controllers;
use App\Models\Event;
use App\Models\User;
use App\Models\Admin;

use Illuminate\Http\Request;
use Pest\Collision\Events;

class EventsController extends Controller
{
    public function indexUSer(){
        //select from database
        $eventsFromDB = Event::all();
        //dd($eventsFromDB);
        /*
        $allEvents = [
            ['id'=>1, 'title'=> "Summer Beats Festival", 'description'=> "Join us for an unforgettable night of live music featuring top DJs and bands.", 'location'=>"Cairo International Stadium", 'day'=>"22", 'month'=>"Sep"],
            ['id'=>1, 'title'=> "AI & Future Tech 2025", 'description'=> "A conference bringing together innovators to discuss the latest in Artificial Intelligence and Machine Learning.", 'location'=>"Smart Village, Giza", 'day'=>"10", 'month'=>"Oct"],
            ['id'=>1, 'title'=> "Hope for Children Gala", 'description'=> "An evening of inspiration, fundraising, and entertainment to support underprivileged kids.", 'location'=>"Four Seasons Hotel, Alexandria", 'day'=>"05", 'month'=>"Nov"],
            ['id'=>1, 'title'=> "Marathon for Health", 'description'=> "A community marathon to promote fitness and raise awareness for heart health.", 'location'=>"Nile Corniche, Luxor", 'day'=>"15", 'month'=>"Dec"]
        ];
        */
        return view('events.indexUser', ['events'=>$eventsFromDB]);
    }

    public function index(){
        //select from database
        $eventsFromDB = Event::all();
    
        return view('events.index', ['events'=>$eventsFromDB]);
    }
    
    public function edit(Event $event){
        return view('events.edit', ['event'=>$event]);
    }

    public function update($eventId){
        //get the user data
        $title = request()->title;
        $description = request()->description;
        $location = request()->location;
        $date = request()->date;
        //update the user data in database
        //select the event
        $singleEventDB = Event::find($eventId);
        //update the event data
        $singleEventDB->update([
            'title'=>$title,
            'description'=>$description,
            'location'=>$location,
            'dateTime'=>$date
        ]);
        return to_route('events.index');
    }

    public function create(){
        return view('events.create');
    }

    public function store(){
        //get the user data
        $title = request()->title;
        $description = request()->description;
        $location = request()->location;
        $date = request()->date;
        //store the submited data in database
        Event::create([
            'title'=>$title,
            'description'=>$description,
            'location'=>$location,
            'dateTime'=>$date
        ]);
        //redirection to the events.index
        return to_route('events.index');
    }

    public function destroy($eventId){
        //select or find event
        $event = Event::findOrFail($eventId);
        //delete the event from the database
        $event->delete();

        return to_route('events.index');
    }

    public function show(Event $event){
        return view('events.show', ['event' => $event]);
    }

}

