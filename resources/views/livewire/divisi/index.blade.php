<div>
    {{-- Do your work, then step back. --}}
    <section class="section">
        <div class="section-header">
            <h1>Divisi</h1>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Hima TI</h4>
                    <div class="card-header-action">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            <i class="fas fa-plus-circle"></i> Tambah Divisi
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name Divisi</th>
                                    <th scope="col" style="width: 220px">Deskripsi</th>
                                    <th scope="col" style="width: 220px">Kepala Divisi</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($divisions as $divisi)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $divisi->name }}</td>
                                        <td>{!! $divisi->description !!}</td>
                                        <td>
                                            {{ $divisi->leader ? $divisi->leader : 'Edit untuk menambahkan kepala divisi' }}
                                        </td>
                                        <td colspan="3">
                                            @can('show')
                                                <a href="{{ route('divisi.show', $divisi->id) }}" class="btn btn-success"><i
                                                        class="fas fa-eye"></i> Detail</a> |
                                            @endcan
                                            @can('update')
                                                <a href="{{ route('divisi.edit', $divisi->id) }}" class="btn btn-info"><i
                                                        class="fas fa-pen"></i> Edit</a> |
                                            @endcan
                                            @can('delete')
                                                <button class="btn btn-danger" wire:click='destroy({{ $divisi->id }})'
                                                    id="delete-{{ $loop->iteration }}"><i class="fas fa-trash"></i>
                                                    Delete</button>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
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
                    <h5 class="modal-title">Form Tambah Divisi</h5>
                </div>
                <div class="modal-body">
                    <form wire:submit='store'>
                        <div class="form-group">
                            <label>Nama Divisi</label>
                            <input type="text" class="form-control" wire:model="name" required>
                        </div>
                        <div class="form-group">
                            <label>kepala Divisi</label>
                            <select class="form-control selectric" wire:model="leader">
                                <option disabled selected>Pilih Kepala Divisi</option>
                                @forelse ($users as $user)
                                    <option value="{{ $user->name }}">{{ $user->name }}</option>
                                @empty
                                    <option disabled>Kepala Divisi Belum Tersedia</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Description : {{ $description }}</label>
                            <div>
                                <textarea class="form-control" wire:model="description" rows="3"></textarea>
                                {{-- <textarea class="form-control summernote-simple" wire:model="description">{{ $description }}</textarea> --}}
                            </div>
                        </div>
                        <button class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

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
                        Livewire.dispatch('deleteDivisi', {
                            id: event.detail[0].id
                        })
                    } else {
                        // location.reload();
                        Livewire.dispatch('indexDivisi', {
                            id: event.detail[0].id
                        })
                    }
                });
            })
        </script>
    @endpush
</div>
