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
                       <h3>Add Raw material category</h3>
                    </div>
                    <div class="col-1">
                        <div class="btn-group btn-group-sm ">
                             <a href="{{url('Listsellproduct')}}" class="btn btn-success "><i class="fas fa-arrow-right buttoncolor"></i></a>
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
              <form  method="POST" action="{{url('Addsellproduct')}}"class="row g-3">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label >Category Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputCategory" placeholder="Enter Category Name" required>
                  </div>
                <!-- /.card-body -->
                  <button type="submit" class="btn btn-success">Add</button>
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
      </div><!-- /.container-fluid -->
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