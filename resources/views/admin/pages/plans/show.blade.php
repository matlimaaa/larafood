@extends('adminlte::page')

@section('title', 'Detalhes do Plano')

@section('content_header')
    <h1>Detalhes do Plano <b>{{ $plan->name }} </b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">Filters</div>
        <div class="card-body">
            <ul>
                <li>Nome: {{ $plan->name }}</li>
                <li>URL:  {{ $plan->url }}</li>
                <li>Preço:  <strong>R$ {{ number_format($plan->price, 2, ',', '.') }}</strong></li>
                <li>Descrição:  {{ $plan->description }}</li>
            </ul>

            @include('admin.includes.alerts')

            <form action="{{ route('plans.destroy', $plan->url) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Deletar plano</button>
            </form>
        </div>
    </div>
@stop