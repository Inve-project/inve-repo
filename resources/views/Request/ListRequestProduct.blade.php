@extends("master")
@section("css")
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
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
                       <h3>Requested products</h3>
                    </div>
                    <div class="col-1">
                    @if (Auth::user()->id == 3)
                        <div class="btn-group btn-group-sm ">
                             <a href="{{url('RequestProduct')}}" class="btn btn-success "><i class="fas fa-plus buttoncolor"></i></a>
                        </div>
                    @endif
                    </div>
                  </div>
                </div>
            </div>
              <!-- /.card-body -->
    <!-- /.content-header -->
    
      <!-- Main content -->
      <div class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- /.col-md-6 -->
          <div class="col-lg-12">

            <div class="card">
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S/N</th>
                    <th>Product</th>
                    <th>Quantity</th>
                   @if (Auth::user()->id != 2)
                    <th>Requested at</th>
                   @endif

                 <th>Status</th>

                 @if (Auth::user()->id != 3)
                 <th>Date</th>
                 @endif

                 @if (Auth::user()->id == 2)
                    <th>Actions</th>
                   @endif
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($data as $index => $data)
                      <tr>
                    <td>{{ $index +1 }}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->quantity}}</td>
                    @if (Auth::user()->id != 2)
                    <td>{{$data->created_at}}</td>
                   @endif

                   <td><span class="badge badge-{{$data->color}}">{{$data->status}}</span></td>

                 @if (Auth::user()->id != 3)
                 <td>{{$data->date}}</td>
                 @endif

                 @if (Auth::user()->id == 2)
                    <td class="text-center py-0 align-middle">
                    <div class="btn-group btn-group-sm">
                        <a
                        onclick="return confirm('Are you sure  you want to make changes')"
                         href="{{url('onprogress',$data->id)}}" class="btn btn-warning"><i class="fas fa-arrow-down"></i>
                        </a>
                        <!-- <a
                        onclick="return confirm('Are you sure  you want to delete')"
                         href="{{url('deleteRawmaterial',$data->id)}}" class="btn btn-info"><i class="fas fa-eye"></i>
                        </a> -->
                         <a
                        onclick="return confirm('Are you sure  you want to make changes')"
                         href="{{url('approved',$data->id)}}" class="btn btn-success"><i class="fas fa-arrow-up"></i>
                        </a>
                      </div>
                      </td>
                      @endif
                       </tr>
                      @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
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
