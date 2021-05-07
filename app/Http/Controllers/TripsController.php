<?php

namespace App\Http\Controllers;

use App\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TripsController extends Controller
{
    public function search(Request $request){
        DB::connection()->enableQueryLog();
        $query = Trip::query();
        //get the full url of the search result page to be used to go back
        //to the search results page after viewing the trip details page
        $url = $request->fullUrl();

        if ($request->input('cancelled')){

            $query->withoutGlobalScope('completed');
        }
        if (empty($request->input('q')) && empty($request->input('distance')) && empty($request->input('time'))){
            return redirect()->back()->with('warning', 'Search Input Empty!');
        }

        if ($request->input('q')){

            $q = $request->input('q');

            $query->where('pickup_location', 'LIKE', '%' . $q . '%')
                   ->orWhere('dropoff_location', 'LIKE', '%' . $q . '%')
                   ->orWhere('type', 'LIKE', '%' . $q . '%')
                   ->orWhere('driver_name', 'LIKE', '%' . $q . '%')
                   ->orWhere('car_make', 'LIKE', '%' . $q . '%')
                   ->orWhere('car_model', 'LIKE', '%' . $q . '%')
                   ->orWhere('car_number', 'LIKE', '%' . $q . '%');
        }

        if (!empty($request->input('distance'))){

            $distance = $request->input('distance');

            if ($distance == "underThree"){
                $query->where('distance', '<', 3);
            }elseif ($distance == "underEight"){
                $query->whereBetween('distance',  [3, 8]);
            }elseif ($distance == "underFifteen"){
                $query->whereBetween('distance',  [8, 15]);
            }elseif ($distance === "aboveFifteen"){
                $query->where('distance', '>', 15);
            }
        }

        if (!empty($request->input('time'))) {

            $time = $request->input('time');

            if ($time == "underFive") {
                $query->where('duration', '<', 5);
            } elseif ($time == "underTen") {
                $query->whereBetween('duration', [5, 10]);
            } elseif ($time == "underTwenty") {
                $query->whereBetween('duration', [10, 20]);
            } elseif ($time === "aboveTwenty") {
                $query->where('duration', '>', 20);
            }
        }

        //get query count
        $dataCount = $query->count();

        $data = $query->paginate(10);

        $data->appends($request->input());

        //update previous url for the back button in trip details page
        DB::table('trips')->update(['previous_url' => $url]);

        return view('search_result', compact('data', 'dataCount', 'url'));
    }

    public function show($id)
    {
        $trip = Trip::withoutGlobalScope('completed')->find($id);

        return view('show',compact('trip'));
    }


    public function details(){

        return view('details')->with('success');
    }

    public function index()
    {


    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {

    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }


}
