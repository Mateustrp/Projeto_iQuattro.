@extends('layout')

@section('content')
    <h1>Lista de Produtos</h1>
    <a href="{{ route('produtos.incluir') }}" class="btn btn-primary">Adicionar Novo Produto</a>
    
    <br>
    <br>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Código</th>
                <th>Descrição</th>
                <th>Preço</th>
                <th>Imposto (%)</th>
                <th>Valor do Imposto</th>
                <th>Cliente Associado</th>
                <th>Ações</th> 
            </tr>
        </thead>
        <tbody>
            @foreach($produtos as $produto)
                <tr>
                    <td>{{ $produto->codigo }}</td>
                    <td>{{ $produto->descricao }}</td>
                    <td>{{ $produto->preco }}</td>
                    <td>{{ $produto->imposto }}</td>
                    <td>{{ $produto->valor_imposto }}</td>
                    <td>
                        @if($produto->clientes->isNotEmpty())
                            @foreach($produto->clientes as $cliente)
                                <p>{{ $cliente->nome }}</p> 
                            @endforeach
                        @else
                            Nenhum cliente associado
                        @endif
                    </td>
                    <td>
                        <div class="d-flex flex-column">
                            <a href="{{ route('produtos.vizualiza', $produto->codigo) }}" class="btn btn-info mb-1">Ver</a>
                            <a href="{{ route('produtos.editar', $produto->codigo) }}" class="btn btn-warning mb-1">Editar</a>
                            <form action="{{ route('produtos.delete', $produto->codigo) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger mb-1">Excluir</button>
                            </form>
                            <a href="{{ route('produtos.associar', $produto->codigo) }}" class="btn btn-success">Associar Cliente</a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $produtos->links() }}
@endsection
