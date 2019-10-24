<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">    
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="login card">
            <form  method="POST" action="{{ route('login') }}">
                @csrf
                <div>
                    <label for="email" >E-mail</label>
                    <br>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                    <br>
                    @if ($errors->has('email'))
                        <h3>{{ $errors->first('email') }}</h3>
                    @endif
                </div>

                <div>
                    <label for="password">Senha</label>
                    <br>
                    <input id="password" type="password" name="password" required>
                    <br>
                    @if ($errors->has('password'))
                        <h3>{{ $errors->first('password') }}</h3>
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
