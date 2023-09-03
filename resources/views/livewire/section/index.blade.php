<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <section class="section">
        <div class="section-header">
            <h1>Seksi - seksi</h1>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Hima TI</h4>
                    <div class="card-header-action">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            <i class="fas fa-plus-circle"></i> Tambah Seksi
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Seksi</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($sections as $seksi)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $seksi->name }}</td>
                                        <td colspan="3">
                                            @can('show')
                                                <a wire:navigate href="{{ route('section.show', $seksi->id) }}"
                                                    class="btn btn-success"><i class="fas fa-eye"></i> Detail</a> |
                                            @endcan
                                            @can('update')
                                                <a wire:navigate href="{{ route('section.edit', $seksi->id) }}"
                                                    class="btn btn-info"><i class="fas fa-pen"></i> Edit</a> |
                                            @endcan
                                            @can('delete')
                                                <button type="submit" wire:click='destroy({{ $seksi->id }})'
                                                    class="btn btn-danger" id="delete-{{ $seksi->id }}"><i
                                                        class="fas fa-trash"></i>
                                                    Delete</button>
                                            @endcan
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">Data saat ini belum tersedia</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Form Tambah Seksi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit='store' method="POST">
                        <div class="form-group">
                            <label>Nama Seksi</label>
                            <input type="text" class="form-control" wire:model="name" value="" required>
                        </div>
                        <button class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('script')
        <script>
            window.addEventListener('swal:success', event => {
                event.preventDefault
                swal({
                    title: event.detail[0].title,
                    text: event.detail[0].text,
                    icon: event.detail[0].icon,
                    dangerMode: true
                }).then((oke) => {
                    iziToast.success({
                        title: 'Success!',
                        message: event.detail[0].text,
                        position: 'topRight'
                    });
                })
            })

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
