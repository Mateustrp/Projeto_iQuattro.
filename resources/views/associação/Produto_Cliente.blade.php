@extends('layout')

@section('content')
    <h1>Associar Produtos para </h1>

    <form action="{{ route('clientes.associar', $cliente->codigo) }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Selecione os Produtos:</label>
            <div>
                @foreach($produtosDisponiveis as $produto)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="produtos[]" id="produto_{{ $produto->codigo }}" value="{{ $produto->codigo }}">
                        <label class="form-check-label" for="produto_{{ $produto->codigo }}">
                            {{ $produto->descricao }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>
        <button type="submit">Associar Produtos</button>
    </form>
@endsection


