<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">    
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="login-container">
        <div class="login card">
            <form  method="POST" action="{{ route('login') }}">
                @csrf
                <div>
                    <label for="email" >E-mail</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                        <h4>{{ $errors->first('email') }}</h4>
                    @endif
                </div>

                <div>
                    <label for="password">Senha</label>
                    <input id="password" type="password" name="password" required>
                    @if ($errors->has('password'))
                        <h4>{{ $errors->first('password') }}</h4>
                    @endif
                </div>
                <button type="submit">
                    Login
                </button>
            </form>
        </div>
    </div>
</body>
</html>
