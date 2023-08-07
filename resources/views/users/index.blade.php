@extends('layouts.main')

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Pengurus</h1>
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
            <i class="fas fa-plus-circle"></i> Tambah Pengurus
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
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Divisi</th>
              <th scope="col">Jabatan</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($users as $user)
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $user->name }}</td>
                <td>
                  {{ $user->division_id ? $user->divisions->name : 'Edit data untuk menambahkan divisi' }}
                </td>
                <td>{{ $user->position }}</td>
                <td colspan="2">
                  <a href="{{ route('pengurus.edit', $user->id) }}" class="btn btn-info"><i class="fas fa-pen"></i> Edit</a> | 
                  <form action="{{ route('pengurus.destroy', $user->id) }}" method="post" class="d-inline">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</button>
                  </form>
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
</section>
<div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Form Tambah Pengurus</h5>
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
        <form action="{{ route('pengurus.store') }}" method="POST">
          @csrf
          <div class="form-group">
            <label>Your Name</label>
            <input type="text" class="form-control" name="name" value="" required>
            {{-- <div class="valid-feedback">
            </div> --}}
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" required value="">
          </div>
          <div class="form-group">
            <label>Jabatan</label>
            <select class="form-control selectric" name="position">
              <option disabled>Pilih Jabatan Divisi</option>
              <option value="leader">Leader</option>
              <option value="sekertariat">Sekertaris</option>
              <option value="treasurer">Bendahara</option>
              <option value="member">Member</option>
            </select>
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
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