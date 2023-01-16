@extends('layouts/contentNavbarLayout')

@section('title', 'Restaurant ')

@section('content')

<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Restaurant /</span> Restaurant Tables
</h4>
<div class="">
<button type="button" class="btn btn-primary"><a href="/dashboard/createRestaurant" style="color: white;">ADD</a></button>
</div>
<br>
<div class="card">
  <h5 class="card-header">Table Basic</h5>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr>
          <th>Restaurant</th>
          <th>name</th>
          <th>Location</th>
          <th>Category</th>
          <th>Owner</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
      @foreach ($resturant as $data)
         <tr>
         <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>
            <!-- {{$data->img}} -->
            <img src="{{ asset('/images/restaurants/'.$data->image) }}" alt="image" style="max-width: 100px;
                                                                                       max-height: 100px;">
         </strong></td>
         <td>{{$data->name}}</td>
         <td>{{$data->location_id}}</td>
         <td>{{$data->category_id}}</td>
         <td>{{$data->user_id}}</td>
         
         

         <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
               
                <a class="dropdown-item" href="javascript:del('{{$data->id}}')"><i class="bx bx-trash me-1"></i> Delete</a>
              </div>
            </div>
          </td>
         </tr>
      @endforeach
        
      </tbody>
   </table>
   <div class="links" style="max-width: 40px;margin-left: 40px;margin-top: 25px; margin-bottom: 25px;">
   {{$resturant->onEachSide(5)->links()}}
</div>

</div>
</div>
<form id="Form" action="" method="post">
  @csrf
  </form>
  <form id="Form2" action="" method="get">
  @csrf
  </form>
</div>
<script>
   function del (id) {
      var l ="/dashboard/delRestaurant/"+id;
      console.log(l);
      document.getElementById("Form").action = l; 
      document.getElementById("Form").submit(); 
   
   }
   function edit (id) {
      var l ="/dashboard/editRestaurant/"+id;
      console.log(l);
      document.getElementById("Form2").action = l; 
      document.getElementById("Form2").submit(); 
   
   }
</script>
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