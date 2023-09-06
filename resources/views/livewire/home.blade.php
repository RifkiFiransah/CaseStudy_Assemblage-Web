<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <section class="section">
        <div class="section-header">
            <h1>Home</h1>
        </div>
        <div class="row">
            <div class="col-12 mb-4">
                <div class="hero text-white hero-bg-image hero-bg-parallax" data-background="../img/hima/33.JPG">
                    <div class="hero-inner">
                        <h2>Welcome, {{ auth()->user()->name }}!</h2>
                        <p class="lead">You almost arrived, complete the information about your account to complete
                            registration.</p>
                        <div class="mt-4">
                            <a wire:navigate href="{{ route('profil.index') }}"
                                class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="far fa-user"></i>
                                Setup Account</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('script')
    <script></script>
    @endpush
</div>