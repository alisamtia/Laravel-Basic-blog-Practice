<x-layout name="Register - Simple Blog Post">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Register your account</h2>
    </div>

  <div class="mt-10 mb-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <form class="space-y-6" action="/register" method="POST" enctype='multipart/form-data'>
        @csrf
        <x-form.text name="username" type="username" />
        <x-form.text name="avatar" type="file" />
        <x-form.text name="email" type="email" />
        <x-form.text name="password" type="password" />
        <x-form.btn text="Register" />
    </form>

    <p class="mt-10 text-center text-sm text-gray-500">
      Already a member?
      <a href="/login" class="font-semibold leading-6 text-blue-500 hover:text-blue-500">Login Now</a>
    </p>

  </div>
</x-layout>
