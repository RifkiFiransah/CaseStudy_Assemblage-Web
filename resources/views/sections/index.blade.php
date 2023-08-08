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
                <th scope="col">Nama Seksi</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($sections as $seksi)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $seksi->name }}</td>
                  <td>
                    <a href="{{ route('seksi-seksi.edit', $seksi->id) }}" class="btn btn-info"><i class="fas fa-pen"></i> Edit</a> | 
                    <form action="{{ route('seksi-seksi.destroy', $seksi->id) }}" method="post" class="d-inline">
                      @csrf
                      @method('delete')
                      <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</button>
                    </form>
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