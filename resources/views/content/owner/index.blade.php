@php
$isMenu = false;
$navbarHideToggle = false;
@endphp

@extends('layouts/contentNavbarLayout')

@section('title', 'Owner')

@section('content')

<div class="container">
    <h1>wellcome back</h1>
    <div class="row">
        <div class="col-12">

            <div class="card-body d-flex justify-content-between">
                <a class="btn btn-primary" href="/dashboard/owner/meals" style="color:white;">Meals</a>
                <!-- <a class="btn btn-primary" href="/dashboard/owner/edit" style="color:white;">edit</a> -->
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-lg-6 mb-3">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Orders</h5>
                    <h6 class="card-subtitle text-muted">Support card subtitle</h6>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>iteams</th>
                                    <th>total</th>
                                    <th>location</th>
                                    <th>Status</th>

                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">

                                @isset($orders)
                                @foreach ($orders as $order)
                                <tr>
                                    <th><a href="/dashboard/owner/items/{{$order->id}}">meals</a></th>
                                    <td>{{$order->total}}</td>
                                    <td>{{$order->location_id}}</td>


                                    @if($order->is_aproved==0 && $order->is_canceled==0)
                                    <td>
                                        <form id="aproveform" action="{{url('dashboard/owner/items/aprove/')}}/{{$order->id}}" method="post">
                                            @csrf
                                            <input type="submit" class="btn btn-primary" value="aprove">
                                        </form>

                                    </td>
                                    <td>
                                        <form id="cancelform" action="{{url('dashboard/owner/items/cancel/')}}/{{$order->id}}" method="post">
                                            @csrf
                                            <input type="submit" class="btn btn-primary" value="cancel">
                                        </form>
                                    </td>
                                    @elseif($order->is_aproved==1)
                                    <td>
                                        <span class="badge bg-label-success me-1">approved</span>
                                    </td>
                                    @else
                                    <td>
                                        <span class="badge bg-label-warning me-1">Canceled</span>
                                    </td>
                                    @endif




                                </tr>
                                @endforeach
                                @endisset
                            </tbody>
                        </table>
                    </div>
                    <!-- <a href="javascript:void(0);" class="card-link">Card link</a>
                    <a href="javascript:void(0);" class="card-link">Another link</a> -->
                </div>
            </div>
        </div>


        <div class=" col-md-6 col-lg-6 card mb-3">
            <div class="card-body">
                <h5 class="card-title">Restaurant details</h5>
                <table class="table">
                    <tbody class="table-border-bottom-0">

                        <tr>
                            <th>
                                Picture
                            </th>
                            <td>
                                <img src="{{ asset('/images/restaurants/'.$restaurant->image) }}" alt="image" style="max-width: 100px;
                                                                                       max-height: 100px;">
                            </td>
                        </tr>
                        <tr>
                            <th>
                                name
                            </th>
                            <td>
                                {{$restaurant->name}}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Location
                            </th>
                            <td>
                                {{$restaurant->location_id}}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Category
                            </th>
                            <td>
                                {{$restaurant->category_id}}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Rating
                            </th>
                            <td>
                                @if($restaurant->number_of_rating <= 0) No reviews @else {{$restaurant->rating / $restaurant->number_of_rating}} @endif </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection