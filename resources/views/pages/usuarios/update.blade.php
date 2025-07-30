@extends ('index')
 
@section('content')
 
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h1">Alteração de Contatos</h1>
</div>
 
<form class="form" action="{{ route('contatos.update.put', $findContatos->id) }}" method="POST">
    @method('PUT')
    @csrf

    <div class="mb-3">
        <label class="form-label">Nome</label>
        <input value="{{ $findContatos->nome}}" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome">
    @if ($errors->has('nome'))
    <div class="invalid-feedback">O campo nome é obrigatório</div>
    @endif
    </div>
 
    <div class="mb-3">
        <label class="form-label" >Telefone</label>
        <input value="{{ $findContatos->numero}}"  type="text" id="telefoneMask" class="form-control @error ('numero') is-invalid @enderror"  name="numero" placeholder="(00) 00000-0000" >
     @if ($errors->has('numero'))
    <div class="invalid-feedback">O campo telefone é obrigatório</div>
    @endif
    </div>
 
    <div class="mb-3">
        <label class="form-label ">E-mail</label>
        <input value="{{ $findContatos->email}}" type="text" class="form-control @error ('email') is-invalid @enderror" name="email" placeholder="exemplo@email.com">
    @if ($errors->has('numero'))
    <div class="invalid-feedback">O campo e-mail é obrigatório</div>
    @endif
    </div>
 
    <button type="submit" class="btn btn-success">Alterar</button>
</form>
 
@endsection