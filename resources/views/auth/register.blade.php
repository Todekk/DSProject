<!DOCTYPE html>
<html>
<head>
<title>Register</title>
</head>
<body style="background-color: rgb(51, 51, 51);">
<h1 style="text-align: center; color:white; background-color:rgb(32, 32, 32);">Регистрация</h1>
        <form method="POST" action="{{ route('register') }}">
        {{csrf_field() }}
            <div style="text-align: center;">
                <abel for="name" value="name" />
                <input id="name" class="block mt-1 w-full" type="text" name="name" placeholder="Име" value="{{old('name')}}" />
                @if ($errors->has('name'))
                 <span class="text-danger">{{ $errors->first('name')}}</span>
                @endif
            </div>

            <div style="text-align: center;">
                <label for="email" value="{{ __('Email') }}">
                <input id="email" class="block mt-1 w-full" type="email" placeholder="E-Поща" name="email" value="{{old('email')}}" />
                @if ($errors->has('email'))
                 <span class="text-danger">{{ $errors->first('email')}}</span>
                @endif
            </div>

            <div style="text-align: center;">
                <label for="password" value="{{ __('Password') }}">
                <input id="password" class="block mt-1 w-full" placeholder="Парола" type="password" name="password" />
                @if ($errors->has('password'))
                 <span class="text-danger">{{ $errors->first('password')}}</span>
                @endif
            </div>

            <div style="text-align: center;">
                <label for="password_confirmation" value="{{ __('Confirm Password') }}">
                <input id="password_confirmation" class="block mt-1 w-full" placeholder="Повторете парола" type="password" name="password_confirmation" />
                @if ($errors->has('password_confirmation'))
                 <span class="text-danger">{{ $errors->first('password_confirmation')}}</span>
                @endif
            </div>

            <div style="text-align: center;">
                <a class="button" href="{{ route('login') }}">
                    {{ __('Вече сте регистрирани ?') }}
                </a>

                <button class="button">
                    {{ __('Регистрирай') }}
                </button>
            </div>
        </form>
        </body>

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
</html>