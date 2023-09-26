{{-- <x-layout>

    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <h1 class="text-center font-bold text-xl">Login</h1>

            <form method="POST" action="/login/store" class="mt-10">
                @csrf

            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-x5 text-gray-700" for="email">
                  Email
                </label>

                <input type="email" class="border border-gray-400 p-2 w-full" name="email" id="email" value="{{ old('email') }}" required>

                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        
                    @enderror

            </div>

            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-x5 text-gray-700" for="password">
                  Password
                </label>

                <input type="password" class="border border-gray-400 p-2 w-full" name="password" id="password" required>

                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        
                    @enderror

            </div>

            <div class="mb-6">
                <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                Log in
                </button>

            </div>
            </form>
        </main>
    </section>
</x-layout> --}}

<x-layout>

    <section class="px-6 py-8">
        <div class="login-box text-center" style="margin-left:30rem;">
            <div class="login-logo">
                <a href="/login">Login</a>
            </div>
            <!-- /.login-logo -->
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Sign in to start your session</p>

                    <form action="/login/store" method="post">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" placeholder="Email" name="email" id="email"
                                value="{{ old('email') }}">

                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>

                            </div>

                        </div>
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="Password" name="password"
                                id="password">

                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        @error('password')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                        <div class="row">

                            <!-- /.col -->
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block">log In</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>

                    <div class="social-auth-links text-center mb-3">
                        <p>- OR -</p>
                        <a href="#" class="btn btn-block btn-primary">
                            <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                        </a>
                        <a href="#" class="btn btn-block btn-danger">
                            <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                        </a>
                    </div>

                    <p class="mb-0">
                        <a href="/register" class="text-center">Register</a>
                    </p>
                </div>
                <!-- /.login-card-body -->
            </div>
        </div>
        <!-- /.login-box -->

        <!-- jQuery -->
        <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>





    </section>
</x-layout>
