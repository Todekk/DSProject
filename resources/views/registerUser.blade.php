<!DOCTYPE html>
<html>
<head>
<title>Register</title>
</head>
<body>
    <h1> Hello </h1>
    <form method="post" action="/registeruser">
        {{csrf_field() }}
        Потребителско име: <input type="text" name="username" value="{{old('username')}}">
        @if ($errors->has('username'))
            <span class="text-danger">{{ $errors->first('username')}}</span>
        @endif
         <br>
        Е-поща:<input type="text" name="email" value="{{old('email')}}">
        @if ($errors->has('email'))
            <span class="text-danger">{{ $errors->first('email') }}</span>
        @endif
        <br>
        Парола:<input type="password" name="password">
        @if ($errors->has('password'))
            <span class="text-danger">{{ $errors->first('password') }}</span>
        @endif
        <br>
        Повторете парола:<input type="password" name="password2">
        @if ($errors->has('password2'))
            <span class="text-danger">{{ $errors->first('password2') }}</span>
        @endif
        <br>
        <input type="submit" value="Регистрация"><br>
    </form>
</body>
</html>