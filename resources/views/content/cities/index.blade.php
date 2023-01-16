@extends('layouts/contentNavbarLayout')

@section('title', 'City ')

@section('content')

<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">City /</span> City Tables
</h4>
<div class="">
<button type="button" class="btn btn-primary"><a href="/dashboard/createcities" style="color: white;">ADD</a></button>
</div>
<br>
<div class="card">
  <h5 class="card-header">Table Basic</h5>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr>
          <th>City</th>
          
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
      @foreach ($data as $user)
         <tr>
         <td>{{$user->name}}</td>
         
         <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
              <a class="dropdown-item" href="javascript:del('{{$user->id}}')"><i class="bx bx-trash me-1"></i> Delete</a>
              </div>
            </div>
          </td>
         </tr>
      @endforeach
        
      </tbody>
    </table>
  </div>
</div>
<form id="Form" action="" method="post">
  @csrf
  </form>
<script>
   function del (id) {
      var l ="/dashboard/delcreatecities/"+id;
      console.log(l);
      document.getElementById("Form").action = l; 
      document.getElementById("Form").submit(); 
   
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