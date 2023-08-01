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
                            <li class="breadcrumb-item active" aria-current="page">User Manage</li>
                        </ol>
                    </nav>

                </div>
                <div class="col-lg-3">

                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body shadow-sm rounded">
                            <div class="table-responsive">
                                <table id="datatable" class="table table-striped table-bordered rounded">
                                    <div class="col-md-2">
                                        <a type="button" href=" {{ url('manage/create') }}"
                                            class="btn btn-primary w-100">Tambah Admin</a>
                                    </div>
                                    </form>
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Role</th>
                                            <th>Pengaturan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->role }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('manage.edit', $user->id) }}" class="mx-1"><i
                                                            class="fa fa-pencil text-primary text-md"
                                                            aria-hidden="true"></i></a>
                                                    {{-- hapus pasien di laravel --}}
                                                    <form action="{{ url('manage/' . $user->id) }}" method="post"
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
</body>

</html>
