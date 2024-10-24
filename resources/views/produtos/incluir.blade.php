@extends('layout')

@section('content')
    <h1>Criar Novo Produto</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form action="{{ route('produtos.store') }}" method="POST">
        @csrf
        @include('form_produto') 
    </form>
@endsection
