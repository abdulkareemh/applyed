@php
$isMenu = false;
$navbarHideToggle = false;
@endphp

@extends('layouts/contentNavbarLayout')

@section('title', 'itmes')

@section('content')

<div class="container">
   
   <button type="button" class="btn btn-primary bb-3"><a href="/dashboard/owner/" style="color:white;">back</a> </button>
   <div class="card">
      
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr>
          <th>image</th>
          <th>name</th>
          <th>price</th>
          
         
          
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
      @foreach ($meals as $meal)
         <tr>
         <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>
           
            <img src="{{ asset('/images/meals/'.$meal->image) }}" alt="image" style="max-width: 100px;
                                                                                       max-height: 100px;">
         </strong></td>
         <td>{{$meal->name}}</td>
         <td>{{$meal->price}}</td>
         
         

         
         
         </tr>
      @endforeach
        
      </tbody>
    </table>
  </div>
</div>
</div>


@endsection