<!DOCTYPE html>
<html lang="pt-br">
<head><meta charset="utf-8"><title>Novo Produto</title></head>
<body>
    <h1>Novo Produto</h1>

    @if($errors->any())
        <ul style="color:red">
            @foreach($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('produtos.store') }}" method="POST">
        @csrf
        <p>Nome: <input type="text" name="nome" value="{{ old('nome') }}"></p>
        <p>Preço: <input type="text" name="preco" value="{{ old('preco') }}"></p>
        <p>Quantidade: <input type="number" name="quantidade" value="{{ old('quantidade') }}"></p>
        <button type="submit">Salvar</button>
    </form>
    <a href="{{ route('produtos.index') }}">Voltar</a>
</body>
</html>