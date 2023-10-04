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



    <div class="container vh-100">
        @include('components.navbar')
        <div class="row justify-content-center align-items-center">

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('create.categorias') }}" >
            @csrf
            <h4>Cria Nova Categoria</h4>
            <div class="form-group">
                <label >Nome</label>
                <input type="text" class="form-control"  name="name" placeholder="Nova categoria">
            </div>

            <button type="submit" class="btn btn-primary">Criar</button>
            <button class="btn btn-danger">Cancelar</button>
        </form>
    </div>


</div>
</body>
</html>
