<div>
    {{-- Stop trying to control. --}}
    <section class="section">
        <div class="section-header">
            <h1>Activities</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">
                    <a wire:navigate href="{{ route('calendar') }}" class="btn btn-primary"><i
                            class="far fa-calendar-alt"></i> Lihat
                        Kalender</a>
                </div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">
                {{ \Carbon\Carbon::parse(date('Y-m-d'))->format('l') }}:
                {{ date('d - F - Y') }}
            </h2>
            <div class="row">
                <div class="col-12">
                    <div class="activities">
                        @forelse ($tasks as $proker)
                            <div class="activity">
                                @if ($proker->status == 'success')
                                    <div class="activity-icon bg-primary text-white shadow-primary">
                                        <i class="far fa-calendar-check"></i>
                                    </div>
                                @else
                                    <div class="activity-icon bg-secondary text-danger shadow-secondary">
                                        <i class="far fa-calendar-times"></i>
                                    </div>
                                @endif
                                <div class="activity-detail col-md-8">
                                    <div class="mb-2">
                                        <a class="text-job" href="#">{{ $proker->name }}</a>
                                        <span class="bullet"></span>
                                        <span class="text-job text-primary" id="date{{ $proker->id }}"></span>
                                        <div class="float-right dropdown">
                                            <a href="#" data-toggle="dropdown"><i
                                                    class="fas fa-ellipsis-h"></i></a>
                                            <div class="dropdown-menu">
                                                <div class="dropdown-title">Options</div>
                                                <a href="#" class="dropdown-item has-icon"><i
                                                        class="fas fa-eye"></i> View</a>
                                                <div class="dropdown-divider"></div>
                                                <a href="#" class="dropdown-item has-icon text-danger"
                                                    data-confirm="Wait, wait, wait...|This action can't be undone. Want to take risks?"
                                                    data-confirm-text-yes="Yes, IDC"><i class="fas fa-trash-alt"></i>
                                                    Archive</a>
                                            </div>
                                        </div>
                                    </div>
                                    <p>{{ $proker->tema }}</p>
                                    <div class="d-flex justify-content-between mt-4">
                                        <span class="mr-3">
                                            <img src="{{ asset('./assets/img/avatar/' . $proker->users->profile) }}"
                                                alt="{{ $proker->users->name }}"
                                                class="rounded-circle object-cover mr-2" width="20"
                                                data-toggle="tooltip" data-placement="top">
                                            {{ $proker->users->name }}
                                        </span>
                                        <span class="text-success">&mdash; Divisi {{ $proker->divisions->name }}</span>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="activity">
                                <div class="activity-detail">
                                    <p>Data Program Kerja belum tersedia, silahkan tambahkan data dan selesaikan Program
                                        Kerja supaya dapat dilihat timeline nya.</p>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('script')
        <script type="text/javascript">
            // window.addEventListener();
            @foreach ($tasks as $proker)
                document.getElementById('date{{ $proker->id }}').textContent = moment("{{ $proker->tanggal }}").fromNow();
            @endforeach
        </script>
    @endpush
</div>
