<div>
    {{-- Do your work, then step back. --}}
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
                            <form wire:submit='update' class="" method="post">
                                <input type="hidden" name="id" value="{{ $proker->id }}">
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama
                                        proker</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" wire:model="name"
                                            value="{{ $proker->name }}">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Divisi</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control selectric" wire:model="division_id">
                                            @forelse ($divisions as $divisi)
                                            @if ($proker->division_id == $divisi->id)
                                            <option value="{{ $divisi->id }}" selected>{{ $divisi->name }}
                                            </option>
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
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Ketua
                                        Pelaksana</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control selectric" wire:model="user_id">
                                            @forelse ($users as $user)
                                            @if ($proker->user_id == $user->id)
                                            <option value="{{ $user->id }}" selected>{{ $user->name }}
                                            </option>
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
                                        <select class="form-control selectric" wire:model="status">
                                            <option value="progress" {{ $proker->status == 'progress' ? 'selected' : ''
                                                }}>
                                                Proses
                                            </option>
                                            <option value="cancel" {{ $proker->status == 'cancel' ? 'selected' : '' }}>
                                                Belum
                                            </option>
                                            <option value="success" {{ $proker->status == 'success' ? 'selected' : ''
                                                }}>Berhasil</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal
                                        proker</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="date" class="form-control" wire:model="tanggal"
                                            value="{{ $proker->tanggal }}">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tema {{ $tema
                                        }}</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea class="form-control" id="summer-note"
                                            wire:model="tema">{{ $tema }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary" type="submit">Update</button>
                                        <a wire:navigate class="btn btn-danger ml-2"
                                            href="{{ route('proker.index') }}">Back</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('script')
    <script type="text/javascript">
        $('#summer-note').summernote({
                tabsize: 2,
                height: 130,
                toolbar: [
                    ['font', ['bold', 'underline', 'clear']],
                    ['para', ['ul', 'ol', 'paragraph']]
                ],
                callbacks: {
                    onChange: function(contents, $editable) {
                        // console.log(contents);
                        @this.set('description', contents);
                    }
                }
            });
    </script>
    @endpush
</div>