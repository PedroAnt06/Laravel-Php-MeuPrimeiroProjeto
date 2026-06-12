<!DOCTYPE html>
<html lang="pt-br">
<head><meta charset="utf-8"><title>Produtos</title></head>
<body>
    @if(session('sucesso'))
        <p style="color:green">{{ session('sucesso') }}</p>
    @endif

    <h1>Produtos</h1>
    <a href="{{ route('produtos.create') }}">+ Novo produto</a>

    <table border="1" cellpadding="8">
        <tr><th>Nome</th><th>Preço</th><th>Qtd</th><th>Ações</th></tr>
        @foreach($produtos as $produto)
            <tr>
                <td>{{ $produto->nome }}</td>
                <td>R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                <td>{{ $produto->quantidade }}</td>
                <td>
                    <a href="{{ route('produtos.edit', $produto) }}">Editar</a>
                    <form action="{{ route('produtos.destroy', $produto) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Excluir</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>