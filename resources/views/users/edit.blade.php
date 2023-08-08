@extends('layouts.main')

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Pengurus</h1>
  </div>

  <div class="section-body">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Form Edit Pengurus</h4>
          </div>
          <div class="card-body">
            <form action="{{ route('pengurus.update', $user->id) }}" class="" method="post">
              @method('PUT')
              @csrf
              <input type="hidden" name="id" value="{{ $user->id }}">
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">name</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                <div class="col-sm-12 col-md-7">
                  <input type="Email" class="form-control" name="email" value="{{ $user->email }}">
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Divisi</label>
                <div class="col-sm-12 col-md-7">
                  <select class="form-control selectric" name="division_id">
                    <option disabled {{ !$user->division_id ? 'selected' : '' }}>Pilih Divisi</option>
                    @forelse ($divisions as $divisi)
                      <option value="{{ $divisi->id }}" {{ $divisi->id == $user->division_id ? 'selected' : '' }}>
                        {{ $divisi->name }}
                      </option>
                    @empty
                      <option disabled>Divisi Belum Tersedia</option>
                    @endforelse
                  </select>
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jabatan</label>
                <div class="col-sm-12 col-md-7">
                  <select class="form-control selectric" name="position">
                    <option value="leader" {{ $user->position == 'leader' ? 'selected' : '' }}>Leader</option>
                    <option value="sekertariat" {{ $user->position == 'sekertariat' ? 'selected' : '' }}>Sekertaris</option>
                    <option value="treasurer" {{ $user->position == 'treasurer' ? 'selected' : '' }}>Bendahara</option>
                    <option value="member" {{ $user->position == 'member' ? 'selected' : '' }}>Member</option>
                  </select>
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
                  <a class="btn btn-danger ml-2" href="{{ route('pengurus.index') }}">Back</a>
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