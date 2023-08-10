@extends('layouts.main')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Divisi</h1>
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
              <i class="fas fa-plus-circle"></i> Tambah Divisi
            </button>
          </div>
        </div>
        <div class="card-body">
          @if (session()->has('success'))
          <div class="row">
            <div class="col-md-4">
              <div class="alert alert-success alert-dismissible show fade">
                <div class="alert-body">
                  <button class="close" data-dismiss="alert">
                    <span>&times;</span>
                  </button>
                  {{ session('success') }}
                </div>
              </div>
            </div>
          </div>
          @endif
          <div class="table-responsive">
            <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name Divisi</th>
                  <th scope="col" style="width: 300px">Deskripsi</th>
                  <th scope="col" style="width: 220px">Kepala Divisi</th>
                  <th scope="col" style="width: 220px">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($divisions as $divisi)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $divisi->name }}</td>
                    <td>{!! $divisi->description !!}</td>
                    <td>
                      {{ $divisi->leader ? $divisi->leader : 'Edit untuk menambahkan kepala divisi' }}
                    </td>
                    <td>
                      <a href="{{ route('divisi.edit', $divisi->id) }}" class="btn btn-info"><i class="fas fa-pen"></i> Edit</a> | 
                      <form action="{{ route('divisi.destroy', $divisi->id) }}" method="post" class="d-inline">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger" id="delete-{{ $loop->iteration }}"><i class="fas fa-trash"></i> Delete</button>
                      </form>
                    </td>
                  </tr>
                @endforeach
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
          <h5 class="modal-title">Form Tambah Divisi</h5>
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
          <form action="{{ route('divisi.store') }}" method="POST">
            @csrf
            <div class="form-group">
              <label>Nama Divisi</label>
              <input type="text" class="form-control" name="name" value="" required>
              {{-- <div class="valid-feedback">
              </div> --}}
            </div>
            <div class="form-group">
              <label>kepala Divisi</label>
              <select class="form-control selectric" name="leader">
                <option disabled selected>Pilih Kepala Divisi</option>
                @forelse ($users as $user)
                <option value="{{ $user->name }}">{{ $user->name }}</option>
                @empty
                <option disabled>Kepala Divisi Belum Tersedia</option>
                @endforelse
              </select>
            </div>
            <div class="form-group">
              <label>Deskripsi</label>
              <textarea class="summernote-simple" name="description" required></textarea>
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
  let count = {{ count($divisions) }};
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

@if (session()->has('success'))
<script>
  swal('Berhasil', `{{ session('success') }}`, 'success');
</script>
@endif
@endpush