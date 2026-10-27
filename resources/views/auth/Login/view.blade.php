<x-layout>

  <h1 class="my-16 text-center text-4xl font-medium text-slate-600">
   Login
  </h1>

  <x-card class="py-8 px-16">

    <form action="{{ route('login.post') }}" method="POST">
      @csrf

      <div class="mb-8">
        <label for="email"
          class="mb-2 block text-sm font-medium text-slate-900">E-mail</label>
        <x-text-input name="email" />
      </div>

      <div class="mb-8">
        <label for="password" class="mb-2 block text-sm font-medium text-slate-900">
          Password
        </label>
        <x-text-input name="password" type="password" />
      </div>

     
      <x-button class="w-full bg-green-50">Login</x-button>

    </form>
  </x-card>

</x-layout>