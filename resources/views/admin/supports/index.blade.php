<h1>listagem dos suportes</h1>

<a href="{{ route('supports.create') }}"> Criar Dúvida</a>

{{-- {{ $supports->path() }} --}}
{{-- https://laravel.com/docs/10.x/pagination#customizing-the-pagination-view --}}

<table>
    <thead>
        <tr>
            <th>assunto</th>
            <th>status</th>
            <th>descrição</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($supports->items() as $support)
            <tr>
                <td>{{ $support->subject }}</td>
                {{-- <td>{{ $support->status }}</td> --}}
                <td>{{ getStatusSupport($support->status) }}</td>
                <td>{{ $support->body }}</td>
                <td><a href="{{ route('supports.show', $support->id) }}">Visualizar</a></td>
                <td><a href="{{ route('supports.edit', $support->id) }}">Editar</a></td>
            </tr>
        @endforeach
    </tbody>
</table>

<x-pagination :paginator="$supports" :appends="$filters" />

