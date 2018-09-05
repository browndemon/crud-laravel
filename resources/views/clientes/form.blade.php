@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
            @if(Request::is('*/editar'))
            <div class="panel-heading">Edite abaixo as informações do cliente
            @else
            <div class="panel-heading">Informe abaixo as informações do novo cliente
            @endif
                
                <a class="pull-right" href="{{ url('/clientes')}}">Clientes</a>
                </div>

                <div class="panel-body">
                @if(Session::has('mensagem_sucesso'))
                    <div class="alert alert-success">{{Session::get('mensagem_sucesso')}}</div>
                @endif
                @if(Request::is('*/editar'))
                    {!! Form::model($cliente, [ 'method'=>'PATCH', 'url' =>'clientes/'.$cliente->id]) !!}
                @else
                    {!!Form::open(['url' => 'clientes/cadastro-cliente']) !!}
                @endif
                   {!!Form::input('text', 'nome', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Nome'] ) !!}
                   
                   {!!Form::input('text', 'endereco', null, ['class' => 'form-control', '', 'placeholder' => 'Endereço'] ) !!}

                   {!!Form::input('number', 'numero', null, ['class' => 'form-control', '', 'placeholder' => 'Número'] ) !!}
                  
                   @if(Request::is('*/editar'))
                    {!!Form::submit('Editar', ['class' => 'btn btn-primary']) !!}
                   @else
                    {!!Form::submit('Cadastrar', ['class' => 'btn btn-primary']) !!}
                   @endif

                   {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection