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
                            <li class="breadcrumb-item active" aria-current="page">Pelayanan</li>
                        </ol>
                    </nav>

                </div>
                <div class="col-lg-3">

                </div>
                <div class="col-lg-12">
                    <div class="card shadow-sm rounded-md">
                        <div class="card-header">
                            @if (empty($occupants))
                                <h4 class="text-center">Pelayanan Rumah Kontrakan</h4>
                            @else
                                <h4 class="text-center">Pelayanan Rumah Kontrakan {{ $occupants->name }}</h4>
                            @endif
                            <hr class="border">
                        </div>
                        <div class="card-body ">
                            <div class="table-responsive">
                                <table id="datatable" class="table table-striped table-bordered rounded">
                                    @if (empty($occupants))
                                        <a type="button" href="{{ route('pelayanan.create') }}"
                                            class="btn btn-primary">Tambah
                                            Pelayanan</a>
                                    @endif
                                    <thead>
                                        <tr>
                                            <th>No. Registrasi</th>
                                            <th>Nama</th>
                                            <th>Status Rumah</th>
                                            <th>Payment Keamanan</th>
                                            <th>Payment Kebersihan</th>
                                            <th>Informasi </th>
                                            <th>Tanggal Masuk</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($services as $item)
                                            <tr>
                                                <td>{{ $item->occupant->registration_number }}</td>
                                                <td>{{ $item->occupant->name }}</td>
                                                <td class="text-center">
                                                    @if ($item->status == 'Ditempati')
                                                        <span
                                                            class="badge rounded-pill bg-info text-white">{{ $item->status }}</span>
                                                    @else
                                                        <span
                                                            class="badge rounded-pill bg-warning text-white">{{ $item->status }}</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if ($item->keamanan == 'Lunas')
                                                        <span
                                                            class="badge rounded-pill bg-success text-white">{{ $item->keamanan }}</span>
                                                    @else
                                                        <span
                                                            class="badge rounded-pill bg-danger text-white">{{ $item->keamanan }}</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if ($item->kebersihan == 'Lunas')
                                                        <span
                                                            class="badge rounded-pill bg-success text-white">{{ $item->kebersihan }}</span>
                                                    @else
                                                        <span
                                                            class="badge rounded-pill bg-danger text-white">{{ $item->kebersihan }}</span>
                                                    @endif
                                                </td>
                                                <td>{{ $item->information }}</td>
                                                <td>{{ date('d M Y', strtotime($item->date_of_entry)) }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('pelayanan.show', $item->id) }}"
                                                        class="mx-1"><i
                                                            class="fa fa-address-card text-primary text-md"
                                                            aria-hidden="true"></i></a>
                                                    <a href="{{ route('pelayanan.edit', $item->id) }}"
                                                        class="mx-1"><i class="fa fa-pencil text-warning text-md"
                                                            aria-hidden="true"></i></a>
                                                    {{-- hapus pelayanan di laravel --}}
                                                    <form action="{{ url('pelayanan/' . $item->id) }}" method="post"
                                                        class="d-inline">
                                                        @method('delete')
                                                        @csrf
                                                        <button type="submit" class="btn btn-link p-0 m-0"
                                                            data-confirm="Anda yakin ingin menghapus data ini?"><i
                                                                class="fa fa-trash-o text-danger text-md"
                                                                aria-hidden="true"></i></button>
                                                    </form>
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
        $(document).ready(function() {
            $('#datatable').DataTable();
        });
    </script>
</body>

</html>
