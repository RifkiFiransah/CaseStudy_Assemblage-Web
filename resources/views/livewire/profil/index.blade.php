<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <section class="section">
        <div class="section-header">
            <h1>Profile</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Profile</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-5">
                    <div class="card profile-widget">
                        <div class="profile-widget-header">
                            <img alt="image" src="../assets/img/avatar/{{ auth()->user()->profile }}"
                                class="rounded-circle profile-widget-picture">
                            <div class="profile-widget-items">
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-value">{{ auth()->user()->email }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="profile-widget-description">
                            <div class="profile-widget-name">{{ auth()->user()->name }} <div
                                    class="text-muted d-inline font-weight-normal">
                                    <div class="slash"></div> {{ auth()->user()->position }}
                                </div>
                            </div>
                            Ujang maman is a superhero name in <b>Indonesia</b>, especially in my family. He is not a
                            fictional character but an original hero in my family, a hero for his children and for his
                            wife. So, I use the name as a user in this template. Not a tribute, I'm just bored with
                            <b>'John Doe'</b>.
                        </div>
                        <div class="card-footer text-center">
                            <div class="font-weight-bold mb-2">Follow Ujang On</div>
                            <a href="#" class="btn btn-social-icon btn-facebook mr-1">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="btn btn-social-icon btn-twitter mr-1">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="btn btn-social-icon btn-github mr-1">
                                <i class="fab fa-github"></i>
                            </a>
                            <a href="#" class="btn btn-social-icon btn-instagram">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-7">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Profile</h4>
                        </div>
                        <div class="card-body">
                            <form wire:submit='update' method="POST">
                                <input type="hidden" value="{{ auth()->user()->id }}" wire:model="id">
                                <div class="form-group">
                                    <label>Your Name</label>
                                    <input type="text" class="form-control" wire:model="name"
                                        value="{{ auth()->user()->name }}" required>
                                    {{-- <div class="valid-feedback">
                                    </div> --}}
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" wire:model="email" required
                                        value="{{ auth()->user()->email }}">
                                </div>
                                <div class="form-group">
                                    <label>Jabatan</label>
                                    <select class="form-control selectric" wire:model="position">
                                        <option value="leader" {{ auth()->user()->position == 'leader' ? 'selected' : ''
                                            }}>Leader</option>
                                        <option value="sekertariat" {{ auth()->user()->position == 'sekertariat' ?
                                            'selected' : '' }}>Sekertaris</option>
                                        <option value="treasurer" {{ auth()->user()->position == 'treasurer' ?
                                            'selected' : '' }}>Bendahara</option>
                                        <option value="member" {{ auth()->user()->position == 'member' ? 'selected' : ''
                                            }}>Member</option>
                                    </select>
                                </div>
                                {{-- <div class="form-group">
                                    <label>Bio</label>
                                    <textarea
                                        class="form-control summernote-simple">Ujang maman is a superhero name in <b>Indonesia</b>, especially in my family. He is not a fictional character but an original hero in my family, a hero for his children and for his wife. So, I use the name as a user in this template. Not a tribute, I'm just bored with <b>'John Doe'</b>.</textarea>
                                </div> --}}
                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-primary">Update Profil</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
                    if(oke) {
                        Livewire.dispatch('indexProfil')
                    }
                })
            })
    </script>
    @endpush
</div>