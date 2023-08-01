<!DOCTYPE html>
<html lang="en">

@include('include.header')

<body class="">
    @include('sweetalert::alert')
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
            </div>
        </div>
    </div>
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 d-flex justify-content-center">
                            <div class="card  pt-3">
                                <div class="justify-content-center d-flex">
                                    <img src="{{ asset('assets/img/rumah.png') }}" style="width: 100px; height: 100px;"
                                        alt="">
                                </div>
                                <div class="d-flex justify-content-center">
                                    <span class="text-sm font-weight-bolder">Management Kontrakan</span>
                                </div>
                                <div class="card-header pb-0 text-start">
                                    <h4 class="font-weight-bolder">Login</h4>
                                    <p class="mb-0">Enter your username and password to Login</p>
                                </div>
                                <div class="card-body">
                                    <form role="form" method="POST" action="{{ route('login') }}"
                                        autocomplete="off">
                                        @csrf
                                        <div class="mb-3">
                                            <input type="text" class="form-control form-control-lg"
                                                placeholder="email" aria-label="Email" name="email" required>
                                        </div>
                                        <div class="mb-3 input-group">
                                            <input type="password" class="form-control form-control-lg"
                                                placeholder="Password" id="show" aria-label="Password"
                                                name="password" required>
                                            <button class="btn btn-outline-dark mb-0" type="button"
                                                onclick="myFunction()"><i class="fa fa-eye"
                                                    aria-hidden="true"></i></button>
                                        </div>
                                        {{-- <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="rememberMe">
                                            <label class="form-check-label" for="rememberMe">Remember me</label>
                                        </div> --}}
                                        <div class="text-center">
                                            <button type="submit"
                                                class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Sign in</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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
    <!-- show password -->
    <script>
        function myFunction() {
            var x = document.getElementById("show");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</body>

</html>
