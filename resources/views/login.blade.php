<x-layout name="Login" meta_description="Login to the our website by using this You can participate in Comments by Logging in">
  <main role="main">
        <div class="account-pages mt-7 mb-5 ">
            <div class="container">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="text-center w-75 m-auto">
                                    <a href="{{ route('index') }}">
                                        <span><img src="{{asset('assets/images/logo-dark.png')}}" alt="" height="22"></span>
                                    </a>
                                    <p class="text-muted mb-4 mt-3">Enter your email address and password to access admin panel.</p>
                                </div>
                                <form action="{{route('login.index')}}" method="POST">
                                    @csrf
                                    <x-form.text type="email" name="email" />
                                    <x-form.text type="password" name="password" />
                                    <div class="form-group mb-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="checkbox-signin" checked="">
                                            <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                                        </div>
                                    </div>
                                    <x-form.btn>Log In</x-form.btn>
                                </form>
                                <div class="text-center">
                                </div>
                            </div>
                            <!-- end card-body -->
                        </div>
                        <!-- end card -->
                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p> <a href="pages-recoverpw.html" class="text-muted ml-1">Forgot your password?</a></p>
                                <p class="text-muted">Don't have an account? <a href="{{ route('register.index') }}" class="text-primary font-weight-medium ml-1">Sign Up</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</main>
</x-layout>
