@extends("master")
@section("css")
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style type="text/css">  
       .buttoncolor{
          color:#ffff;
  }
  </style> 
@endsection
@section("content")
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper main">
       <!-- Content Header (Page header) -->
          <!-- /.card-header -->
          <div class="card-body ">
                <div class="callout callout-success">
                  <div class="row">
                    <div class="col-11">
                       <h3>Products</h3>
                    </div>
                    <div class="col-1">
                        <div class="btn-group btn-group-sm ">
                             <a href="{{url('ListUserProduct')}}" class="btn btn-success "><i class="fas fa-arrow-right buttoncolor"></i></a>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
              <!-- /.card-body -->
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
   <div class="container-fluid">
   <div class="row">
   <!-- left column -->
   <div class="col-md-8">
      <!-- jquery validation -->
      <div class="card card-primary">
         <!-- form start -->
         <form  method="POST" action="{{url('AddUserProduct')}}"class="row g-3">
            @csrf
            <div class="card-body">
               <div class="row  col-md-12">
                  <div class="form-group col-md-8">
                     <label>Product </label>
                     <select class="form-control select2" style="width: 100%;" name="id" required>
                        <option></option>
                        @foreach($data as $data)
                        <option value="{{$data->id}}">{{$data->name}}</option>
                        @endforeach
                     </select>
                  </div>
                  <div class="form-group col-md-12"">
                     <button type="submit" class="btn btn-success">Submit</button>
                  </div>
         </form>
         </div>
         <!-- /.card -->
         </div>
         <!--/.col (left) -->
         <!-- right column -->
         <div class="col-md-6">
         </div>
         <!--/.col (right) -->
      </div>
      <!-- /.row -->
   </div>
   <!-- /.container-fluid -->
</section>
    <!-- /.content -->
  </div>
@endsection

@section("js")
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@if(session()->has('message'))
<script>
  toastr.options = {
    "progressbar" : true,
    "closeButton" : true,
  }
  toastr.success("{{ Session::get('message') }}",{timeOut:1000});
</script>
@endif

@endsection