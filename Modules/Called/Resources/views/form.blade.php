@csrf
@if(isset($id))
    <input type="hidden" name="id" value="{{ $id }}">
@endif
<div class="container">    
    <div class="form-group row" id="user_id">
        <label for="name" class="col-md-4 col-form-label text-md-right">Cliente:</label>    
        <div class="col-md-6">
            <input id="user_id" type="text" class="form-control @error('user_id') is-invalid @enderror" name="user_id" value="{{ isset($data) ? $data->user->name : auth()->user()->name }}" required disabled>    
            @error('user_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="form-group row" id="description">
        <label for="description" class="col-md-4 col-form-label text-md-right">Descrição:</label>    
        <div class="col-md-6">
            <textarea name="description" class="form-control @error('description') is-invalid @enderror" required autofocus rows="5" @if(isset($show) && $show == true) disabled @endif>{{ isset($data) ? $data->description : '' }}</textarea>   
            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    @if (isset($show) && $show == true || isset($edit) && $edit == true)
        <div class="form-group row" id="solution">
            <label for="solution" class="col-md-4 col-form-label text-md-right">Solução:</label>    
            <div class="col-md-6">
                <textarea name="solution" class="form-control @error('solution') is-invalid @enderror" required autofocus rows="5" @if(isset($data) && $data->status == 'Atendido') disabled @endif>{{ isset($data) ? $data->solution : '' }}</textarea>   
                @error('solution')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        @if(isset($data) && $data->status == 'Aguardando atendimento' && !isset($edit))
        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4  ">
                <button type="button" onclick="javascript: verification()" class="btn btn-primary float-right">
                    Fechar Chamado
                </button>
            </div>
        </div>
        @endif
        
        @if (isset($data) && $data->status == 'Atendido')
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <a href="{{ route('called.index') }}" class="btn btn-primary float-right">Voltar</a>
                </div>
            </div>            
        @endif       
    @endif     
    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4  ">
            <button type="button" onclick="javascript: verification()" class="btn btn-primary float-right" @if(isset($show) && $show == true) hidden @endif>
                Salvar
            </button>
        </div>
    </div>
</div>

@section('css')
    <style>
        .container{
            margin-top:30px;
        }
    </style>    
@endsection
