@extends('layouts.main')
@section('content')
<section class="section">
  <div class="section-header">
    <h1>Program Kerja</h1>
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
            <i class="fas fa-plus-circle"></i> Tambah Proker
          </button>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table" id="table-1">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col" style="width: 130px">Nama Proker</th>
                <th scope="col" style="width: 150px">Ketua Pelaksana</th>
                <th scope="col">status</th>
                <th scope="col">Tanggal</th>
                <th scope="col" style="width: 280px">Action</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($tasks as $proker)
                <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>{{ $proker->name }}</td>
                  <td>{{ $proker->users->name }}</td>
                  @switch($proker->status)
                    @case("progress")
                    <td class="badge badge-warning p-2 mt-2">{{ $proker->status }}</td>
                    @break
                    @case("success")
                    <td class="badge badge-success p-2 mt-2">{{ $proker->status }}</td>
                    @break
                    @default
                    <td class="badge badge-danger p-2 mt-2">{{ $proker->status }}</td>
                  @endswitch
                  <td>{{ $proker->tanggal }}</td>
                  <td colspan="2">
                    @can('show')
                    <a href="{{ route('proker.show', $proker->id) }}" class="btn btn-success"><i class="fas fa-users"></i> Kepanitian</a> | 
                    @endcan
                    @can('update')
                    <a href="{{ route('proker.edit', $proker->id) }}" class="btn btn-info"><i class="fas fa-pen"></i> Edit</a> | 
                    @endcan
                    @can('delete')
                    <form action="{{ route('proker.destroy', $proker->id) }}" method="post" class="d-inline">
                      @csrf
                      @method('delete')
                      <button type="submit" class="btn btn-danger" id="delete-{{ $loop->iteration }}"><i class="fas fa-trash"></i> Delete</button>
                    </form>
                    @endcan
                  </td>
                </tr>
              @empty
                <tr>
                  <td>Saat ini data belum tersedia</td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
    </div>
  </div>
</section>
<div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Form Tambah Proker</h5>
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
        <form action="{{ route('proker.store') }}" method="POST">
          @csrf
          <div class="form-group">
            <label>Nama Proker</label>
            <input type="text" class="form-control" name="name" value="" required>
            {{-- <div class="valid-feedback">
            </div> --}}
          </div>
          <div class="form-group">
            <label>Tanggal Pelaksanaan</label>
            <input type="date" class="form-control" name="tanggal" required value="">
          </div>
          <div class="form-group">
            <label>Divisi</label>
            <select class="form-control selectric" name="division_id">
              <option disabled selected>Pilih Proker Divisi</option>
              @forelse ($divisions as $divisi)
                <option value="{{ $divisi->id }}">{{ $divisi->name }}</option>
              @empty
                <option disabled>Divisi saat ini belum tersedia</option>
              @endforelse
            </select>
          </div>
          <div class="form-group">
            <label>Ketua Pelaksana</label>
            <select class="form-control selectric" name="user_id">
              <option disabled selected>Pilih Ketua Pelaksana</option>
              @forelse ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
              @empty
                <option disabled>Pengurus saat ini belum tersedia</option>
              @endforelse
            </select>
          </div>
          <div class="form-group">
            <label>Status</label>
            <select class="form-control selectric" name="status">
              <option disabled selected>Pilih Status</option>
              <option value="progress">Proses</option>
              <option value="cancel">Belum</option>
              <option value="success">Sukses</option>
            </select>
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
let count = {{ count($tasks) }};
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