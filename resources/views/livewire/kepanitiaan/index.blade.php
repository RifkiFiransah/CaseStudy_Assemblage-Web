<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <section class="section">
        <div class="section-header">
            <h1>Kepanitiaan</h1>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Hima TI</h4>
                    <div class="card-header-action">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            <i class="fas fa-plus-circle"></i> Tambah Kepanitiaan
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table" id="table-1">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Proker</th>
                                    <th scope="col">Seksi</th>
                                    <th scope="col">Pengurus</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($kepanitiaan as $panitia)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $panitia->tasks->name }}</td>
                                        <td>{{ $panitia->sections->name }}</td>
                                        <td>{{ $panitia->users->name }}</td>
                                        <td colspan="3">
                                            @can('show')
                                                <a wire:navigate href="{{ route('kepanitiaan.show', $panitia->id) }}"
                                                    class="btn btn-success"><i class="fas fa-eye"></i> Detail</a> |
                                            @endcan
                                            @can('update')
                                                <a wire:navigate href="{{ route('kepanitiaan.edit', $panitia->id) }}"
                                                    class="btn btn-info"><i class="fas fa-pen"></i> Edit</a> |
                                            @endcan
                                            @can('delete')
                                                <button wire:click='destroy({{ $panitia->id }})' type="submit"
                                                    class="btn btn-danger" id="delete-{{ $loop->iteration }}"><i
                                                        class="fas fa-trash"></i>
                                                    Delete</button>
                                            @endcan
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Saat ini data belum tersedia</td>
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
                    <h5 class="modal-title">Form Tambah Kepanitiaan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit='store' method="POST">
                        <div class="form-group">
                            <label>Proker</label>
                            <select class="form-control selectric" wire:model="task_id">
                                <option disabled selected>Pilih Program Kerja</option>
                                @forelse ($tasks as $proker)
                                    <option value="{{ $proker->id }}">{{ $proker->name }}</option>
                                @empty
                                    <option disabled>Data saat ini belum tersedia</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Pengurus</label>
                            <select class="form-control selectric" wire:model="user_id">
                                <option disabled selected>Pilih Pengurus</option>
                                @forelse ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @empty
                                    <option disabled>Data saat ini belum tersedia</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Seksi</label>
                            <select class="form-control selectric" wire:model="section_id">
                                <option disabled selected>Pilih Seksi</option>
                                @forelse ($sections as $seksi)
                                    <option value="{{ $seksi->id }}">{{ $seksi->name }}</option>
                                @empty
                                    <option disabled>Data saat ini belum tersedia</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Jabatan</label>
                            <select class="form-control selectric" wire:model="role">
                                <option disabled selected>Pilih Jabatan</option>
                                <option value="coordinator">Koordinator</option>
                                <option value="member">Anggota</option>
                            </select>
                        </div>
                        <button class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('script')
        <script>
            window.addEventListener('swal:confirm', event => {
                event.preventDefault
                swal({
                    title: event.detail[0].title,
                    text: event.detail[0].text,
                    icon: event.detail[0].icon,
                    buttons: true,
                    dangerMode: true
                }).then((willDelete) => {
                    if (willDelete) {
                        Livewire.dispatch('deletePanitia', {
                            id: event.detail[0].id
                        })
                    } else {
                        Livewire.dispatch('indexPanitia', {
                            id: event.detail[0].id
                        })
                    }
                })
            })
        </script>
    @endpush
</div>
