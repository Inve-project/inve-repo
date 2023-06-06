@extends("master")
@section("css")
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <style type="text/css">
      .buttoncolor{
        color: #ffff;
      }
  </style>
@endsection
@section("content")
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper main">
    <!-- Content Header (Page header) -->
    <div class="card-body ">
        <div class="callout callout-success">
          <div class="row">
            <div class="col-9">
               <h3>Reorder point</h3>
            </div>
            <div class="col-3">
            @if (Auth::user()->id == 1)
                <div class="btn-group btn-group-sm ">
                     <a href="{{url('Reorder')}}" class="btn btn-info "><i class="fas fa-plus buttoncolor"> Products</i><br></a>.
                     <a href="{{url('Reorderuserproduct')}}" class="btn btn-success "><i class="fas fa-plus buttoncolor"> User Products</i><br></a>.
                     <a href="{{url('Reordermaterial')}}" class="btn btn-primary "><i class="fas fa-plus buttoncolor"> Raw materials</i><br></a>
                </div>
             @endif
            </div>
          </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S/N</th>
                    <th>Item name</th>
                    <th>Quantity</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($data as $index=>$data)
                      <tr>
                    <td>{{ $index +1 }}</td>
                    <td>{{$data->item_name}}</td>
                    <td>{{$data->item_quantity}}</td>
                    <td class="text-center py-0 align-middle">
                    <div class="btn-group btn-group-sm">
                    @if ($data->item_category == "Products")
                        <a href="{{url('editReorder',$data->id)}}" class="btn btn-primary"><i class="fas fa-pen"></i></a>
                        <a
                    @elseif ($data->item_category == "material")
                    <a href="{{url('editReordermaterial',$data->id)}}" class="btn btn-primary"><i class="fas fa-pen"></i></a>
                        <a
                        @elseif ($data->item_category == "User")
                    <a href="{{url('editReorderuserproduct',$data->id)}}" class="btn btn-primary"><i class="fas fa-pen"></i></a>
                        <a
                    @endif
                        onclick="return confirm('Are you sure  you want to delete')"
                         href="{{url('deleteReorder',$data->id)}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                      </div>
                      </td>
                       </tr>
                      @endforeach
                  </tbody>
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
