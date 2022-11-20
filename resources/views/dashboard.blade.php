<x-app-layout>
    <div class="login100-form validate-form txt1">
        <h1 class="login100-form-title p-b-34 p-t-27">
            {{ __('Personal area') }}
        </h1>
        @php
            $user = auth()->user();
        @endphp
        <div class="container-custom">
            <p class="text-white">
                Username: <span class="ml-4 txt2">{{ $user->username }}</span>
            </p>
            <p class="text-white">
                E-mail: <span class="ml-4 txt2">{{ $user->email }}</span>
            </p>
            <p class="text-white">
                Join date: <span class="ml-4 txt2">{{ $user->joindate }}</span>
            </p>
            <p class="text-white">
                Last login: <span class="ml-4 txt2">{{ $user->last_login }}</span>
            </p>
            <p class="text-white">
                Last ip: <span class="ml-4 txt2">{{ $user->last_ip }}</span>
            </p>
        </div>

        <div class="container-login100-form-btn mt-2">
            <a href="{{ route('logout') }}" class="login100-form-btn">
                {{ __('Logout') }}
            </a>
        </div>
    </div>
</x-app-layout>
