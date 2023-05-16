<h1>Detalhes do suporte {{ $support->id }}</h1>

<ul>
    <li>Assunto: {{ $support->subject }}</li>
    <li>Status: {{ $support->status }}</li>
    <li>Descrição: {{ $support->body }}</li>
</ul>

<form action="{{ route('supports.destroy', $support->id) }}" method="post" name=""">
    @csrf()
    @method('delete')
    <button type="submit">Deletar</button>
</form>