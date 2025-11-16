@extends('layouts.app')

@section('content')
<div class="card card-centered shadow-sm p-4">
  <h4>Statistik Todo</h4>
  <div id="chart"></div>
</div>

@push('scripts')
<script>
  const options = {
    chart: { type: 'donut', height: 350 },
    series: [{{ $done }}, {{ $pending }}, 0],
    labels: ['Selesai','Pending','Lainnya'],
    colors: undefined,
    legend: { position: 'bottom' }
  }
  const chart = new ApexCharts(document.querySelector("#chart"), options);
  chart.render();
</script>
@endpush
@endsection
