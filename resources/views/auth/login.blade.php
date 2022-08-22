<!DOCTYPE html>
<html>
<head>
<title>Login</title>
</head>
<body style="background-color: rgb(51, 51, 51);">
<h1 style="text-align: center; color:white; background-color:rgb(32, 32, 32);">Влизане</h1>
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div style="text-align: center;">
                <label for="email" value="{{ __('Email') }}">
                <input id="email" class="block mt-1 w-full" type="email" name="email"/>
            </div>

            <div style="text-align: center;">
                <label for="password" value="{{ __('Password') }}">
                <input id="password" class="block mt-1 w-full" type="password" name="password" autocomplete="current-password" />
            </div>
            <div style="text-align: center;">
                @if (Route::has('password.request'))
                    <a class="button" href="{{ route('password.request') }}">
                        {{ __('Забравихте си паролата ?') }}
                    </a>
                @endif

                <button class="button">
                    {{ __('Влизане') }}
                </button>
            </div>
        </form>
        <style>
            .button{
                margin-top: 5px;
                margin-right: 5px;
                text-decoration: none;
                text-align: center;
                border: 3px;
                background-color: rgb(18, 122, 240);
                padding: 14px 25px;
                font-weight: bold;
                border-radius: 10px;
                font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            }
        </style>
        </body>
</html>