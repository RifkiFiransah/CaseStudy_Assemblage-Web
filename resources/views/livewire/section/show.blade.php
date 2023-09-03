<div>
    <section class="section">
        <div class="section-header">
            <h1>Detail</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-10 col-lg-10">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4 class="card-title">{{ $section->name }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-12 col-lg-12">
                                    <p class="card-text">Pengurus {{ $section->name }}: </p>
                                    <ul>
                                        @foreach ($committees as $panitia)
                                            <li>{{ $panitia->tasks->name ?? 'Data belum tersedia' }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-whitesmoke">
                            <a wire:navigate href="{{ route('section.index') }}" class="btn btn-secondary">Back</a>
                            @can('update')
                                <a wire:navigate href="{{ route('section.edit', $section->id) }}" class="btn btn-info"><i
                                        class="fas fa-pen"></i> Edit</a> |
                            @endcan
                            @can('delete')
                                <button type="submit" wire:click='destroy({{ $section->id }})' class="btn btn-danger"
                                    id="delete"><i class="fas fa-trash"></i>
                                    Delete</button>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('script')
        <script>
            window.addEventListener('swal:confirm', event => {
                event.preventDefault
                swal({
                    title: event.detail[0].title,
                    text: event.detail[0].text,
                    icon: event.detail[0].icon,
                    dangerMode: true,
                    buttons: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        Livewire.dispatch('deleteSection', {
                            id: event.detail[0].id
                        });
                    } else {
                        Livewire.dispatch('indexSection', {
                            id: event.detail[0].id
                        })
                    }
                })
            })
        </script>
    @endpush
</div>
