@php
$isMenu = false;
$navbarHideToggle = false;
@endphp

@extends('layouts/contentNavbarLayout')

@section('title', 'meals')

@section('content')

<div class="container">
   <h1>Meals</h1>
   <div class="pb-3">
   <button type="button" class="btn btn-primary"><a href="/dashboard/owner/createmeal" style="color:white;">Add</a> </button>
   <button type="button" class="btn btn-primary"><a href="/dashboard/owner" style="color:white;">Main</a> </button>
   </div>
   <div class="card">
  <h5 class="card-header">Table Iteams</h5>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr>
          <th>image</th>
          <th>name</th>
          <th>price</th>
          <th>description</th>
          <th>Category</th>
          
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
         <td>{{$meal->description}}</td>
         <td>{{$meal->category_id}}</td>

         
         <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
              </div>
            </div>
          </td>
         </tr>
      @endforeach
        
      </tbody>
    </table>
  </div>
</div>
</div>


@if (Session::has('success'))
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <script>
            swal('نجاح !', '{{ Session::get('success') }}', 'success');
        </script>
        <?php Session::forget('sweetalert'); ?>
    @endif
    @if (Session::has('error'))
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <script>
            swal('فشل !', '{{ Session::get('error') }}', 'error');
        </script>
        <?php Session::forget('sweetalert'); ?>
    @endif

    
@endsection