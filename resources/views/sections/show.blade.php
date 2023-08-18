@extends('layouts.main')
@section('content')
<section class="section">
  <div class="section-header">
    <h1>Detail</h1>
  </div>

  <div class="section-body">
    <div class="row">
      <div class="col-12 col-md-10 col-lg-10">
        <div class="card card-primary">
          <div class="card-header">
            <h4 class="card-title">{{ $seksi->name }}</h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-8">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                @can('update')
                <a href="{{ route('pengurus.edit', $seksi->id) }}" class="btn btn-info"><i class="fas fa-pen"></i> Edit</a> | 
                  @endcan
                  @can('delete')
                  <form action="{{ route('pengurus.destroy', $seksi->id) }}" method="post" class="d-inline">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger" id="delete"><i class="fas fa-trash"></i> Delete</button>
                  </form>
                @endcan
              </div>
            </div>
          </div>
          <div class="card-footer bg-whitesmoke">
            <a href="{{ route('pengurus.index') }}" class="btn btn-secondary">Back</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
@push('script')
<script>
  $(`#delete`).click(function(e) {
  let form = $(this).closest('form');
  e.preventDefault();
  swal({
      title: 'Are you sure?',
      text: 'Once deleted, you will not be able to recover this imaginary file!',
      icon: 'warning',
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
      form.submit();
      
      }
    });
})
</script>
@endpush