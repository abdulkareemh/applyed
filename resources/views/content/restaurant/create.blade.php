@extends('layouts/contentNavbarLayout')

@section('title', 'Restaurant ')

@section('content')


  <!-- Basic Layout -->
  <div class="col-xxl">
    <div class="card mb-4">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Basic Layout</h5> <small class="text-muted float-end">Restaurant</small>
      </div>
      <div class="card-body">
        <form action="{{url('dashboard/createRestaurant')}}" method="POST" enctype="multipart/form-data">
            @csrf
          
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
          
            <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-name">Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="basic-default-name" placeholder="John Doe" name="name" />
            </div>
          </div>
          <div class="mb-3 row">
          <label for="html5-date-input" class="col-md-2 col-form-label">image</label>
          <div class="col-md-10">
            <input class="form-control" type="file" value="2021-06-18" id="html5-date-input" name="image">
          </div>
        </div>
          
          
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-phone">Location</label>
            <div class="col-sm-10">
            <select id="defaultSelect" name="location_id" class="form-select">
               @foreach($loc as $r)
               <option value="{{$r->id}}">{{$r->name}}</option>   
               @endforeach
               
          </select>
         </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-phone">Category</label>
            <div class="col-sm-10">
            <select id="defaultSelect" name="category_id" class="form-select">
               @foreach($categories as $r)
               <option value="{{$r->id}}">{{$r->name}}</option>   
               @endforeach
               
          </select>
         </div>
          </div>
          
          <div class="row justify-content-end">
            <div class="col-sm-10">
              <input type="submit" class="btn btn-primary" value="submit"/>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection