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

            <div class="card-body">
                <button type="button" class="btn btn-primary"><a href="/dashboard/owner/meals" style="color:white;">Meals</a> </button>
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
                                    <button type="submit" form="aproveform" class="btn btn-primary">
                                        aprove
                                    </button>
                                </td>
                                <td>
                                    <input type="submit" form="cancelform" class="btn btn-primary" value="cancel">
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
                <a href="javascript:void(0);" class="card-link">Card link</a>
                <a href="javascript:void(0);" class="card-link">Another link</a>
            </div>
        </div>
    </div>


    <div class=" col-md-6 col-lg-6 card mb-3">
      
    </div>
    </div>
</div>

<form id="cancelform" action="{{url('dashboard/owner/items/cancel')}}" method="post">
    @csrf
</form>
<form id="aproveform" action="{{url('dashboard/owner/items/aprove')}}" method="post">
    @csrf
</form>

@endsection