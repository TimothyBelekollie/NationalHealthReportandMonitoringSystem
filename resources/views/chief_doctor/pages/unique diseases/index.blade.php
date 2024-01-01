@extends('chief_doctor.master')
@section('chief_doctor')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">
		<!-- Main content -->
		{{-- <section class="content">
			
			<div class="row">
				<div class="col-12">														
					<div class="box no-shadow mb-0 bg-transparent">
						<div class="box-header no-border px-0">
							<h4 class="box-title text-primary">Your Overall Statistics</h4>	
							
						</div>
					</div>
				</div>
				

            

		
			
		</section> --}}



        <section class="content">
		
			<!-- row -->
			
			<!-- row -->
		
			<!-- row -->
			<div class="row">
                <div class="col-md-9">
               
                    <form action="{{route('doctor.uniquedeseases.index')}}" method="GET">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="start_date">Start Date:</label>
                                <input type="date" id="start_date" name="start_date" value="{{ request('start_date') }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="end_date">End Date:</label>
                                <input type="date" id="end_date" name="end_date" value="{{ request('end_date') }}">
                            </div>
                        </div>
                        <div class="col-md-4"> 
                
                            {{-- <button type="submit" class="btn btn-primary">Filter</button> --}}
                            <input type="submit" class="btn btn-dark" value="Filter">
                        </div>
                    </div>

                        </form>
                   
             
                </div>
				<div class="col-lg-9">
					<div class="box">
						<div class="box-body">
							{{-- <h4 class="box-title">Diseases Statistics</h4> --}}
                            <h4 class="box-title text-primary">Your Overall Disease Statistics</h4>	
							{{-- <h6 class="box-subtitle mb-20">To use add class <code>.bg-primary</code> in the <code>&lt;thead&gt;</code> and add class <code>.b-1 .border-primary</code> in <code>&lt;table&gt;</code></h6> --}}
							<div class="table-responsive">
                                @if(count($totalDiseases) > 0)
								<table class="table b-1 border-primary">
									<thead class="bg-primary">
										<tr>
											  
                                    <th>Disease</th>
                                    <th>Occurrences</th>
                
										</tr>
									</thead>
									<tbody>
										
                                    @foreach($totalDiseases as $disease => $count)
                                <tr>
                                    <td>{{ $disease }}</td>
                                    <td>{{ $count }} occurrences</td>
                                </tr>
                                @endforeach

									</tbody>
								</table>
                                @else
                                <p>The message indicates that no disease statistics were found, and it suggests using a filter to obtain the desired result.</p>
                            @endif
							</div>
						</div>
					</div>
				</div>
				
			</div>
			<!-- row -->
			
			<!-- row -->
			
		  

		</section>
		<!-- /.content -->
	  </div>
  </div>
  <!-- /.content-wrapper -->

{{-- 
<script>
	var ctx=document.getElementById('birthChart').getContext('2d');
	var birthChart=new Chart(ctx,{
type:'bar',
data:{
	labels:{!!json_encode($labels)!!},
	datasets:{!!json_encode($datasets)!!}
},
	});
</script>

<script>
	var ctx=document.getElementById('deathChart').getContext('2d');
	var deathChart=new Chart(ctx,{
type:'bar',
data:{
	labels:{!!json_encode($deathlabels)!!},
	datasets:{!!json_encode($deathdatasets)!!}
},
	});
</script> --}}

{{-- <script>
    var ctx = document.getElementById('eventComparisonChart').getContext('2d');

    var monthlyCounts = @json($monthlyCounts);
    var months = @json($months);

    var eventComparisonChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: months,
            datasets: [
                {
                    label: 'Birth Events',
                    data: monthlyCounts['Birth Events'],
                    backgroundColor: 'rgba(75, 192, 192, 0.5)',
                    borderWidth: 1
                },
                {
                    label: 'Death Events',
                    data: monthlyCounts['Death Events'],
                    backgroundColor: 'rgba(255, 99, 132, 0.5)',
                    borderWidth: 1
                }
            ]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script> --}}
@endsection
 
  