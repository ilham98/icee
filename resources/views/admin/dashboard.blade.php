@extends('admin.master')

@section('title')
	@parent
	Dashboard
@endsection

@section('content')
    <div class="col-lg-12 mb-4">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
        	<div class="card-title">
        		<h6 class="m-0 font-weight-bold text-primary">Dashboard</h6>
        	</div>
        </div>
        <div class="card-body">
        	<div class="d-flex">
        		<div>
	        		<span class="h1 text-primary">
	        			{{ $applicant_students->count() }}
	        		</span>
	        		<span class="h5">
	        			Applicant Student{{ $applicant_students->count() > 1 ? 's' : '' }}
	        		</span>
	        	</div>
	        	<div class="ml-5">
	        		<span class="h1 text-primary">
	        			{{ $students->count() }}
	        		</span>
	        		<span class="h5">
	        			Registered Student{{ $students->count() > 1 ? 's' : '' }}
	        		</span>
	        	</div>
	        </div>
	        <div class="row mt-5">
	        <div class="col-sm-6">
	        	<div class="text-center text-primary my-3">Applicant Students</div>
	        	<canvas id="myChart" class="mt-5"></canvas>
	        </div>
	        <div class="col-sm-6">
	        	<div class="text-center text-primary my-3">Active Students by Department</div>
	        	<canvas id="jurusanChart"></canvas>
	        </div>
		    </div>
        </div>
      </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script type="text/javascript">
    	var ctx = document.getElementById('myChart').getContext('2d');
    	var ctx2 = document.getElementById('jurusanChart').getContext('2d');
		var chart = new Chart(ctx, {
		    // The type of chart we want to create
		    type: 'bar',

		    // The data for our dataset
		    data: {
		        labels:{!! json_encode($chart->map(function($c) {
			                return $c->year.' - '.(int)$c->semester;
			            })) !!},
		        datasets: [{
		            label: 'Applicant Students',
		            backgroundColor: 'rgb(255, 99, 132)',
		            borderColor: 'rgb(255, 99, 132)',
		            data: {{ json_encode($chart->map(function($c) {
			                return $c->c;
			            })) }}
		        }]
		    },

		    // Configuration options go here
		    options: {
		    	legend: {
		    		display: false
		    	},
			    scales: {
			      yAxes: [{
			        ticks: {
			          beginAtZero: true,
			          callback: function(value) {if (value % 1 === 0) {return value;}}
			        }
			      }]
			    }
			  }
		});

		var chart2 = new Chart(jurusanChart, {
		    // The type of chart we want to create
		    type: 'doughnut',

		    // The data for our dataset
		    data: {
		        labels:{!! json_encode($chart2->map(function($c) {
			                return $c->name;
			            })) !!},
		        datasets: [{
		            label: 'Applicant Students',
		            backgroundColor: 'rgb(255, 99, 132)',
		            borderColor: 'rgb(255, 99, 132)',
		            data: {!! json_encode($chart2->map(function($c) {
			                return $c->c;
			            })) !!},
		             backgroundColor: [
		                'rgba(255, 99, 132, 0.2)',
		                'rgba(54, 162, 235, 0.2)',
		                'rgba(255, 206, 86, 0.2)',
		                'rgba(75, 192, 192, 0.2)',
		                'rgba(153, 102, 255, 0.2)',
		                'rgba(255, 159, 64, 0.2)'
		            ],
		            borderColor: [
		                'rgba(255, 99, 132, 1)',
		                'rgba(54, 162, 235, 1)',
		                'rgba(255, 206, 86, 1)',
		                'rgba(75, 192, 192, 1)',
		                'rgba(153, 102, 255, 1)',
		                'rgba(255, 159, 64, 1)'
		            ],
		        }]
		    },

		    // Configuration options go here
		    options: {
			    scales: {
			      yAxes: [{
			        ticks: {
			          beginAtZero: true,
			          callback: function(value) {if (value % 1 === 0) {return value;}}
			        }
			      }]
			    }
			  },

		});
    </script>
@endsection