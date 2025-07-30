@extends ('index')
 
@section('content')
 
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h1">Adicionar Contatos</h1>
</div>
 
<form class="form" action="{{ route('contatos.create.post') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label class="form-label">Nome</label>
        <input type="text" class="form-control @error('nome') is-invalid @enderror" name="nome">
    @if ($errors->has('nome'))
    <div class="invalid-feedback">O campo nome é obrigatório</div>
    @endif
    </div>
 
    <div class="mb-3">
        <label class="form-label @error ('numero') is-invalid @enderror">Telefone</label>
        <input type="text" id="telefoneMask" class="form-control" name="numero" placeholder="(00) 00000-0000" >
     @if ($errors->has('numero'))
    <div class="invalid-feedback">O campo telefone é obrigatório, ex: (00) 00000-0000</div>
    @endif
    </div>
 
    <div class="mb-3">
        <label class="form-label @error ('email') is-invalid @enderror">E-mail</label>
        <input type="text" class="form-control" name="email" placeholder="exemplo@email.com">
    @if ($errors->has('numero'))
    <div class="invalid-feedback">O campo e-mail é obrigatório</div>
    @endif
    </div>
 
    <button type="submit" class="btn btn-success">Salvar</button>
</form>
 
@endsection