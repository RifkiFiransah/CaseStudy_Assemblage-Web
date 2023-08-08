@extends('layouts.main')

@section('content')
<section class="section">
  <div class="section-header">
    <h1>proker</h1>
  </div>

  <div class="section-body">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Form Edit Proker</h4>
          </div>
          <div class="card-body">
            <form action="{{ route('proker.update', $proker->id) }}" class="" method="post">
              @method('PUT')
              @csrf
              <input type="hidden" name="id" value="{{ $proker->id }}">
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama proker</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" class="form-control" name="name" value="{{ $proker->name }}">
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Divisi</label>
                <div class="col-sm-12 col-md-7">
                  <select class="form-control selectric" name="division_id">
                    @forelse ($divisions as $divisi)
                    @if ($proker->division_id == $divisi->id)
                    <option value="{{ $divisi->id }}" selected>{{ $divisi->name }}</option>
                    @else  
                        <option value="{{ $divisi->id }}">{{ $divisi->name }}</option>     
                      @endif
                    @empty
                      <option disabled>Divisi Belum Tersedia</option>
                    @endforelse
                  </select>
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Ketua Pelaksana</label>
                <div class="col-sm-12 col-md-7">
                  <select class="form-control selectric" name="user_id">
                    @forelse ($users as $user)
                      @if ($proker->user_id == $user->id)
                        <option value="{{ $user->id }}" selected>{{ $user->name }}</option>
                      @else  
                        <option value="{{ $user->id }}">{{ $user->name }}</option>     
                      @endif
                    @empty
                      <option disabled>Ketua Pelaksana Belum Tersedia</option>
                    @endforelse
                  </select>
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                <div class="col-sm-12 col-md-7">
                  <select class="form-control selectric" name="status">
                    <option value="progress" {{ $proker->status == 'progress' ? 'selected' : '' }}>
                      Proses
                    </option>
                    <option value="cancel" {{ $proker->status == 'cancel' ? 'selected' : '' }}>
                      Belum
                    </option>
                    <option value="success" {{ $proker->status == 'success' ? 'selected' : '' }}>Berhasil</option>  
                  </select>
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal proker</label>
                <div class="col-sm-12 col-md-7">
                  <input type="date" class="form-control" name="tanggal" value="{{ $proker->tanggal }}">
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tema</label>
                <div class="col-sm-12 col-md-7">
                  <textarea class="summernote-simple" name="tema">{{ $proker->tema }}</textarea>
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                <div class="col-sm-12 col-md-7">
                  <button class="btn btn-primary" type="submit">Update</button>
                  <a class="btn btn-danger ml-2" href="{{ route('proker.index') }}">Back</a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection