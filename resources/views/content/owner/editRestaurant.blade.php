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
        <h5 class="mb-0">Basic Layout</h5> <small class="text-muted float-end">Cutomer</small>
      </div>
      <div class="card-body">
        <form action="{{url('dashboard/editcutomer/')}}/{{$data->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-name">Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="basic-default-name"  value="{{ $data->name }}" placeholder="John Doe" name="name" />
            </div>
          </div>
          <div class="mb-3 row">
          <label for="html5-date-input" class="col-md-2 col-form-label">Date</label>
          <div class="col-md-10">
            <input class="form-control" type="date" value="2021-06-18" id="html5-date-input" value="{{ $data->expired_date }}" name="expired_date">
          </div>
        </div>
          
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-email">Email</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <input type="text" id="basic-default-email" value="{{ $data->email }}" name="email" class="form-control" placeholder="john.doe" aria-label="john.doe" aria-describedby="basic-default-email2" />
                <span class="input-group-text" id="basic-default-email2">@example.com</span>
              </div>
              
            </div>
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