@extends('layout')

@section('content')
    <h1>Detalhes do Produto</h1>

    <p><strong>Código:</strong> {{ $produto->codigo }}</p>
    <p><strong>Descrição:</strong> {{ $produto->descricao }}</p>
    <p><strong>Preço:</strong> R$ {{ number_format($produto->preco, 2, ',', '.') }}</p>
    <p><strong>Imposto (%):</strong> {{ $produto->imposto }}</p>
    
    <h3>Clientes Associados</h3>
    
    @if($produto->clientes->isNotEmpty())
        <ul>
            @foreach($produto->clientes as $cliente)
                <li>{{ $cliente->nome }} - {{ $cliente->cnpj}}</li>
            @endforeach
        </ul>
    @else
        <p>Nenhum cliente associado a este produto.</p>
    @endif

    <a href="{{ route('produtos.index') }}" class="btn btn-secondary">Voltar</a>
@endsection
