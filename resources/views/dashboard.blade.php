<x-app-layout>
    <div class="login100-form validate-form txt1">
        <h1 class="login100-form-title p-b-34 p-t-27">
            {{ __('Personal area') }}
        </h1>
        @php
            $user = auth()->user();
        @endphp
        Username: {{ $user->username }} <br>
        E-mail: {{ $user->email }} <br>
        Join date: {{ $user->joindate }} <br>
        Last login: {{ $user->last_login }} <br>
        Last ip: {{ $user->last_ip }} <br>
    </div>
</x-app-layout>
