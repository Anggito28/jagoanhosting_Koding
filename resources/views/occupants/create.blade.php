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
        <div class="container-fluid py-4 mt-4">
            <form method="POST"
                action="{{ isset($occupants) ? route('occupants.update', $occupants->id) : route('occupants.store') }}"
                autocomplete="off">
                {!! csrf_field() !!}
                {!! isset($occupants) ? method_field('PUT') : '' !!}
                <div class="row mx-6">
                    <div class="col-lg-12">

                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                <li class="breadcrumb-item" aria-current="page"><a href="{{ url('pasien') }}">Pasien</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    @if (isset($readonly) && $readonly == true)
                                        Data Penghuni
                                    @elseif (isset($occupants))
                                        Form Ubah Penghuni
                                    @elseif (!isset($occupants))
                                        Form Tambah Penghuni
                                    @endif
                                </li>
                            </ol>
                        </nav>

                    </div>
                    <div class="col-lg-12 mb-2">
                        <div class="card shadow-sm rounded-3">
                            <div class="card-header">
                                <h4 class="text-center">
                                    @if (isset($readonly) && $readonly == true)
                                        Data Penghuni {{ $occupants->name }}
                                    @elseif (isset($occupants))
                                        Form Ubah Penghuni {{ $occupants->name }}
                                    @elseif (!isset($occupants))
                                        Form Tambah Penghuni
                                    @endif
                                </h4>
                                <hr class="border">
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3 mb-2">
                                        <label for="no_reg">No. Registrasi</label>
                                        <input type="text" class="form-control"
                                            value="{{ isset($occupants) ? $occupants->registration_number : $last }}"
                                            disabled>
                                    </div>
                                    <div class="col-md-8">
                                        {{-- <label for="no_reg">No. Registrasi</label> --}}
                                        <input type="hidden" name="registration_number"
                                            value="{{ isset($occupants) ? $occupants->registration_number : $last }}">
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="name">Nama Penghuni</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Nama Lengkap"
                                            value="{{ isset($occupants) ? $occupants->name : '' }}" required
                                            {{ isset($readonly) ? 'disabled' : '' }}>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="name">Tempat Lahir</label>
                                        <input type="text" class="form-control" id="birth_place" name="birth_place"
                                            maxlength="20" placeholder="Tempat Lahir"
                                            value="{{ isset($occupants) ? $occupants->birth_place : '' }}" required
                                            {{ isset($readonly) ? 'disabled' : '' }}>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="name">Tanggal Lahir</label>
                                        <input type="date" class="form-control" id="birth_date" name="birth_date"
                                            value="{{ isset($occupants) ? $occupants->birth_date : '' }}" required
                                            {{ isset($readonly) ? 'disabled' : '' }} onchange="ageCount()">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="name">Jenis Kelamin</label>
                                        <div>
                                            <select name="gender" id="gender" class="form-control">
                                                <option value="Laki-laki"
                                                    {{ isset($occupants) && $occupants->gender == 'Laki-laki' ? 'selected' : '' }}>
                                                    Laki - Laki</option>
                                                <option value="Perempuan"
                                                    {{ isset($occupants) && $occupants->gender == 'Perempuan' ? 'selected' : '' }}>
                                                    Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="age">Usia</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="age" name="age"
                                                    placeholder="ex : 26" aria-label="Recipient's username"
                                                    aria-describedby="basic-addon2"
                                                    value="{{ isset($occupants) ? $occupants->age : '' }}" required
                                                    {{ isset($readonly) ? 'disabled' : '' }}>
                                                <span class="input-group-text" id="basic-addon2">Tahun</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="job">Pekerjaan</label>
                                        {{-- <input type="text" class="form-control" id="job" name="job"
                                            placeholder="ex : Pegawai Negeri Sipil"
                                            value="{{ isset($occupants) ? $occupants->job : '' }}" required
                                            {{ isset($readonly) ? 'disabled' : '' }}> --}}
                                        <select name="job" id="job" class="form-control">
                                            <option value="pns">Pegawai Negeri Sipil</option>
                                            <option value="swasta">Swasta</option>
                                            <option value="wiraswasta">Wiraswasta</option>
                                            <option value="ibu rumah tangga">Ibu Rumah Tangga</option>
                                            <option value="tidak bekerja">Tidak Bekerja</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="nik">Nomor Kependudukan (NIK)</label>
                                        <input type="text" name="nik" class="form-control"
                                            placeholder="ex: 341111****" maxlength="16" minlength="16"
                                            value="{{ isset($occupants) ? $occupants->nik : '' }}" required
                                            {{ isset($readonly) ? 'disabled' : '' }}>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="phone_number">Nomor HP</label>
                                        <input type="text" name="phone_number" class="form-control"
                                            placeholder="ex: 0223****" maxlength="13" minlength="10"
                                            value="{{ isset($occupants) ? $occupants->phone_number : '' }}" required
                                            {{ isset($readonly) ? 'disabled' : '' }}>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label for="name_parents">Status Tinggal</label>
                                        <div>
                                            <select name="status_tinggal" id="status_tinggal" class="form-control">
                                                <option value="Tetap"
                                                    {{ isset($occupants) && $occupants->status_tinggal == 'Tetap' ? 'selected' : '' }}>
                                                    Tetap</option>
                                                <option value="Tidak Tetap"
                                                    {{ isset($occupants) && $occupants->status_tinggal == 'Tidak Tetap' ? 'selected' : '' }}>
                                                    Tidak Tetap</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label for="alamat">Alamat</label>
                                        <textarea name="address" class="form-control" id="address" cols="10" rows="2" required
                                            {{ isset($readonly) ? 'disabled' : '' }}>{{ isset($occupants) ? $occupants->address : '' }}</textarea>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <label for="">Keterangan Lain</label>
                                        <textarea name="additional_information" class="form-control" id="additional_information" cols="10"
                                            rows="8" required {{ isset($readonly) ? 'disabled' : '' }}>{{ isset($occupants) ? $occupants->additional_information : '' }}</textarea>
                                    </div>
                                    <div class="mt-3 row">
                                        @if (isset($readonly))
                                            <div class="col-md-1">
                                                <a href="{{ route('occupants.edit', $occupants->id) }}"
                                                    class="btn btn-primary btn-block">Edit</a>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="{{ route('occupants.index') }}"
                                                    class="btn btn-secondary btn-block">Kembali</a>
                                            </div>
                                        @else
                                            <div class="col-md-1 m-2">
                                                <button class="btn btn-success" type="submit">Simpan</button>
                                            </div>
                                            <div class="col-md-1 m-2">
                                                <a href="{{ route('occupants.index') }}" class="btn btn-danger px-4"
                                                    type="button">Batal</a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
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

        function ageCount() {
            var birth_date = document.getElementById('birth_date').value;
            var today = new Date();
            var birthDate = new Date(birth_date);
            var age = today.getFullYear() - birthDate.getFullYear();
            var m = today.getMonth() - birthDate.getMonth();
            if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }
            document.getElementById('age').value = age;
        }
    </script>

</body>

</html>
