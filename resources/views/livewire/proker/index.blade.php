<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <section class="section">
        <div class="section-header">
            <h1>Program Kerja</h1>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Hima TI</h4>
                    <div class="card-header-action">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            <i class="fas fa-plus-circle"></i> Tambah Proker
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="table-1">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Proker</th>
                                    <th scope="col">Ketua Pelaksana</th>
                                    {{-- <th scope="col" style="width: 80px">status</th> --}}
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($tasks as $proker)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $proker->name }}</td>
                                    <td>{{ $proker->users->name }}</td>
                                    {{-- @switch($proker->status)
                                    @case('progress')
                                    <td class="badge badge-warning p-2 mt-2">{{ $proker->status }}</td>
                                    @break

                                    @case('success')
                                    <td class="badge badge-success p-2 mt-2">{{ $proker->status }}</td>
                                    @break

                                    @default
                                    <td class="badge badge-danger p-2 mt-2">{{ $proker->status }}</td>
                                    @endswitch --}}
                                    <td>{{ $proker->tanggal }}</td>
                                    <td colspan="2">
                                        @can('show')
                                        <a wire:navigate href="{{ route('proker.show', $proker->id) }}"
                                            class="btn btn-success"><i class="fas fa-eye"></i> Detail</a> |
                                        @endcan
                                        @can('update')
                                        <a wire:navigate href="{{ route('proker.edit', $proker->id) }}"
                                            class="btn btn-info"><i class="fas fa-pen"></i> Edit</a> |
                                        @endcan
                                        @can('delete')
                                        <button type="submit" class="btn btn-danger"
                                            wire:click.prefetch='destroy({{ $proker->id }})'
                                            id="delete-{{ $loop->iteration }}"><i class="fas fa-trash"></i>
                                            Delete</button>
                                        @endcan
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td>Belum ada data yang tersedia</td>
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
                    <h5 class="modal-title">Form Tambah Proker</h5>
                </div>
                <div class="modal-body">
                    <form wire:submit="storeProker" method="POST">
                        <div class="form-group">
                            <label>Nama Proker</label>
                            <input type="text" class="form-control" wire:model="name" value="" required>
                            {{-- <div class="valid-feedback">
                            </div> --}}
                        </div>
                        <div class="form-group">
                            <label>Tanggal Pelaksanaan</label>
                            <input type="date" class="form-control" wire:model="tanggal" required value="">
                        </div>
                        <div class="form-group">
                            <label>Divisi</label>
                            <select class="form-control selectric" wire:model="division_id">
                                <option disabled selected>Pilih Proker Divisi</option>
                                @forelse ($divisions as $divisi)
                                <option value="{{ $divisi->id }}">{{ $divisi->name }}</option>
                                @empty
                                <option disabled>Divisi saat ini belum tersedia</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Ketua Pelaksana</label>
                            <select class="form-control selectric" wire:model="user_id">
                                <option disabled selected>Pilih Ketua Pelaksana</option>
                                @forelse ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @empty
                                <option disabled>Pengurus saat ini belum tersedia</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control selectric" wire:model="status">
                                <option disabled selected>Pilih Status</option>
                                <option value="progress">Proses</option>
                                <option value="cancel">Belum</option>
                                <option value="success">Sukses</option>
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
                        Livewire.dispatch('deleteProker', {
                            id: event.detail[0].id
                        })
                    } else {
                        // location.reload();
                        Livewire.dispatch('indexProker', {
                            id: event.detail[0].id
                        })
                    }
                });
            })
    </script>
    @endpush
</div>