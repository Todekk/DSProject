<!DOCTYPE html>
<html>
<head>
<title>Register</title>
</head>
<body style="background-color: rgb(252, 252, 57);">
        <form method="POST" action="{{ route('register') }}">
        {{csrf_field() }}
            <div>
                <abel for="name" value="name" />
                <input id="name" class="block mt-1 w-full" type="text" name="name" value="{{old('name')}}" />
                @if ($errors->has('name'))
                 <span class="text-danger">{{ $errors->first('name')}}</span>
                @endif
            </div>

            <div class="mt-4">
                <label for="email" value="{{ __('Email') }}">
                <input id="email" class="block mt-1 w-full" type="email" name="email" value="{{old('email')}}" />
                @if ($errors->has('email'))
                 <span class="text-danger">{{ $errors->first('email')}}</span>
                @endif
            </div>

            <div class="mt-4">
                <label for="password" value="{{ __('Password') }}">
                <input id="password" class="block mt-1 w-full" type="password" name="password" />
                @if ($errors->has('password'))
                 <span class="text-danger">{{ $errors->first('password')}}</span>
                @endif
            </div>

            <div class="mt-4">
                <label for="password_confirmation" value="{{ __('Confirm Password') }}">
                <input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" />
                @if ($errors->has('password_confirmation'))
                 <span class="text-danger">{{ $errors->first('password_confirmation')}}</span>
                @endif
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <button class="ml-4">
                    {{ __('Register') }}
                </button>
            </div>
        </form>
        </body>
</html>