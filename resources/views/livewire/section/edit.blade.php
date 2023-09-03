<div>
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
                            <form wire:submit='update' class="" method="post">
                                <input type="hidden" wire:model="id" value="{{ $section->id }}">
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama
                                        section</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" wire:model="name"
                                            value="{{ $section->name }}">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary" type="submit">Update</button>
                                        <a wire:navigate class="btn btn-danger ml-2"
                                            href="{{ route('section.index') }}">Back</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
