<script type="module">
	new Chart(document.getElementById("document_chart"), {
		type: 'line',
		data: {
			labels: [
				@foreach($week_ranges as $week_range)
					 'Week ' + {{ $week_range}} ,
				@endforeach
			],
			datasets: [{
					data: [
						@foreach($document_counts as $document_count)
							{{$document_count}} ,
						@endforeach
					],
					borderColor: '#0095ed',
          fill: true,
          radius: 5,
          lineTension: 0.4,
          backgroundColor: 'rgb(54, 162, 235, 0.2)',
          borderWidth: 1
				}
			]
		},
		options: {
      plugins: {
        legend: {
          display: false,
         }
      },
    }
	});
</script>
