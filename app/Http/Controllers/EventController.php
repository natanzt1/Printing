<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Event;
use App\Category;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = category::all();
        return view('event/create-event', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $api_key = "AIzaSyBPFFbLQcq3u3L9BqtaKlcyEPs-h4j2RGM";

        $this->validate(request(),[
            'event_name'=> 'required',
            'event_category'=> 'required',
            'event_starts_date'=> 'required',
            'event_starts_time'=> 'required',
            'event_ends_date'=> 'required',
            'event_ends_time'=> 'required',
            'event_location'=> 'required',
            'event_lat' => 'required',
            'event_lng' => 'required',
            'event_description' => 'required'
        ]);

        function get_data($url_par) {
            $ch = curl_init();
            $timeout = 5;
            curl_setopt($ch, CURLOPT_URL, $url_par);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
            $data = curl_exec($ch);
            curl_close($ch);
            return $data;
        }
        $i = 1;
        $target_dir = "/!custom/design/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        return "sukses";

        $lat = $request->get('event_lat');
        $lng = $request->get('event_lng');
        $image_count = $request->get('image_count');
        return $image_count;
        $url = "https://maps.googleapis.com/maps/api/geocode/json?latlng=$lat,$lng&key=$api_key";
        $html= get_data("$url");
        $data = json_decode($html);
        $result = $data->results[0]->address_components;
        $subdistrict = $result[2]->long_name;
        $city = $result[3]->long_name;
        $province = $result[4]->long_name;

        $event = new event();
        $event->name = $request->get('event_name');
        $event->id_category = $request->get('event_category');
        $event->subdistrict = $subdistrict;
        $event->city = $city;
        $event->province = $province;
        $event->start_date = $request->get('event_starts_date');
        $event->start_time = $request->get('event_starts_time');
        $event->end_date = $request->get('event_ends_date');
        $event->end_time = $request->get('event_ends_time');
        $event->location = $request->get('event_location');
        $event->lat = $request->get('event_lat');
        $event->lng = $request->get('event_lng');
        $event->description = $request->get('event_description');
        $event->save();
        return "sukses";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }

    public function filterPage()
    {
 
        $cities = event::groupBy('city')->get();
        $category = category::all();
        return view('event/filter', compact('cities','category'));
    }

    public function filterProcess(Request $request)
    {
        $event_name = $request->get('event_name');
        $category = $request->get('category');
        $city = $request->get('city');

        $event = event::where('city',$city)
                ->where('id_category',$category)
                ->where('name','like',"%$event_name%")
                ->get();
        return $event;
    }
}
