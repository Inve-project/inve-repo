@extends("master")
@section("css")
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

@endsection
@section("content")

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Request Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li><a href="{{url('ListRequestProduct')}}"><button class="btn btn-secondary btn-sm">Go Back</button></a></li>
            </ol>
          </div>
        </div>
      </div>
    </div>
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
         <form  method="POST" action="{{url('AddRequestProduct')}}"class="row g-3">
            @csrf
            <div class="card-body">
               <div class="row  col-md-9">
               <div class="form-group col-md-12">
                     <label >Product name</label>
                     <select class="form-control select2" style="width: 100%;" name="id" required>
                        <option></option>
                        @foreach($data as $data)
                        <option value="{{$data->id}}">{{$data->name}} in {{$data->units}}</option>
                        @endforeach
                     </select>
                  </div>
                  <div class="form-group col-md-6">
                     <label >Quantity</label>
                     <input type="text" name="quantity" class="form-control" id="exampleInputCategory" placeholder="" required>
                  </div>
                  <div class="form-group col-md-6">
                     <label >Date</label>
                     <input type="date" name="date" class="form-control" id="exampleInputCategory" placeholder="" required>
                  </div>
                  <div class="form-group col-md-12"">
                     <button type="submit" class="btn btn-primary">Submit</button>
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