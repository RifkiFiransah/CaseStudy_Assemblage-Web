@extends('layouts.main')

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Seksi - seksi</h1>
  </div>

  <div class="section-body">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Form Edit Seksi</h4>
          </div>
          <div class="card-body">
            <form action="{{ route('seksi-seksi.update', $section->id) }}" class="" method="post">
              @method('PUT')
              @csrf
              <input type="hidden" name="id" value="{{ $section->id }}">
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama section</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" class="form-control" name="name" value="{{ $section->name }}">
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                <div class="col-sm-12 col-md-7">
                  <button class="btn btn-primary" type="submit">Update</button>
                  <a class="btn btn-danger ml-2" href="{{ route('seksi-seksi.index') }}">Back</a>
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