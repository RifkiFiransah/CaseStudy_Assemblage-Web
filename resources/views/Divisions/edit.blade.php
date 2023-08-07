@extends('layouts.main')

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Divisi</h1>
  </div>

  <div class="section-body">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Form Edit Divisi</h4>
          </div>
          <div class="card-body">
            <form action="{{ route('divisi.update', $divisi->id) }}" class="" method="post">
              @method('PUT')
              @csrf
              <input type="hidden" name="id" value="{{ $divisi->id }}">
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Divisi</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" class="form-control" name="name" value="{{ $divisi->name }}">
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kepala Divisi</label>
                <div class="col-sm-12 col-md-7">
                  <select class="form-control selectric" name="leader">
                    @forelse ($users as $user)
                      <option value="{{ $user->name }}">{{ $user->name }}</option>
                    @empty
                      <option disabled>Kepala Divisi Belum Tersedia</option>
                    @endforelse
                  </select>
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi</label>
                <div class="col-sm-12 col-md-7">
                  <textarea class="summernote-simple" name="description" required>{{ $divisi->description }}</textarea>
                </div>
              </div>
              {{-- <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
                <div class="col-sm-12 col-md-7">
                  <textarea class="summernote-simple"></textarea>
                </div>
              </div> --}}
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                <div class="col-sm-12 col-md-7">
                  <button class="btn btn-primary" type="submit">Update</button>
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