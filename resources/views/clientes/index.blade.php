@extends('layout')

@section('content')
    <h1>Listagem de Clientes</h1>
    <a href="{{ route('clientes.incluir') }}" class="btn btn-primary">Adicionar Novo Cliente</a>

    <br><br>

    <table class="table">
        <thead>
            <tr>
                <th>Código</th>
                <th>Nome</th>
                <th>Pessoa</th>
                <th>CNPJ/CPF</th>
                <th>Estado</th>
                <th>Data de Nascimento</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $cliente) 
                <tr>
                    <td>{{ $cliente->codigo }}</td>
                    <td>{{ $cliente->nome }}</td>
                    <td>{{ $cliente->pessoa }}</td> 
                    <td>{{ $cliente->cnpj ?? $cliente->cpf }}</td>
                    <td>{{ $cliente->estado }}</td> 
                    <td>{{ $cliente->data_nascimento }}</td> 
                    <td>
                        <a href="{{ route('clientes.vizualiza', $cliente->codigo) }}" class="btn btn-info">Visualizar</a>
                        <a href="{{ route('clientes.editar', $cliente->codigo) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('clientes.delete', $cliente->codigo) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>
                        <a href="{{ route('clientes.associar', $cliente->codigo) }}" class="btn btn-success">Associar Produtos</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $clientes->links() }} 
@endsection
