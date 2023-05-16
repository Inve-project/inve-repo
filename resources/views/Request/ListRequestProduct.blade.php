@extends("master")
@section("css")
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <style type="text/css">  
      .edit_icon{
      width: 23px;
      }
      /* .edit_icon:hover{
      width: 30px;
      } */
      .delete_icon{
      width: 25px;
      }
      /* .delete_icon:hover{
      width: 32px;
      } */
     
  </style> 
@endsection
@section("content")
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Request Product</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-10">
          <a href="{{url('RequestProduct')}}"><button class="btn btn-success btn-sm">Request Product </button></a>
          <br>
          <br>
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($data as $data)
                      <tr>
                    <td>{{$data->id}}</td>
                    <td>{{$data->product_id}}</td>
                    <td>{{$data->quantity}}</td>
                    <td>{{$data->status}}</td>
                    <td>{{$data->date}}</td>
                    <td class="text-center py-0 align-middle">
                    <div class="btn-group btn-group-sm">
                        <a
                        onclick="return confirm('Are you sure  you want to delete')"
                         href="{{url('deleteRawmaterial',$data->id)}}" class="btn btn-warning"><i class="fas fa-arrow-down"></i>
                        </a>
                        <a
                        onclick="return confirm('Are you sure  you want to delete')"
                         href="{{url('deleteRawmaterial',$data->id)}}" class="btn btn-info"><i class="fas fa-eye"></i>
                        </a>
                         <a
                        onclick="return confirm('Are you sure  you want to delete')"
                         href="{{url('deleteRawmaterial',$data->id)}}" class="btn btn-success"><i class="fas fa-arrow-up"></i>
                        </a>
                      </div>
                      </td>
                       </tr>
                      @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Id</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Units</th>
                    <th>Quantity</th>
                    <th>Actions</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection
  @section("js")
<!-- jQuery -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": false,
      // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
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