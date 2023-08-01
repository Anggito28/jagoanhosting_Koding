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
                action="{{ isset($service) ? route('pelayanan.update', $service->id) : route('pelayanan.store') }}"
                autocomplete="off">
                {!! csrf_field() !!}
                {!! isset($service) ? method_field('PUT') : '' !!}
                <div class="row mx-6">
                    <div class="col-lg-12">

                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                <li class="breadcrumb-item" aria-current="page"><a
                                        href="{{ url('pelayanan') }}">Pelayanan</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    @if (isset($readonly) && $readonly == true)
                                        Data Pelayanan Penghuni Rumah
                                    @elseif (isset($service))
                                        Form Ubah Data Pelayanan Penghuni Rumah
                                    @elseif (!isset($service))
                                        Form Tambah Pelayanan
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
                                        Data Pasien Pelayanan {{ $service->occupant->name }}
                                    @elseif (isset($service))
                                        Form Ubah Pelayanan {{ $service->occupant->name }}
                                    @elseif (!isset($service))
                                        Form Tambah Pelayanan
                                    @endif
                                </h4>
                                <hr class="border">
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-10"></div>
                                    <div class="col-md-12 mb-2">
                                        <label for="no_reg">Nama Penghuni</label>
                                        <select class="form-control select2" name="occupant_id" id="patient_id"
                                            {{ isset($readonly) ? 'disabled' : '' }}>
                                            <option value="umum" disabled>Pilih Nama Pasien</option>
                                            @foreach ($occupants as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ isset($service) && $service->occupant_id == $item->id ? 'selected' : '' }}
                                                    {{ isset($id) && $id == $item->id ? 'selected' : '' }}>
                                                    {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @if (isset($readonly))
                                        <div class="col-md-9 mb-2">
                                            <label for="no_reg">No. Registrasi</label>
                                            <input type="text" class="form-control" id="no_reg" name="no_reg"
                                                value="{{ isset($service) ? $service->occupants->registration_number : '' }}"
                                                disabled>
                                        </div>
                                    @endif
                                    <div class="col-md-6">
                                        <label for="house_number">Nomor Rumah</label>
                                        <input name="house_number" class="form-control" id="" required
                                            {{ isset($readonly) ? 'disabled' : '' }}
                                            value="{{ isset($service) ? $service->house_number : '' }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="name">Keamanan</label>
                                        <div>
                                            <select name="keamanan" id="keamanan" class="form-control">
                                                <option value="Lunas"
                                                    {{ isset($service) && $service->keamanan == 'Lunas' ? 'selected' : '' }}>
                                                    Lunas</option>
                                                <option value="Belum Lunas"
                                                    {{ isset($service) && $service->keamanan == 'Belum Lunas' ? 'selected' : '' }}>
                                                    Belum Lunas</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="name">Kebersihan</label>
                                        <div>
                                            <select name="kebersihan" id="kebersihan" class="form-control">
                                                <option value="Lunas"
                                                    {{ isset($service) && $service->kebersihan == 'Lunas' ? 'selected' : '' }}>
                                                    Lunas</option>
                                                <option value="Belum Lunas"
                                                    {{ isset($service) && $service->kebersihan == 'Belum Lunas' ? 'selected' : '' }}>
                                                    Belum Lunas</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="name">Tanggal Masuk</label>
                                        <input type="date" class="form-control" id="date_of_entry"
                                            name="date_of_entry" required
                                            value="{{ isset($service) ? $service->date_of_entry : '' }}"
                                            {{ isset($readonly) ? 'disabled' : '' }}>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label for="information">Status</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="Ditempati"
                                                {{ isset($service) && $service->kebersihan == 'Ditempati' ? 'selected' : '' }}>
                                                Ditempati</option>
                                            <option value="Kosong"
                                                {{ isset($service) && $service->kebersihan == 'Kosong' ? 'selected' : '' }}>
                                                Kosong</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label for="name">Status Pelunasan Keseluruhan</label>
                                        <select class="form-control" id="exampleFormControlSelect1" name="category_id"
                                            {{ isset($readonly) ? 'disabled' : '' }} onchange="rujukanForm(this)">
                                            <option value="" disabled selected>-Pilih Kategori-</option>
                                            @foreach ($categories as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ isset($service) && $service->category_id == $item->id ? 'selected' : '' }}
                                                    required>
                                                    {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <label for="information">Information</label>
                                        <input name="information" class="form-control" id="" required
                                            {{ isset($readonly) ? 'disabled' : '' }}
                                            value="{{ isset($service) ? $service->information : '' }}">
                                    </div>
                                    <div class="mt-3 row">
                                        @if (isset($readonly))
                                            <div class="col-md-1">
                                                <a href="{{ route('pelayanan.edit', $service->id) }}"
                                                    class="btn btn-primary btn-block">Edit</a>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="{{ route('pelayanan.index') }}"
                                                    class="btn btn-secondary btn-block">Kembali</a>
                                            </div>
                                        @else
                                            <div class="col-md-1 m-2">
                                                <button class="btn btn-success" type="submit">Simpan</button>
                                            </div>
                                            <div class="col-md-1 m-2">
                                                <a href="{{ route('pelayanan.index') }}" class="btn btn-danger px-4"
                                                    type="button">Batal</a>
                                            </div>
                                        @endif
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
        $(document).ready(function() {
            $('.select2').select2();
        });
        //hidden rujukanItem
    </script>

</body>

</html>
