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
      .delete_icon{
      width: 25px;
      }
  </style> 
@endsection
@section("content")

<div class="content-wrapper">
<div class="col-md-12">
            <div class="card card-default">
              <!-- /.card-header -->
              <div class="card-body">
                <div class="callout callout-info">
                  <h3>I am an info callout!</h3>
                </div>
              </div>
              <!-- /.card-body -->
 
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>User id</th>
                    <th>Raw material</th>
                    <th>Quantity</th>
                    <th>Date</th>
                    <th>Name</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                      <tr>
                    <td>Name</td>
                    <td>Name</td>
                    <td>Name</td>
                    <td>ben</td>
                    <td>Name</td>
                    <td>Name</td>
                
                    <td class="text-center py-0 align-middle">
                    <div class="btn-group btn-group-sm">
                        <a href="{{url('#')}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                      </div>
                      </td>
                       </tr>
                  </tbody>
                  <tfoot>
                  <tr>
                  <tr>
                    <th>Id</th>
                    <th>User id</th>
                    <th>Raw material</th>
                    <th>Quantity</th>
                    <th>Date</th>
                    <th>Name</th>
                    <th>Actions</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              
          </div>
    <!-- /.content -->
  </div>
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