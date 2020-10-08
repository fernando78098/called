@extends('adminlte::page')

@section('title', 'Cadastro de Usuarios')

@section('content_header')
  <h1>Cadastro de Usuarios</h1>
@stop

@section('content')
  <div class="card card-info">
    <div class="card-header">
      <h3 class="card-title">Cadastro de Usuarios</h3>
    </div>
    <form class="form-horizontal" action="{{ route('user.store') }}" method="POST">     
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