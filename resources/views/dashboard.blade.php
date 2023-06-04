@extends("master")
@section("content")

<div class="content-wrapper main">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <!-- <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div> -->
        </div>
      </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <h5 class="mb-2">Product</h5>
        <!-- Small boxes (Stat box) -->
        <div class="row">
        @foreach($data as $data)
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-primary"><i class="fas fa-trophy"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">{{$data->name}}</span>
                <span class="info-box-number">{{$data->quantity}} {{$data->units}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
           @endforeach
        </div>
        <!-- /.row -->
        @if (Auth::user()->id != 2)
        <h5 class="mb-2">User Product</h5>
        <!-- Small boxes (Stat box) -->
        <div class="row">
        @foreach($user as $data)
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="fas fa-trophy"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">{{$data->name}}</span>
                <span class="info-box-number">{{$data->quantity}} {{$data->units}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
           @endforeach
        </div>
        <!-- /.row -->
         @endif
         <!-- Small boxes (Stat box) -->
         <h5 class="mb-2">Raw material</h5>
         <div class="row">
        @foreach($rawmaterial as $data)
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="fas fa-qrcode"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">{{$data->name}}</span>
                <span class="info-box-number">{{$data->quantity}} {{$data->units}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
           @endforeach
        </div>
        <!-- /.row -->

          <!-- Small boxes (Stat box) -->
          <h5 class="mb-2">Income</h5>
         <div class="row">
        @foreach($amount as $data)
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-warning"><i class="fas fa-dollar-sign"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Amount</span>
                <span class="info-box-number">{{$data->amount}} Tzsh</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
           @endforeach
        </div>
        <!-- /.row -->

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection