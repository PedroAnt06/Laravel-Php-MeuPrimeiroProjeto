<!DOCTYPE html>
<html lang="pt-br">
<head><meta charset="utf-8"><title>Editar Produto</title></head>
<body>
    <h1>Editar Produto</h1>

    @if($errors->any())
        <ul style="color:red">
            @foreach($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('produtos.update', $produto) }}" method="POST">
        @csrf
        @method('PUT')
        <p>Nome: <input type="text" name="nome" value="{{ old('nome', $produto->nome) }}"></p>
        <p>Preço: <input type="text" name="preco" value="{{ old('preco', $produto->preco) }}"></p>
        <p>Quantidade: <input type="number" name="quantidade" value="{{ old('quantidade', $produto->quantidade) }}"></p>
        <button type="submit">Atualizar</button>
    </form>
    <a href="{{ route('produtos.index') }}">Voltar</a>
</body>
</html>