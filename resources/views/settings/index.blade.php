@extends('adminlte::page')

@section('title', 'Lista de Usuarios')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><strong>Lista de Usuarios</strong></h1>
            </div>
            <div class="col-sm-6">
                <a href="{{ route('user.create') }}" class="btn btn-info float-sm-right"><i class="fas fa-users"></i>  Cadastrar Novo Usuario</a>
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
                            <h3 class="card-title">Lista de Usuarios</h3>
                        </div>
                        <div class="card-body">
                            @if (isset($data) && $data->isNotEmpty())
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nome</th>
                                        <th>Email</th>
                                        <th>Profile</th>
                                        <th>Ação</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $item)
                                        <tr>
                                        <th>{{ $item->id }}</th>
                                        <th>{{ $item->name }}</th>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->roles[0]->name }}</td>
                                        <td>
                                            <a href="{{ route('user.edit', $item->id) }}" class="btn btn-primary"> <i class="fas fa-edit"></i> </a>                      
                                            <form action="{{ route('user.destroy', $item->id) }}" method="POST" style="display: inline" >
                                            @method('DELETE') 
                                            @csrf
                                            <button class="btn btn-danger">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                            </form> 
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
    </script>      
  @endsection

