@csrf
@if(isset($id))
    <input type="hidden" name="id" value="{{ $id }}">
@endif
<div class="container">
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">Perfil:</label>
        <div class="col-md-6">
            <select class="form-control" name="role_id">
                @foreach ($roles as $item)
                    <option value="{{ $item->id }}" @if(isset($data) && $data->roles[0]->id == $item->id) selected @endif>{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">Nome:</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ isset($data) ? $data->name : '' }}" required autocomplete="name" autofocus>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="email" class="col-md-4 col-form-label text-md-right">Email:</label>

        <div class="col-md-6">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ isset($data) ? $data->email : '' }}" required autocomplete="email">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label text-md-right">Senha:</label>

        <div class="col-md-6">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">
            Confirmar Senha:</label>

        <div class="col-md-6">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
        </div>
    </div> 
    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4  ">
            <button type="submit" class="btn btn-primary float-right">
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
@section('js')
    <script>
    </script>
@endsection