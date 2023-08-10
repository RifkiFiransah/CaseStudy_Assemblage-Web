@extends('layouts.main')
@section('content')
<section class="section">
  <div class="section-header">
    <h1>Kalender</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item">
        <a href="{{ route('aktivitas') }}" class="btn btn-primary"><i class="fas fa-pencil-ruler"></i> Kembali ke Aktivitas</a>
      </div>
    </div>
  </div>

  <div class="section-body">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Hima-TI</h4>
          </div>
          <div class="card-body">
            <div class="fc-overflow">
              <div id="myEvent"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
@push('script')
<script type="text/javascript">
$("#myEvent").fullCalendar({
  height: 'auto',
  header: {
    left: 'today',
    center: 'title',
    right: 'prev, next'
  },
  editable: true,
  events: [
  @foreach($tasks as $proker)
    {
      title: '{{ $proker->name }}',
      date: '{{ $proker->tanggal }}',
      backgroundColor: "#007bff",
      borderColor: "#007bff",
      textColor: '#fff',
    },
  @endforeach
  ]
});
</script>
@endpush