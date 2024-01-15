<x-layout name="Login - Simple Blog Post">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Login to your account</h2>
    </div>

  <div class="mt-10 mb-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <form class="space-y-6" action="/login" method="POST">
        @csrf
        <x-form.text name="email" type="email" />
        <x-form.text name="password" type="password" />
        <x-form.btn text="Login" />
    </form>

    <p class="mt-10 text-center text-sm text-gray-500">
      Not a member?
      <a href="/register" class="font-semibold leading-6 text-blue-500 hover:text-blue-500">Register Now</a>
    </p>

  </div>
</x-layout>
