@extends('adminlte::page')

@section('title', 'Editar Usuario')

@section('content_header')
  <h1>Editar Usuario</h1>
@stop

@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Editar Usuario</h3>
        </div>
        <form class="form-horizontal" action="{{ route('user.update') }}" method="POST">
            @method('PUT')      
            @include('settings.form')
        </form>
    </div>  
@stop

@section('footer')
    <div class="float-right d-none d-sm-block">
      <b>Versão</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2020-2030 <a href="#">Gestão de Chamados</a>.</strong> Todos os direitos
    reservado.  
@endsection

@section('css')
@stop

@section('js')
@stop