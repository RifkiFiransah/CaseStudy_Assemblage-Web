<div>
    {{-- Be like water. --}}
    <section class="section">
        <div class="section-header">
            <h1>Pengurus</h1>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Hima TI</h4>
                    <div class="card-header-action">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            <i class="fas fa-plus-circle"></i> Tambah Pengurus
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Divisi</th>
                                    <th scope="col">Jabatan</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                @props(['id' => $user->id])
                                <tr wire:key="{{ $user->id }}">
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>
                                        {{-- {{ $user->division_id ? $user->divisions->name : 'Edit data untuk
                                        menambahkan divisi' }} --}}
                                        {{ $user->divisions->name ?? 'Edit data untuk menambahkan divisi' }}
                                    </td>
                                    <td>{{ $user->position }}</td>
                                    <td colspan="3">
                                        @can('show')
                                        <a wire:navigate href="{{ route('pengurus.show', $user->id) }}"
                                            class="btn btn-success"><i class="fas fa-eye"></i> Detail</a> |
                                        @endcan
                                        @can('update')
                                        <a wire:navigate href="{{ route('pengurus.edit', $user->id) }}"
                                            class="btn btn-info"><i class="fas fa-pen"></i> Edit</a> |
                                        @endcan
                                        @can('delete')
                                        {{-- <form wire:submit='destroy({{ $user->id }})' class="d-inline">
                                            <input type="text" wire:model='id' value="{{ $id }}">
                                            <button type="submit" class="btn btn-danger"
                                                id="delete-{{ $loop->iteration }}"><i class="fas fa-trash"></i>
                                                Delete</button>
                                        </form> --}}
                                        <button class="btn btn-danger" wire:click.prefetch='destroy({{ $user->id }})'
                                            id="delete-{{ $loop->iteration }}"><i class="fas fa-trash"></i>
                                            Delete</button>
                                        @endcan
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td>Saat ini data belum tersedia</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </section>
    <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Form Tambah Pengurus</h5>
                    {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> --}}
                </div>
                <div class="modal-body">
                    <form wire:submit='store'>
                        <div class="form-group">
                            <label>Your Name</label>
                            <input type="text" class="form-control" wire:model="form.name"
                                value="{{ old('name') ?? '' }}" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" wire:model="form.email" required
                                value="{{ old('email') ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label>Jabatan</label>
                            <select class="form-control selectric" wire:model="form.position">
                                <option disabled selected>Pilih Jabatan</option>
                                <option value="sekertariat">Sekertaris</option>
                                <option value="treasurer">Bendahara</option>
                                <option value="member">Member</option>
                                <option value="leader">Leader</option>
                            </select>
                        </div>
                        <button class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('script')
    <script type="text/javascript">
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
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        // $('this').trigger('click', {});
                        Livewire.dispatch('delete', {
                            id: event.detail[0].id
                        })
                    } else {
                        // location.reload();
                        Livewire.dispatch('indexPengurus', {
                            id: event.detail[0].id
                        })
                    }
                });
            })
    </script>
    @endpush
</div>