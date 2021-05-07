@extends('base')

@section('content')

    <div class="container">
    <div class="mt-5">
        <div class="content">
            <a style="float:left" href="/" class="btn btn-danger">Go Back</a>

            <h1>Trips ({{isset($dataCount) ? $dataCount: ''}})</h1>
            <div class="container">
                @if(count($data) > 0)
                    @foreach($data as $trip)
{{--                        @if($trip->status === "COMPLETED")--}}
                        <a href="/trip/{{$trip->id}}" style="text-decoration: none">
{{--                            @endif--}}
                        <div class="card row mt-2">
                            <div class="row">
                                <div style="float: left" class="col-6">Start Time: {{$trip->pickup_date->format('Y-m-d H') }} {{$trip->pickup_date->format('g:i A')}}</div>
                                <div style="float: right" class="col-6">
                                    Trip Cost: {{isset($trip->cost) ? $trip->cost: ''}}{{isset($trip->cost_unit) ? $trip->cost_unit: ''}}<br>
                                    Rating:
                                    @php
                                    $rating=(object)['rate'=>3];
                                    for($i=0; $i<5; ++$i){
                                    echo '<i class="checked fa fa-star',($trip->driver_rating<=$i?'-o':''),'" aria-hidden="true"></i>';
                                    }
                                    @endphp
                                </div>
                            </div>


                        <div class="card-body">
                                <div>
                                    <h5 class="card-title" style="margin-left: -10px">
                                        Pickup &nbsp;<span><i class=" fa fa-map-marker"></i></span>
                                    {{isset($trip->pickup_location) ? $trip->pickup_location: ''}}
                                    </h5>
                                    <h5 class="card-title">
                                        Dropoff &nbsp;<span><i class=" fa fa-map-marker"></i></span>
                                    {{isset($trip->dropoff_location) ? $trip->dropoff_location: ''}}
                                    </h5>
                                </div>
                                @if($trip->status === "COMPLETED")
                                    <button style="float: right" class="btn btn-primary">{{isset($trip->status) ? $trip->status: ''}}</button>
                                @else
                                    <button style="float: right" class="btn btn-danger">{{isset($trip->status) ? $trip->status: ''}}</button>
                                @endif
                            </div>
                        </div>
{{--                            @if($trip->status === "COMPLETED")--}}
                        </a>
{{--                        @endif--}}
                    @endforeach
                @else
                    <div class="row text-center">
                        <p>No Trips to show</p>
                    </div>
                @endif
                <div class="mt-1">
                    {!! $data->links() !!}
                </div>

            </div>

        </div>
    </div>
</div>
@endsection
