@extends('adminlte::page')

@section('title', 'Lista de Chamados')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><strong>Lista de Chamados</strong></h1>
            </div>
        </div>
    </div>  
@stop

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Lista de Chamados</h3>
                        </div>
                        <div class="card-body">
                            @if (isset($data) && $data->isNotEmpty())
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nome</th>
                                        <th>Status</th>
                                        <th>Data de Abertura</th>
                                        <th>Ação</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        
                                    @foreach($data as $item)
                                        <tr>
                                            <th>{{ $item->id }}</th>
                                            <th>{{ $item->user->name }}</th>
                                            <td>{{ $item->status }}</td>
                                            <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                                            <td>
                                                @can('view_called')
                                                    <a href="{{ route('called.show', $item->id) }}" class="btn btn-primary"> <i class="far fa-eye"></i> </a>
                                                @endcan
                                                @can('end_called')
                                                    @if($item->status == 'Aguardando atendimento')
                                                        <button type="button" class="btn btn-primary" onclick="javascript: verification()">Finalizar</button>
                                                    @endif                                                    
                                                @endcan
                                                @can('edit_called')
                                                    <a href="{{ route('called.edit', $item->id) }}" class="btn btn-primary"> <i class="fas fa-edit"></i> </a>
                                                @endcan
                                                @can('delete_called')                     
                                                    <form action="{{ route('called.destroy', $item->id) }}" method="POST" style="display: inline" >
                                                        @method('DELETE') 
                                                        @csrf
                                                        <button class="btn btn-danger">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                @endcan
                                            </td>
                                        </tr>                      
                                    @endforeach             
                                    </tbody>
                                </table>
                            @else
                                <div>
                                    <h5>Não existe Registro de Chamados</h5>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>     
    </section>
    
@endsection

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

