@php
$isMenu = false;
$navbarHideToggle = false;
@endphp

@extends('layouts/contentNavbarLayout')

@section('title', 'Owner')

@section('content')
<div class="col-xxl">
    <div class="card mb-4">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Basic Layout</h5> <small class="text-muted float-end">Meal</small>
      </div>
      <div class="card-body">
      @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <form action="{{url('dashboard/owner/createmeal')}}" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-name">Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="basic-default-name" placeholder="italian" name="name" />
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-name">Price</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="basic-default-name" placeholder="italian" name="price" />
            </div>
          </div>
          
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-phone">Category</label>
            <div class="col-sm-10">
            <select id="defaultSelect" name="category_id" class="form-select">
               @foreach($data as $r)
               <option value="{{$r->id}}">{{$r->name}}</option>   
               @endforeach
               
          </select>
              <!-- <input type="text" id="basic-default-phone" name="restaurant_id" class="form-control phone-mask" placeholder="number" aria-label="658 799 8941" aria-describedby="basic-default-phone" /> -->
            </div>
          </div>
          <div class="mb-3 row">
          <label for="html5-date-input" class="col-md-2 col-form-label">image</label>
          <div class="col-md-10">
            <input class="form-control" type="file" value="2021-06-18" id="html5-date-input" name="image">
          </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-name">Desctiption</label>
            <div class="col-sm-10">
              <textarea name="description" class="form-control" id="" cols="30" rows="2"></textarea>
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