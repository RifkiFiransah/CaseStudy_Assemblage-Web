@extends('layouts.main')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Seksi - seksi</h1>
    </div>

    <div class="section-body">
      <div class="card">
        <div class="card-header">
          <h4>Hima TI</h4>
          <div class="card-header-action">
            <button
              class="btn btn-primary"
              data-toggle="modal"
              data-target="#exampleModal"
            >
              <i class="fas fa-plus-circle"></i> Tambah Seksi
            </button>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nama Seksi</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($sections as $seksi)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $seksi->name }}</td>
                    <td colspan="3">
                      @can('show')
                      <a href="{{ route('seksi-seksi.show', $seksi->id) }}" class="btn btn-success"><i class="fas fa-eye"></i> Detail</a> |
                      @endcan
                      @can('update')
                      <a href="{{ route('seksi-seksi.edit', $seksi->id) }}" class="btn btn-info"><i class="fas fa-pen"></i> Edit</a> | 
                      @endcan
                      @can('delete')
                      <form action="{{ route('seksi-seksi.destroy', $seksi->id) }}" method="post" class="d-inline">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger" id="delete-{{ $seksi->id }}"><i class="fas fa-trash"></i> Delete</button>
                      </form>
                      @endcan
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="3" class="text-center">Data saat ini belum tersedia</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Form Tambah Seksi</h5>
          <button
            type="button"
            class="close"
            data-dismiss="modal"
            aria-label="Close"
          >
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('seksi-seksi.store') }}" method="POST">
            @csrf
            <div class="form-group">
              <label>Nama Seksi</label>
              <input type="text" class="form-control" name="name" value="" required>
            </div>
            <button class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('script')
<script>
let count = {{ count($sections) }};
  for (let i = 1; i <= count; i++) {
    $(`#delete-${i}`).click(function(e) {
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
    });
  }
</script>
@endpush