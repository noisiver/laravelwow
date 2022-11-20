<x-app-layout>
    <form class="login100-form validate-form" method="POST">
        @csrf

        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        @if(session()->has('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
        @endif

        <h1 class="login100-form-title p-b-34 p-t-27">
            {{ __('Login form') }}
        </h1>

        <!-- Username Address -->
        <div class="wrap-input100 validate-input">

            <x-text-input id="text" type="username" name="username" :value="old('username')" placeholder="Username" />
            <span class="focus-input100" data-placeholder="&#xf159;"></span>

            @error('username')
            <span class="validateError">{{ $message }}</span>
            @enderror
        </div>

        <!-- Password -->
        <div class="wrap-input100 validate-input">

            <x-text-input id="password"
                          type="password"
                          name="password"
                          placeholder="Password"
                          :value="old('password')"
                          autocomplete="new-password" />
            <span class="focus-input100" data-placeholder="&#xf191;"></span>

            @error('password')
            <span class="validateError">{{ $message }}</span>
            @enderror

        </div>

        <div class="container-login100-form-btn">
            <x-primary-button class="login100-form-btn">
                {{ __('Login') }}
            </x-primary-button>
        </div>

    </form>
</x-app-layout>
