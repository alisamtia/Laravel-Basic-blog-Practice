<x-layout name="Register"  meta_description="Register to the our website by using this You can participate in Comments by Creating an account">
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
                                    <h4>Create Account</h4>
                                    <p class="text-muted mb-4 mt-3">Get started with your free account</p>
                                </div>
                                <form class="space-y-6" action="{{route('register.store')}}" method="POST" enctype='multipart/form-data'>
                                  @csrf
                                  <x-form.text name="username" type="username" />
                                  <x-form.text name="avatar" type="file" />
                                  <x-form.text name="email" type="email" />
                                  <x-form.text name="password" type="password" />
                                  <x-form.btn>Create Account</x-form.btn>
                                </form>
                                <div class="text-center">
                                </div>
                            </div>
                            <!-- end card-body -->
                        </div>
                        <!-- end card -->
                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p class="text-muted">Have an account? <a href="{{ route('login.index') }}" class="text-primary font-weight-medium ml-1">Login</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</main>
</x-layout>
