@extends('adminlte::page')

@section('title', 'Visualizador de Chamado')

@section('content_header')
  <h1></h1>
@stop

@section('content')
  <div class="card card-info">
    <div class="card-header">
      <h3 class="card-title">Chamado de Nº {{ isset($data) ? $data->id : ""}}</h3>
    </div>
    <form class="form-horizontal" id="form" action="{{ route('called.finish') }}" method="POST">      
      @include('called::form', ['show' => true])
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

@section('js')
  <script>
    function verification(){
      var url = "https://run.mocky.io/v3/b6d946aa-e84e-45c4-af4e-a56f46465576";
      var xhttp = new XMLHttpRequest();        
      xhttp.open("GET", url, true);
      xhttp.onreadystatechange = function() {
      if (xhttp.readyState == 4) {
        if (xhttp.status = 200){
          var response = JSON.parse(this.responseText);
            if(response.response == 'Autorizado'){
              document.getElementById('form').submit()
            } else {
              alert('não autorizado')
            }
          }              
        }
      }
      xhttp.send();
    }
  </script>
@endsection