@extends('layouts/contentNavbarLayout')

@section('title', 'Cutomers ')

@section('content')


  <!-- Basic Layout -->
  <div class="col-xxl">
    <div class="card mb-4">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Basic Layout</h5> <small class="text-muted float-end">Cutomer</small>
      </div>
      <div class="card-body">
        <form action="{{url('dashboard/createlocations')}}" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-name">Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="basic-default-name" placeholder="italian" name="name" />
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-phone">City</label>
            <div class="col-sm-10">
            <select id="defaultSelect" name="city_id" class="form-select">
               @foreach($data as $r)
               <option value="{{$r->id}}">{{$r->name}}</option>   
               @endforeach
               
          </select>
              <!-- <input type="text" id="basic-default-phone" name="restaurant_id" class="form-control phone-mask" placeholder="number" aria-label="658 799 8941" aria-describedby="basic-default-phone" /> -->
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