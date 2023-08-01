<!DOCTYPE html>
<html lang="en">

@include('include.header')

<body class="g-sidenav-show   bg-gray-100">
    <div class="min-height-300 bg-primary position-absolute w-100"></div>
    @include('include.sidebar')
    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        @include('include.navbar')
        <!-- End Navbar -->
        <div class="container-fluid py-4 mt-4">
            <div class="row mx-6">
                <div class="col-lg-12">

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Penghuni</li>
                        </ol>
                    </nav>

                </div>
                {{-- <div class="col-lg-3">

                </div> --}}
                <div class="col-lg-12">
                    <div class="card shadow-sm rounded-md">
                        <div class="card-header">
                            <h4 class="text-center">Penghuni Kontrakan Makmur</h4>
                            <hr class="border">
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="datatable" class="table table-striped table-bordered rounded">
                                    <a type="button" href="{{ url('occupants/create') }}"
                                        class="btn btn-primary">Tambah
                                        Penghuni</a>
                                    <thead>
                                        <tr>
                                            <th>No. Reg</th>
                                            <th>Nama</th>
                                            <th>Nomor Kependudukan</th>
                                            <th>No. Telp</th>
                                            <th>Status Tinggal</th>
                                            <th>Keteragan Lahir</th>
                                            <th>Pengaturan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($occupants as $item)
                                            <tr>
                                                <td>{{ $item->registration_number }}</td>
                                                <td>{{ $item->name }}</td>
                                                <th>{{ $item->nik }}</th>
                                                <th>{{ $item->phone_number }}</th>
                                                <td class="text-center">
                                                    @if ($item->status_tinggal == 'Tetap')
                                                        <span
                                                            class="badge rounded-pill bg-info text-white">{{ $item->status_tinggal }}</span>
                                                    @else
                                                        <span
                                                            class="badge rounded-pill bg-warning text-white">{{ $item->status_tinggal }}</span>
                                                    @endif
                                                </td>
                                                <td>{{ $item->birth_place }},
                                                    {{ date('d M Y', strtotime($item->birth_date)) }}
                                                </td>
                                                <td class="text-center">
                                                    {{-- detail pelayanan --}}
                                                    {{-- <a href="{{ route('pela.pasien', $item->id) }}"
                                                        class="mx-1"><i class="fa fa-heartbeat text-success text-md"
                                                            aria-hidden="true"></i></a> --}}
                                                    <a href="{{ route('occupants.show', $item->id) }}"
                                                        class="mx-1"><i
                                                            class="fa fa-address-card text-primary text-md"
                                                            aria-hidden="true"></i></a>
                                                    <a href="{{ route('occupants.edit', $item->id) }}"
                                                        class="mx-1"><i class="fa fa-pencil text-warning text-md"
                                                            aria-hidden="true"></i></a>
                                                    {{-- hapus pasien di laravel --}}
                                                    <form action="{{ url('occupants/' . $item->id) }}" method="post"
                                                        class="d-inline">
                                                        @method('delete')
                                                        @csrf
                                                        <button type="submit" class="btn btn-link p-0 m-0"
                                                            data-confirm="Anda yakin ingin menghapus data ini?"><i
                                                                class="fa fa-trash-o text-danger text-md"
                                                                aria-hidden="true"></i></button>
                                                    </form>
                                                    {{-- antrian  --}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            @include('include.delete')
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
    </script>
    {{-- <script>
        $(document).ready(function() {
            var table = $('#datatable').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'colvis']
            });

            table.buttons().container()
                .appendTo('#datatable_wrapper .col-md-6:eq(0)');
        });
    </script> --}}
    <script>
        const deleteButtons = document.querySelectorAll('[data-confirm]');

        deleteButtons.forEach(button => {
            button.addEventListener('click', (event) => {
                const confirmation = button.getAttribute('data-confirm');
                if (!confirm(confirmation)) {
                    event.preventDefault();
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
        });
    </script>

</body>

</html>
