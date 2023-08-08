@extends('layouts.main')

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Kepanitiaan</h1>
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
            <i class="fas fa-plus-circle"></i> Tambah Kepanitiaan
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
          <table class="table table" id="table-1">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Proker</th>
                <th scope="col">Seksi</th>
                <th scope="col">Pengurus</th>
                <th scope="col">Jabatan</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($committees as $panitia)
                <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>{{ $panitia->tasks->name }}</td>
                  <td>{{ $panitia->sections->name }}</td>
                  <td>{{ $panitia->users->name }}</td>
                  <td>{{ $panitia->role }}</td>
                  <td colspan="2">
                    <a href="{{ route('kepanitiaan.edit', $panitia->id) }}" class="btn btn-info"><i class="fas fa-pen"></i> Edit</a> | 
                    <form action="{{ route('kepanitiaan.destroy', $panitia->id) }}" method="post" class="d-inline">
                      @csrf
                      @method('delete')
                      <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</button>
                    </form>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="6" class="text-center">Saat ini data belum tersedia</td>
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
        <h5 class="modal-title">Form Tambah Kepanitiaan</h5>
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
        <form action="{{ route('kepanitiaan.store') }}" method="POST">
          @csrf
          <div class="form-group">
            <label>Proker</label>
            <select class="form-control selectric" name="task_id">
              <option disabled selected>Pilih Program Kerja</option>
              @forelse ($tasks as $proker)
              <option value="{{ $proker->id }}">{{ $proker->name }}</option>
              @empty
              <option disabled>Data saat ini belum tersedia</option>
              @endforelse
            </select>
          </div>
          <div class="form-group">
            <label>Pengurus</label>
            <select class="form-control selectric" name="user_id">
              <option disabled selected>Pilih Pengurus</option>
              @forelse ($users as $user)
              <option value="{{ $user->id }}">{{ $user->name }}</option>
              @empty
              <option disabled>Data saat ini belum tersedia</option>
              @endforelse
            </select>
          </div>
          <div class="form-group">
            <label>Seksi</label>
            <select class="form-control selectric" name="section_id">
              <option disabled selected>Pilih Seksi</option>
              @forelse ($sections as $seksi)
              <option value="{{ $seksi->id }}">{{ $seksi->name }}</option>
              @empty
              <option disabled>Data saat ini belum tersedia</option>
              @endforelse
            </select>
          </div>
          <div class="form-group">
            <label>Jabatan</label>
            <select class="form-control selectric" name="role">
              <option disabled selected>Pilih Jabatan</option>
              <option value="coordinator">Koordinator</option>
              <option value="member">Anggota</option>
            </select>
          </div>
          <button class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

@if (session()->has('success'))
  <script>
    Swal.fire({
      title: 'Success!',
      text: 'Do you want to continue',
      icon: 'success',
    })
  </script>
@endif

@endsection