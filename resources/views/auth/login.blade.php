<!DOCTYPE html>
<html>
<head>
<title>Login</title>
</head>
<body style="background-color: rgb(252, 252, 57);">

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <label for="email" value="{{ __('Email') }}">
                <input id="email" class="block mt-1 w-full" type="email" name="email"/>
            </div>

            <div class="mt-4">
                <label for="password" value="{{ __('Password') }}">
                <input id="password" class="block mt-1 w-full" type="password" name="password" autocomplete="current-password" />
            </div>
            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <button class="ml-4">
                    {{ __('Log in') }}
                </button>
            </div>
        </form>
        </body>
</html>