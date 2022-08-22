<!DOCTYPE html>
<html>
<head>
<title>Login</title>
</head>
<body style="background-color: rgb(51, 51, 51);">
<h1 style="text-align: center; color:white; background-color:rgb(32, 32, 32);">Забравена парола</h1>
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <div style="text-align: center;color:white;">
            {{ __('Напишете е-пощата на акаунта.') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block" style="text-align: center;">
                <x-jet-label for="email" style="color:white; text-align: center;" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div style="text-align: center;" >
                <button class="button">
                    {{ __('Върнете парола') }}
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