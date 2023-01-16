@extends('layouts/contentNavbarLayout')

@section('title', 'Cutomers ')

@section('content')

<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Cutomers /</span> Cutomers Tables
</h4>
<div class="">
<a class="btn btn-primary" href="/dashboard/addcutomer" style="color: white;">ADD</a>
</div>
<br>
<div class="card">
  <h5 class="card-header">Table Basic</h5>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr>
          <th>Restaurant</th>
          <th>Client</th>
          <th>Email</th>
          <th>Status</th>
          <th>expired date</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
      @foreach ($Cutomers as $user)
         <tr>
         <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$user->restaurant_id}}</strong></td>
         <td>{{$user->name}}</td>
         <td>{{$user->email}}</td>
         
         @if ($user->expired == 1)
         <td><span class="badge bg-label-primary me-1">Active</span></td>
         @else
         <td><span class="badge bg-label-warning me-1">Pending</span></td>
         @endif
         
         <td>{{$user->expired_date}}</td>

         <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="javascript:edit('{{$user->id}}')"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                <a class="dropdown-item" href="javascript:del('{{$user->id}}')" ><i class="bx bx-trash me-1"></i> Delete</a>
              </div>
            </div>
          </td>
         </tr>
      @endforeach
        
      </tbody>
    </table>
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
      var l ="/dashboard/delcutomer/"+id;
      console.log(l);
      document.getElementById("Form").action = l; 
      document.getElementById("Form").submit(); 
   
   }
   function edit (id) {
      var l ="/dashboard/editcutomer/"+id;
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