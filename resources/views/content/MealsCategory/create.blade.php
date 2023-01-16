@extends('layouts/contentNavbarLayout')

@section('title', 'Meal Category ')

@section('content')


  <!-- Basic Layout -->
  <div class="col-xxl">
    <div class="card mb-4">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Basic Layout</h5> <small class="text-muted float-end">Meal Category</small>
      </div>
      <div class="card-body">
        <form action="{{url('dashboard/createmealCategories')}}" method="POST" enctype="multipart/form-data">
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