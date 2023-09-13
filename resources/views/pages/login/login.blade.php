<!DOCTYPE html>
<html lang="en">

<head>
    <title>Teste C&F</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">
        @include('components.navbar')
        @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
        <div class="row justify-content-center align-items-center">

            <div class="col-md-5">
                <h2>Login</h2>
                <form method="POST" action="{{ route('login.user') }}">
                    @csrf
                    <div class="form-group">
                        <label >Email</label>
                        <input name="email" type="email" class="form-control"  placeholder="name@example.com">
                    </div>
                    <div class="form-group">
                        <label>Senha</label>
                        <input name="password" type="password" class="form-control" placeholder="Senha">
                    </div>

                    <button type="submit" class="btn btn-primary">Entrar</button>
                </form>
            </div>

            <div class="col-md-2"></div>

            <div class="col-md-5">
                <h2>Criar Conta</h2>
                <form method="POST" action="{{ route('create.user') }}">
                    @csrf
                    <div class="form-group">
                        <label >Nome</label>
                        <input name="name" type="text" class="form-control" placeholder="Nome">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input name="email" type="email" class="form-control" placeholder="name@example.com">
                    </div>
                    <div class="form-group">
                        <label>Senha</label>
                        <input name="password"  type="password" class="form-control"  placeholder="Senha">
                    </div>

                    <button type="submit" class="btn btn-primary">Criar</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
