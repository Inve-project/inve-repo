@extends("master")
@section("css")
<style>
        .blink {
            animation: blinker 0.5s linear infinite;
            color: red;
            font-family: sans-serif;
        }
        @keyframes blinker {
            50% {
                opacity: 0;
            }
        }
    </style>
@endsection
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
      <h5 class="mb-2">Products in store</h5>
        <!-- Small boxes (Stat box) -->
        <div class="row">
        @foreach($data as $data)
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-primary {{$data->status}}"><i class="fas fa-trophy" ></i></span>

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
        <h5 class="mb-2">Products in stock</h5>
        <!-- Small boxes (Stat box) -->
        <div class="row">
        @foreach($user as $data)
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info {{$data->status}}"><i class="fas fa-trophy"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">{{$data->item_name}}</span>
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


        @if (Auth::user()->id != 3)
         <!-- Small boxes (Stat box) -->
         <h5 class="mb-2">Raw materials</h5>
         <div class="row">
        @foreach($rawmaterial as $data)
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-success {{$data->status}}"><i class="fas fa-qrcode"></i></span>

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

        @if (Auth::user()->id != 2)
 <!-- Small boxes (Stat box) -->
 <h5 class="mb-2">Sales</h5>
         <div class="row">
         @foreach($todayData as $todayData)
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
            <span class="info-box-icon bg-warning"><i class="fas fa-dollar-sign"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Today</span>
                <span class="info-box-number">{{$todayData->amount}} Tzsh</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
        
          @endforeach

         @foreach($thisWeekData as $thisWeekData)
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
            <span class="info-box-icon bg-warning"><i class="fas fa-dollar-sign"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Weekly</span>
                <span class="info-box-number">{{$thisWeekData->amount}} Tzsh</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          @endforeach
         @foreach($thisMonthData as $thisMonthData)
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
            <span class="info-box-icon bg-warning"><i class="fas fa-dollar-sign"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Monthly</span>
                <span class="info-box-number">{{$thisMonthData->amount}} Tzsh</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          @endforeach
        </div>
        <!-- /.row -->
        @endif
      
    </section>
    <!-- /.content -->
  </div>
@endsection