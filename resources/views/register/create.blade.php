{{-- <x-layout>

    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <h1 class="text-center font-bold text-xl">Register</h1>
            <form method="POST" action="/register/store" class="mt-10">
                @csrf
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-x5 text-gray-700" for="name">
                      Name
                    </label>
    
                    <input type="text" class="border border-gray-400 p-2 w-full" name="name" id="name" value="{{ old('name') }}" required>

                    @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        
                    @enderror
    
                </div>

            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-x5 text-gray-700" for="username">
                  Username
                </label>

                <input type="text" class="border border-gray-400 p-2 w-full" name="username" id="username" value="{{ old('username') }}" required>

                @error('username')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        
                    @enderror

            </div>

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
                Submit
                </button>

            </div>
            </form>
        </main>

    </section>
</x-layout> --}}

<x-layout>

    <section class="px-6 py-8">

        <div class="register-box" style="margin-left:30rem;">
            <div class="register-logo">
                <a href="/register">Register</a>
            </div>

            <div class="card">
                <div class="card-body register-card-body">
                    <p class="login-box-msg">Register</p>

                    <form action="/register/store" method="post">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Full name" name="name"
                                id="name" value="{{ old('name') }}">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror

                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="User name" name="username"
                                id="username" value="{{ old('username') }}">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>

                        @error('username')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror

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
                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>

                    <div class="social-auth-links text-center">
                        <p>- OR -</p>
                        <a href="#" class="btn btn-block btn-primary">
                            <i class="fab fa-facebook mr-2"></i>
                            Sign up using Facebook
                        </a>
                        <a href="#" class="btn btn-block btn-danger">
                            <i class="fab fa-google-plus mr-2"></i>
                            Sign up using Google+
                        </a>
                    </div>

                    <a href="/login" class="text-center">I already have a account</a>
                </div>
                <!-- /.form-box -->
            </div><!-- /.card -->
        </div>

    </section>
</x-layout>
