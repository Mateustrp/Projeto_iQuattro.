@extends('layout')

@section('content')
<div class="container">
    <h1>Associação de Produtos</h1>

    <form action="{{ route('produtos.associar.salvar', ['codigo' => $produto->codigo]) }}" method="POST">
        @csrf
    
        <h2>Selecione os Clientes:</h2>
        @foreach ($clientes as $cliente)
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="cliente_codigo[]" value="{{ $cliente->codigo }}" id="cliente_{{ $cliente->codigo }}">
                <label class="form-check-label" for="cliente_{{ $cliente->codigo }}">
                    {{ $cliente->nome }} ({{ $cliente->codigo }})
                </label>
            </div>
        @endforeach
        
        <button type="submit" class="btn btn-primary">Associar Produto</button>
    </form>    

    <h2>Clientes Cadastrados</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Código</th>
                <th>Nome</th>
                <th>Tipo de Pessoa</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->codigo }}</td>
                    <td>{{ $cliente->nome }}</td>
                    <td>{{ $cliente->pessoa }}</td>
                    <td>
                        <a href="{{ route('clientes.vizualiza', ['cliente' => $cliente->codigo]) }}" class="btn btn-info">Visualizar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
