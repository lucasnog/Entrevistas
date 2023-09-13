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
        <form method="POST" action="{{ route('create.frases') }}" >
            @csrf

            <h4>Cria Nova Frase</h4>
            <div class="form-group">
                <label>Categoria</label>
                <select name="category_id" class="form-control" >
                    @foreach ($findCategory as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label >Frase</label>
                <textarea class="form-control" name="text" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Criar</button>
            <a href="/frases" class="btn btn-danger">Cancelar</a>



        </form>
    </div>


</div>
</body>
</html>
