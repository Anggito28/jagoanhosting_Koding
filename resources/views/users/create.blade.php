<!DOCTYPE html>
<html lang="en">

@include('include.header')

<body class="g-sidenav-show bg-gray-100">
    <div class="min-height-300 bg-primary position-absolute w-100"></div>
    @include('include.sidebar')
    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        @include('include.navbar')
        <!-- End Navbar -->
        <div class="container-fluid py-4 mt-4 ">
            <div class="row mx-6 justify-content-center">
                <div class="col-lg-9 ">

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="{{ url('manage') }}">Manage
                                    Admin</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                @if (isset($user))
                                    Form Edit Admin
                                @else
                                    Form Tambah Admin
                                @endif
                            </li>
                        </ol>
                    </nav>

                </div>
                <div class="col-lg-9 mb-2 ">
                    <div class="card shadow-sm rounded-3">
                        <div class="card-header">
                            <h4 class="text-center">
                                @if (isset($user))
                                    Form Edit Admin
                                @else
                                    Form Tambah Admin
                                @endif
                            </h4>
                            <hr class="border">
                        </div>
                        <div class="card-body">
                            <form method="POST"
                                action="{{ isset($user) ? route('manage.update', $user->id) : route('manage.store') }}"
                                autocomplete="off">
                                {!! csrf_field() !!}
                                {!! isset($user) ? method_field('PUT') : '' !!}
                                <div class="row">
                                    <div class="col-md-12 mb-2">
                                        <label for="name">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Nama Lengkap" required
                                            value="{{ isset($user) ? $user->name : '' }}">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="example@gmail.com" required
                                            value="{{ isset($user) ? $user->email : '' }}">
                                        <span class="text-xs opacity-6">
                                            * Disertai simbol, nomor, dan huruf kapital</span>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="role">Role</label>
                                        {{-- select --}}
                                        <select class="form-control" id="role" name="role" required>
                                            <option value="">Pilih Role</option>
                                            <option value="admin"
                                                {{ isset($user) && $user->role == 'admin' ? 'selected' : '' }}>
                                                Admin</option>
                                            <option value="petugas"
                                                {{ isset($user) && $user->role == 'petugas' ? 'selected' : '' }}>
                                                Petugas</option>
                                        </select>
                                    </div>
                                    <hr class="border-sm">
                                    <div class="col-md-6">
                                        <label for="password">New Password</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="new password">
                                        <span id="message_password"></span>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="password">New Password Confirm</label>
                                        <input type="password" class="form-control" id="password_confirm"
                                            name="password_confirm" placeholder="new password comfirm">
                                        <span id='message'></span>
                                    </div>
                                    <div class="mt-4">
                                        <button type="submit" class="btn btn-success mx-2">Simpan</button>
                                        <a href=" {{ url('manage') }}" class="btn btn-outline-danger">Batal</a>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @include('include.footer')
        </div>
    </main>
    <!--   Core JS Files   -->
    @include('include.script')
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
        //confirm password
        $('#password_confirm').on('keyup', function() {
            if ($('#password').val() == $('#password_confirm').val()) {
                $('#message').html(' ');
            } else
                $('#message').html('Password tidak sama').css('color', 'red');
        });
        $('#password').on('keyup', function() {
            //8 karakter
            if ($('#password').val().length < 8) {
                $('#message_password').html('Password minimal 8 karakter').css('color', 'red');
            } else {
                $('#message_password').html(' ');
            }
        });
    </script>

</body>

</html>
