<!DOCTYPE html>
<html lang="en">
<head>
  <title>Teste C&F</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
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


        <div class=" text-right">
            @if(Auth::user())
            <form method="GET" action="{{ route('create.index.categorias') }}" >
                @csrf
                <button type="submit" class="btn btn-primary">Criar</button>
            </form>
            @else
            <form method="GET" action="" >
                @csrf
                <a href="{{ route('index.user') }}" class="btn btn-primary">Faça login para Criar</a>
            </form>
            @endif
        </div>

    </div>

    <div class="row justify-content-center align-items-center">

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Categoria</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($findCategory as $category)
                <tr>
                    <td>

                        <a class="btn btn-link font-weight-bold text-dark " data-bs-toggle="collapse" href="#categoria{{$category->id}}">{{$category->name}} <button class="btn btn-link btn-sm">(Ver frases)</button></a>
                         <div id="categoria{{$category->id}}" class="collapse">
                             @foreach ($findQuote as $quote)
                                 @if ($quote->category_id == $category->id)
                                     <p>{{$quote->text}}</p>
                                @endif
                            @endforeach

                        </div>
                    </td>
                    <td>
                        @if (Auth::user())
                        <form method="POST" action="{{ route('delete.categorias', ['id' => $category->id])}}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Deletar</button>
                        </form>
                        @else
                        <form method="POST" action="{{ route('delete.categorias', ['id' => $category->id])}}">
                            @csrf
                            @method('DELETE')
                            <button disabled class="btn btn-danger">Deletar</button>
                        </form>
                        @endif

                    </td>
                </tr>
                @endforeach


            </tbody>



        </table>
    </div>
</div>
</body>
</html>
