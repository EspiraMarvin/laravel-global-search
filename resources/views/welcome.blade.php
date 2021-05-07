@extends('base')

@section('content')

    <div class="container">

        @if(session('warning'))
            <div  style="text-align: center" class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong style="text-align: center">{{ session('warning') }}</strong>
            </div>
        @endif

    <div class="">
        <div class="content">
            <h1>Trip Search</h1>
            <div class="container">


                <form action="/search_result" method="GET" role="search">
                    <div class="form-group">
                        <input type="text" placeholder="Search pickup location, drop off location, type, driver name,car make, car model, and car number."
                               value="" name="q" autocomplete="off" class="col-10">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </div>

                    <div class="mt-2">
                        <input style="color: green !important" class="form-check-input " type="checkbox"
                               name="cancelled" id="cancelled"> Include Cancelled Trips
                    </div>
                    <div class="row mt-4">
                        <div class="col-6">
                            <h6>Distance</h6>

                            <input type="radio" id="distance" name="distance" value="" checked>
                            <label for="distance">Any</label><br>
                            <input type="radio" id="underThree" name="distance" value="underThree">
                            <label for="underThree">Under 3km</label><br>
                            <input type="radio" id="underEight" name="distance" value="underEight">
                            <label for="underEight">3 to 8km</label><br>
                            <input type="radio" id="underFifteen" name="distance" value="underFifteen">
                            <label for="underFifteen">8 to 15km</label><br>
                            <input type="radio" id="aboveFifteen" name="distance" value="aboveFifteen">
                            <label for="aboveFifteen">More than 15km</label><br>
                        </div>
                        <div class="col-6">
                            <h6>Time</h6>
                            <input type="radio" id="time" name="time" value="" checked>
                            <label for="time">Any</label><br>
                            <input type="radio" id="underFive" name="time" value="underFive">
                            <label for="underFive">Under 5min</label><br>
                            <input type="radio" id="underTen" name="time" value="underTen">
                            <label for="underTen">5 to 10min</label><br>
                            <input type="radio" id="underTwenty" name="time" value="underTwenty">
                            <label for="underTwenty">10 to 20min</label><br>
                            <input type="radio" id="aboveTwenty" name="time" value="aboveTwenty">
                            <label for="aboveTwenty">More than 20min</label><br>
                        </div>


                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection
