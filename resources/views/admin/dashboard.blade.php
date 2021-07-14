@extends('admin.layouts.app')@section("htmlheader_title", "Dashboard")

@section('main-content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
	  <div class="container-fluid">
		<div class="row mb-2">
		  <div class="col-sm-6">
			<h1 class="m-0">Dashboard</h1>
		  </div><!-- /.col -->
		  <div class="col-sm-6">
			<ol class="breadcrumb float-sm-right">
			  <li class="breadcrumb-item"><a href="#">Home</a></li>
			  <li class="breadcrumb-item active">Dashboard</li>
			</ol>
		  </div><!-- /.col -->
		</div><!-- /.row -->
	  </div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<div class="content">
	  <div class="container-fluid">
		<div class="row">
		  <div class="col-12 col-sm-4 col-md-3">
			<div class="info-box">
			  <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-users"></i></span>

			  <div class="info-box-content">
				<span class="info-box-text">Total Users</span>
				<span class="info-box-number">
				  {{$userStatistics['totalUsers']}}
				</span>
			  </div>
			  <!-- /.info-box-content -->
			</div>
			<!-- /.info-box -->
		  </div>
		  <!-- /.col -->
		  <div class="col-12 col-sm-6 col-md-3">
			<div class="info-box mb-3">
			  <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user-check"></i></span>

			  <div class="info-box-content">
				<span class="info-box-text">Active Users</span>
				<span class="info-box-number">{{$userStatistics['activeUsers']}}</span>
			  </div>
			  <!-- /.info-box-content -->
			</div>
			<!-- /.info-box -->
		  </div>
		  <!-- /.col -->

		  <!-- fix for small devices only -->
		  <div class="clearfix hidden-md-up"></div>

		  <div class="col-12 col-sm-6 col-md-3">
			<div class="info-box mb-3">
			  <span class="info-box-icon bg-lightblue elevation-1"><i class="fas fa-male"></i></span>

			  <div class="info-box-content">
				<span class="info-box-text">Male Users</span>
				<span class="info-box-number">{{$userStatistics['genderMale']}}</span>
			  </div>
			  <!-- /.info-box-content -->
			</div>
			<!-- /.info-box -->
		  </div>
		  <!-- /.col -->
		  <div class="col-12 col-sm-6 col-md-3">
			<div class="info-box mb-3">
			  <span class="info-box-icon bg-olive elevation-1"><i class="fas fa-female"></i></span>

			  <div class="info-box-content">
				<span class="info-box-text">Female Users</span>
				<span class="info-box-number">{{$userStatistics['genderFemale']}}</span>
			  </div>
			  <!-- /.info-box-content -->
			</div>
			<!-- /.info-box -->
		  </div>
		  <!-- /.col -->
		</div>
		<div class="row">
		  <div class="col-lg-8">
			
			<div class="card">
			  <div class="card-header">
				<h3 class="card-title">Month wise user counts</h3>

				<div class="card-tools">
				  <button type="button" class="btn btn-tool" data-card-widget="collapse">
					<i class="fas fa-minus"></i>
				  </button>
				</div>
			  </div>
			  <div class="card-body">
				<div class="chart">
					@if( $recentUsers->isEmpty() )
				  	<div style="text-align: center; width: 100%; height: 100%; position: absolute; left: 0; top: 100px; z-index: 20;">
						<b>No data available!</b>
					</div>
					@endif
				  <canvas id="monthwiseusercount" style="min-height: 300px; height: 300px; max-height: 300px; max-width: 100%;"></canvas>
				</div>
			  </div>
			  <!-- /.card-body -->
			</div>
			<!-- /.card -->
		  </div>

		  <div class="col-lg-4">
			<div class="card">
			  <div class="card-header">
				<h3 class="card-title">Gender wise counts</h3>

				<div class="card-tools">
				  <button type="button" class="btn btn-tool" data-card-widget="collapse">
					<i class="fas fa-minus"></i>
				  </button>
				</div>
			  </div>
			  <div class="card-body">
			  	@if( $recentUsers->isEmpty() )
				<div style="text-align: center; width: 100%; height: 100%; position: absolute; left: 0; top: 100px; z-index: 20;">
					<b>No data available!</b>
				</div>
				@endif
				<canvas id="genderChart" style="min-height: 300px; height: 300px; max-height: 300px; max-width: 100%;"></canvas>
			  </div>
			  <!-- /.card-body -->
			</div>
			<!-- /.card -->
			<!-- /.card -->
		  </div>
		  <!-- /.col-md-6 -->
		  <div class="col-lg-5">
			
			<div class="card">
			  <div class="card-header">
				<h3 class="card-title">Recently registered users</h3>

				<div class="card-tools">
				  <button type="button" class="btn btn-tool" data-card-widget="collapse">
					<i class="fas fa-minus"></i>
				  </button>
				</div>
			  </div>
			  <div class="card-body" style="min-height: 390px;">
				<table id="users-list" class="table table-bordered table-hover">
				  <thead>
					<tr>
					  <th>Name</th>
					  <th>Email</th>
					  <th>Date Of Birth</th>
					</tr>
				  </thead>
				  @if( !$recentUsers->isEmpty() )
					  
					  @foreach($recentUsers as $key => $value)
					  <tr>
						<td>{{$value->name}}</td>
						<td>{{$value->email}}</td>
						<td>{{$value->date_of_birth}}</td>
					  </tr>
					  @endforeach

					  @else
					  <tr>
						<td colspan="3" align="center">No data available!</td>
					  </tr>
				  @endif
				  <tbody>
				  </tbody>
				</table>
			  </div>
			  <!-- /.card-body -->
			</div>
			<!-- /.card -->
		  </div>
		  <!-- /.col-md-6 -->
		  <div class="col-lg-7">
			<div class="card">
			  <div class="card-header">
				<h3 class="card-title">Login type wise counts</h3>

				<div class="card-tools">
				  <button type="button" class="btn btn-tool" data-card-widget="collapse">
					<i class="fas fa-minus"></i>
				  </button>
				</div>
			  </div>
			  <div class="card-body">
			  	@if( $recentUsers->isEmpty() )
				<div style="text-align: center; width: 100%; height: 100%; position: absolute; left: 0; top: 100px; z-index: 20;">
					<b>No data available!</b>
				</div>
				@endif
				<canvas id="loginTypeChart" style="min-height: 350px; height: 350px; max-height: 350px; max-width: 100%;"></canvas>
			  </div>
			  <!-- /.card-body -->
			</div>
			<!-- /.card -->
			<!-- /.card -->
		  </div>
		</div>
		<div class="col-lg-12">
			<div class="card">
			  <div class="card-header">
				<h3 class="card-title">Age group wise counts</h3>

				<div class="card-tools">
				  <button type="button" class="btn btn-tool" data-card-widget="collapse">
					<i class="fas fa-minus"></i>
				  </button>
				</div>
			  </div>
			  <div class="card-body">
			  	@if( $recentUsers->isEmpty() )
				<div style="text-align: center; width: 100%; height: 100%; position: absolute; left: 0; top: 100px; z-index: 20;">
					<b>No data available!</b>
				</div>
				@endif
				<canvas id="ageGroupChart" style="min-height: 300px; height: 300px; max-height: 300px; max-width: 100%;"></canvas>
			  </div>
			  <!-- /.card-body -->
			</div>
			<!-- /.card -->
			<!-- /.card -->
		  </div>
		<!-- /.row -->
	  </div>
	  <!-- /.container-fluid -->
	</div>
	<!-- /.content -->
  </div>
@endsection
@push('styles')
<style type="text/css">
  .bg-linkedin {
	background-color: #007bb6;
	color: #fff;
  }
  .bg-facebook {
	background-color: #3b5998;
	color: #fff;
  }
  .bg-google {
	background-color: #dd4b39;
	color: #fff;
  }
  .bg-twitter {
	background-color: #55acee;
	color: #fff;
  }
  .bg-github {
	background-color: #444444;
	color: #fff;
  }
  .bg-instagram {
	background-color: #3f729b;
	color: #fff;
  }
</style>
@endpush
@push('scripts')

<!-- ChartJS -->
<script src="{{ asset('/public/vendor/chart.js/Chart.min.js')}}"></script>

<script type="text/javascript">
  $(function () {

	// Month Wise Chart Start
	var areaChartData = {
	  labels  : {!! $monthWiseCount["months"] !!},
	  datasets: [
		{
		  label               : 'User Count',
		  backgroundColor     : 'rgb(75, 192, 192,0.9)',
		  borderColor         : 'rgb(75, 192, 192,0.8)',
		  data                : {!! $monthWiseCount['counts'] !!},
		  fill: false,
		},
	  ]
	}

	var areaChartOptions = {
	  maintainAspectRatio : false,
	  responsive : true,
	  legend: {
		display: false
	  },
	  scales: {
		xAxes: [{
		  gridLines : {
			display : false,
		  }
		}],
		yAxes: [{
		  gridLines : {
			display : true,
		  },
		  ticks: {
			 beginAtZero: true,
			 userCallback: function(label, index, labels) {
				 if (Math.floor(label) === label) {
					 return label;
				 }

			 },
		  },
		}]
	  }
	}
	
	//-------------
	//- LINE CHART -
	//--------------
	var lineChartCanvas = $('#monthwiseusercount')
	var lineChart = new Chart(lineChartCanvas, {
	  type: 'line',
	  data: areaChartData,
	  options: areaChartOptions,
	});
	// Month Wise Chart Ends

	// Gender Wise Chart Start
	// Get context with jQuery - using jQuery's .get() method.
	var labels = {!! $genderWiseCount['gender'] !!};
	var backgroundColors=[];
	var borderColors=[];
	
	$.each(labels, function( index,value ) {
	  if(value == 'Male'){
		 backgroundColors[index]="rgba(60, 141, 188, 0.4)";
		 borderColors[index]="rgb(60, 141, 188)";
	  }else if(value == 'Female'){
		 backgroundColors[index]="rgba(232, 62, 140, 0.4)";
		 borderColors[index]="rgb(232, 62, 140)";
	  }else{
		backgroundColors[index]="rgba(108, 117, 125, 0.4)";
		borderColors[index]="rgb(108, 117, 125)";
	  }
	});

	var donutChartCanvas = $('#genderChart').get(0).getContext('2d')
	var donutData        = {
	  labels: labels,
	  datasets: [
		{
		  // label: labels,
		  data: {!! $genderWiseCount['counts'] !!},
		  backgroundColor : backgroundColors,
		  borderColor : borderColors,
		  borderWidth: 1
		}
	  ]
	}
	var donutOptions     = {
	  maintainAspectRatio : false,
	  responsive : true,
	  legend: {
		display: false,
	  },
	  scales: {
		xAxes: [{
		  gridLines : {
			display : false,
		  }
		}],
		yAxes: [{
		  gridLines : {
			display : true,
		  },
		  ticks: {
			beginAtZero: true,
			userCallback: function(label, index, labels) {
				if (Math.floor(label) === label) {
					return label;
				}
			},
		  },
		}]
	  }
	}

	// You can switch between pie and douhnut using the method below.
	new Chart(donutChartCanvas, {
	  type: 'bar',
	  data: donutData,
	  options: donutOptions
	})
	// Gender Wise Chart Ends

	// Gender Wise Chart Start
	// Get context with jQuery - using jQuery's .get() method.
	var labels = {!! $ageWiseCount['ageRange'] !!};
	var backgroundColors=[];
	var borderColors=[];

	var donutChartCanvas = $('#ageGroupChart').get(0).getContext('2d')
	var donutData        = {
	  labels: labels,
	  datasets: [
		{
		  // label: labels,
		  data: {!! $ageWiseCount['counts'] !!},
		  backgroundColor : "rgb(60, 141, 188, 0.4)",
		  borderColor : "rgb(60, 141, 188)",
		  borderWidth: 1
		}
	  ]
	}
	var donutOptions     = {
	  maintainAspectRatio : false,
	  responsive : true,
	  legend: {
		display: false,
	  },
	  scales: {
		xAxes: [{
		  gridLines : {
			display : false,
		  }
		}],
		yAxes: [{
		  gridLines : {
			display : true,
		  },
		  ticks: {
			beginAtZero: true,
			userCallback: function(label, index, labels) {
				if (Math.floor(label) === label) {
					return label;
				}
			},
		  },
		}]
	  }
	}

	// You can switch between pie and douhnut using the method below.
	new Chart(donutChartCanvas, {
	  type: 'bar',
	  data: donutData,
	  options: donutOptions
	})
	// Gender Wise Chart Ends

	// Login Type Chart Start
	// Get context with jQuery - using jQuery's .get() method.
	var labels = {!! $socialProviderWise['loginType'] !!};
	var backgroundColors=[];
	
	$.each(labels, function( index,value ) {
	  if(value == 'Facebook'){
		 backgroundColors[index]="#4267B2";
	  }else if(value == 'Google'){
		 backgroundColors[index]="#db3236";
	  }else if(value == 'Twitter'){
		 backgroundColors[index]="#1DA1F2";
	  }else if(value == 'Linkedin'){
		 backgroundColors[index]="#0077b5";
	  }else if(value == 'Github'){
		 backgroundColors[index]="#444444";
	  }else if(value == 'Instagram'){
		 backgroundColors[index]="#8a3ab9";
	  }
	});

	var donutChartCanvas = $('#loginTypeChart').get(0).getContext('2d')
	var donutData        = {
	  labels: labels,
	  datasets: [
		{
		  data: {!! $socialProviderWise['counts'] !!},
		  backgroundColor : backgroundColors,
		  borderWidth: 1
		}
	  ]
	}
	var donutOptions     = {
	  maintainAspectRatio : false,
	  responsive : true,
	  legend: {
		display: true,
		position: 'left'
	  }
	}
	
	// You can switch between pie and doughnut using the method below.
	new Chart(donutChartCanvas, {
	  type: 'doughnut',
	  data: donutData,
	  options: donutOptions
	})
	// Login Type Chart Ends
  
  });

</script>
@endpush