<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <section class="section">
        <div class="container mt-2">
            <div class="row">
                <div
                    class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                    <div class="login-brand">
                        <img src="../img/hima/logo.PNG" alt="logo" width="100" class="shadow-light">
                    </div>

                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Register</h4>
                        </div>

                        <div class="card-body">
                            <form wire:submit="register" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Your Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" wire:model="name" required>
                                    @error('name')
                                    <div class="valid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" wire:model="email" required>
                                    @error('email')
                                    <div class="valid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Jabatan</label>
                                    <select class="form-control selectric" name="position" wire:model="position">
                                        <option disabled selected>Pilih Jabatan</option>
                                        <option value="sekertariat">Sekertaris</option>
                                        <option value="treasurer">Bendahara</option>
                                        <option value="member">Member</option>
                                        <option value="leader">Leader</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" wire:model="password"
                                        class="form-control @error('password') is-invalid @enderror" required>
                                    @error('password')
                                    <div class="valid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <button class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                    <div class="text-muted text-center">
                        You have an account? <a wire:navigate href="{{ route('login') }}">Login</a>
                    </div>
                    <div class="simple-footer">
                        Copyright &copy; 2023 <div class="bullet"></div> Build By <a href="https://nauv.al/">HIMA TI
                            UNIKU JAYA</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>