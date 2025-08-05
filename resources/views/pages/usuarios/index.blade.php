@extends('index')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h1">Usuários</h1>
</div>

<div>
    <form action="{{ route('usuarios.index') }}" method="GET">
        <input type="text" name="pesquisar" placeholder="Digite para buscar" />
        <button type="submit">Pesquisar</button>

        <a type="button" href="{{ route('usuarios.create.get') }}" class="btn btn-success float-end">
            Incluir
        </a>
    </form>

    <div class="table-responsive mt-4">
        @if ($findUser->isEmpty())
        <p>Não existe dados</p>
        @else
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>Permissão</th>
                    <th>Nome</th>                    
                    <th>E-mail</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($findUser as $user)
                <tr>
                    <td>{{ $user->permissao_do_usuario}}</td>
                    <td>{{ $user->name }}</td>                   
                    <td>{{ $user->email }}</td>
                    <td>
                        <form style="display: inline" action={{ route('usuarios.delete', $user->id) }} method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                Excluir
                            </button>
                        </form>
                        <form style="display: inline" action={{ route('usuarios.update.get', $user->id) }} method="POST">
                            @csrf
                            @method('GET')
                            <button type="submit" class="btn btn-primary btn-sm">
                                Alterar
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>
@endsection