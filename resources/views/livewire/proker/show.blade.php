<div>
    {{-- Stop trying to control. --}}
    <section class="section">
        <div class="section-header">
            <h1>Detail</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-10 col-lg-10">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4 class="card-title">{{ $proker->name }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-12 col-lg-12">
                                    <h4 class="card-text">Divisi {{ $proker->divisions->name }}</h4>
                                    <p class="card-text">Tema : <b>{{ $proker->tema }}</b></p>
                                    <p class="card-text">Ketua Pelaksana : <b>{{ $proker->users->name }}</b></p>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-whitesmoke">
                            <a wire:navigate href="{{ route('proker.index') }}" class="btn btn-secondary">Back</a> |
                            @can('update')
                                <a wire:navigate href="{{ route('proker.edit', $proker->id) }}" class="btn btn-info"><i
                                        class="fas fa-pen"></i> Edit</a> |
                            @endcan
                            @can('delete')
                                <button wire:click='destroy({{ $proker->id }})' type="submit" class="btn btn-danger"
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
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        // $('this').trigger('click', {});
                        Livewire.dispatch('deleteProker', {
                            id: event.detail[0].id
                        })
                    } else {
                        // location.reload();
                        Livewire.dispatch('index', {
                            id: event.detail[0].id
                        })
                    }
                });
            })
        </script>
    @endpush
</div>
