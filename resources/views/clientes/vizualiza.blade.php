@extends('layout')

@section('content')
    <h1>Visualização de Cliente: {{ $cliente->nome }}</h1>

    <div class="mt-3">
        <p><strong>Código:</strong> {{ $cliente->codigo }}</p>
        <p><strong>Nome:</strong> {{ $cliente->nome }}</p>
        <p><strong>Data de Nascimento:</strong> {{ $cliente->data_nascimento }}</p>
        <p><strong>Tipo de Pessoa:</strong> {{ $cliente->tipo_pessoa }}</p>
        <p><strong>CPF/CNPJ:</strong> {{ $cliente->cnpj }}</p>
    </div>

    <h2>Produtos Associados</h2>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Código do Produto</th>
                <th>Descrição</th>
                <th>Preço</th>
                <th>Imposto (%)</th>
                <th>Valor do Imposto</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cliente->produtos as $produto) 
                <tr>
                    <td>{{ $produto->codigo }}</td>
                    <td>{{ $produto->descricao }}</td>
                    <td>{{ number_format($produto->preco, 2, ',', '.') }}</td>
                    <td>{{ $produto->imposto }}</td>
                    <td>{{ number_format($produto->preco * $produto->imposto / 100, 2, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    
    <a href="{{ route('clientes.index') }}" class="btn btn-secondary mt-3">Voltar para a Lista de Clientes</a>
@endsection
