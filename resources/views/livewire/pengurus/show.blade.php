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
                            <h4 class="card-title">{{ $user->name }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-10 col-md-10 col-lg-4">
                                    <img alt="image" src="../assets/img/avatar/{{ $user->profile }}"
                                        class="rounded-circle" width="150">
                                </div>
                                <div class="col-12 col-md-12 col-lg-8">
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the bulk of the card's content.</p>
                                    @can('update')
                                        <a wire:navigate href="{{ route('pengurus.edit', $user->id) }}"
                                            class="btn btn-info"><i class="fas fa-pen"></i> Edit</a>
                                    @endcan
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-whitesmoke">
                            <a wire:navigate href="{{ route('pengurus.index') }}" class="btn btn-secondary">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
