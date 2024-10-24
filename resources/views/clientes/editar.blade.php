@extends('layout')

@section('content')
<div class="container">
    <h1>Editar Cliente</h1>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('clientes.update', $cliente->codigo) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="codigo">Código</label>
            <input type="text" name="codigo" id="codigo" class="form-control" value="{{ $cliente->codigo }}" required readonly>
        </div>

        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" value="{{ $cliente->nome }}" required>
        </div>

        <div class="form-group">
            <label for="pessoa">Tipo de Pessoa</label>
            <select name="pessoa" id="pessoa" class="form-control" required>
                <option value="F" {{ $cliente->tipo_pessoa == 'F' ? 'selected' : '' }}>Física</option>
                <option value="J" {{ $cliente->tipo_pessoa == 'J' ? 'selected' : '' }}>Jurídica</option>
                <option value="O" {{ $cliente->tipo_pessoa == 'O' ? 'selected' : '' }}>Outros</option>
            </select>
        </div>

        <div class="form-group">
            <label for="cpf_cnpj">CPF/CNPJ</label>
            <input type="text" name="cpf_cnpj" id="cpf_cnpj" class="form-control" value="{{ $cliente->cpf_cnpj }}" required>
        </div>

        <div class="form-group">
            <label for="estado">Estado</label>
            <input type="text" name="estado" id="estado" class="form-control" value="{{ $cliente->estado }}" required>
        </div>

        <div class="form-group">
            <label for="data_nascimento">Data de Nascimento</label>
            <input type="date" name="data_nascimento" id="data_nascimento" class="form-control" value="{{ $cliente->data_nascimento }}" required>
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
</div>
@endsection
