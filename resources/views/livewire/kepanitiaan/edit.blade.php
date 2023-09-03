<div>
    <section class="section">
        <div class="section-header">
            <h1>Edit Kepanitiaan</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Form Edit Kepanitiaan</h4>
                        </div>
                        <div class="card-body">
                            <form wire:submit='updatePanitia' method="post">
                                <input type="hidden" wire:model="id" value="{{ $panitia->id }}">
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Proker</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control selectric" wire:model="task_id">
                                            <option disabled>Pilih Program Kerja</option>
                                            @forelse ($tasks as $proker)
                                                <option value="{{ $proker->id }}"
                                                    {{ $proker->id == $panitia->task_id ? 'selected' : '' }}>
                                                    {{ $proker->name }}
                                                </option>
                                            @empty
                                                <option disabled>Data saat ini belum tersedia</option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pengurus</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control selectric" wire:model="user_id">
                                            <option disabled>Pilih Pengurus</option>
                                            @forelse ($users as $pengurus)
                                                <option value="{{ $pengurus->id }}"
                                                    {{ $pengurus->id == $panitia->user_id ? 'selected' : '' }}>
                                                    {{ $pengurus->name }}
                                                </option>
                                            @empty
                                                <option disabled>Data saat ini belum tersedia</option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Seksi</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control selectric" wire:model="section_id">
                                            <option disabled>Pilih Program Kerja</option>
                                            @forelse ($sections as $seksi)
                                                <option value="{{ $seksi->id }}"
                                                    {{ $seksi->id == $panitia->section_id ? 'selected' : '' }}>
                                                    {{ $seksi->name }}
                                                </option>
                                            @empty
                                                <option disabled>Data saat ini belum tersedia</option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jabatan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control selectric" wire:model="role">
                                            <option disabled>Pilih Jabatan</option>
                                            <option value="coordinator"
                                                {{ $panitia->role == 'coordinator' ? 'selected' : '' }}>
                                                Koordinator
                                            </option>
                                            <option value="member" {{ $panitia->role == 'member' ? 'selected' : '' }}>
                                                Anggota
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary" type="submit">Update</button>
                                        <a wire:navigate class="btn btn-danger ml-2"
                                            href="{{ route('kepanitiaan.index') }}">Back</a>
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
