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
            @if(session('error'))
            <div class="alert alert-success">
                {{ session('error') }}
            </div>
            @endif
            <div class=" text-right">
                @if(Auth::user())
                <form method="GET" action="{{ route('create.index.frases') }}" >
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
                    <th scope="col">Mensagem</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            @foreach ($findQuote as $quote)

            <tbody>
                <tr>
                    <th scope="row">{{$quote->category->name}}</th>
                    <td>{{$quote->text}}</td>
                    <td>
                        @if (Auth::user())
                        <form method="POST" action="{{ route('delete.frases', ['id' => $quote->id])}}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Deletar</button>
                        </form>
                        @else
                        <form method="POST" action="{{ route('delete.frases', ['id' => $quote->id])}}">
                            @csrf
                            @method('DELETE')
                            <button disabled class="btn btn-danger">Deletar</button>
                        </form>
                        @endif
                    </td>
                </tr>
            </tbody>

            @endforeach

        </table>
        {{$findQuote->links()}}
    </div>
</div>
</body>
</html>


