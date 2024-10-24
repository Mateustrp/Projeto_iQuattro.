@extends('layout')

@section('content')
    <h1>Criar Novo Cliente</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('clientes.store') }}" method="POST">
        @csrf
        @include('form_cliente') 
        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
@endsection
