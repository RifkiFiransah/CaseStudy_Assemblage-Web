<div>
    {{-- Be like water. --}}
    <section class="section">
        <div class="section-header">
            <h1>Detail</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-10 col-lg-10">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4 class="card-title">{{ $divisi->name }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-10 col-md-10 col-lg-4">
                                    @if ($divisi->image)
                                        <img alt="image" src="../assets/img/avatar/{{ $divisi->image }}"
                                            class="rounded-circle" width="150">
                                    @else
                                        <img alt="image" src="../assets/img/avatar/avatar-2.png"
                                            class="rounded-circle" width="150">
                                    @endif
                                </div>
                                <div class="col-12 col-md-12 col-lg-8">
                                    <h3 class="card-text">{{ $divisi->description }}</h3>
                                    <p class="card-text">Kepala Divisi : {{ !$divisi->leader ? '-' : $divisi->leader }}
                                    </p>
                                    <p class="mb-0">Anggota : </p>
                                    <ul class="">
                                        @foreach ($divisi->users as $user)
                                            <li class="bold text-primary">{{ $user->name }}</li>
                                        @endforeach
                                    </ul>
                                    <p class="mb-0">Program Kerja : </p>
                                    <ul class="mb-5">
                                        @foreach ($divisi->tasks as $task)
                                            <li class="bold text-primary">{{ $task->name }}</li>
                                        @endforeach
                                    </ul>
                                    @can('update')
                                        <a wire:navigate href="{{ route('divisi.edit', $divisi->id) }}"
                                            class="btn btn-info"><i class="fas fa-pen"></i> Edit</a> |
                                    @endcan
                                    @can('delete')
                                        <button type="submit" class="btn btn-danger" wire:click='destroy({{ $divisi->id }})'><i
                                                class="fas fa-trash"></i> Delete</button>
                                    @endcan
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-whitesmoke">
                            <a wire:navigate href="{{ route('divisi.index') }}" class="btn btn-secondary">Back</a>
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
