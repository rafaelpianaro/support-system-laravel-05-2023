<h1>listagem dos suportes</h1>

<a href="{{ route('supports.create') }}"> Criar Dúvida</a>

{{-- {{ $supports->path() }} --}}

<table>
    <thead>
        <tr>
            <th>assunto</th>
            <th>status</th>
            <th>descrição</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($supports as $support)
            <tr>
                <td>{{ $support['subject'] }}</td>
                <td>{{ $support['status'] }}</td>
                <td>{{ $support['body'] }}</td>
                <td><a href="{{ route('supports.show', $support['id']) }}">Visualizar</a></td>
                <td><a href="{{ route('supports.edit', $support['id']) }}">Editar</a></td>
            </tr>
        @endforeach
    </tbody>
</table>

