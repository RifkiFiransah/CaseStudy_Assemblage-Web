<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
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
                            <form wire:submit='updateDivisi' class="" method="post">
                                <input type="hidden" wire:model="id" value="{{ $divisi->id }}">
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama
                                        Divisi</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" wire:model="name"
                                            value="{{ $divisi->name }}">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kepala
                                        Divisi</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control selectric" wire:model="leader">
                                            <option disabled {{ !$divisi->leader ? 'selected' : '' }}>Pilih Kepala
                                                Divisi</option>
                                            @forelse ($users as $user)
                                                @if ($divisi->leader == $user->name)
                                                    <option value="{{ $user->name }}" selected>{{ $user->name }}
                                                    </option>
                                                @else
                                                    <option value="{{ $user->name }}">{{ $user->name }}</option>
                                                @endif
                                            @empty
                                                <option disabled>Kepala Divisi Belum Tersedia</option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi
                                        {{ $description }}</label>
                                    <div class="col-sm-12 col-md-7">
                                        <div wire:ignore>
                                            <textarea class="form-control" id="summernote" wire:model="description">{{ $description }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary" type="submit">Update</button>
                                        <a wire:navigate class="btn btn-danger ml-2"
                                            href="{{ route('divisi.index') }}">Back</a>
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
            $('#summernote').summernote({
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
