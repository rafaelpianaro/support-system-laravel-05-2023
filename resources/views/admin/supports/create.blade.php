<h1>Novo Suporte</h1>

<form action="{{ route('supports.store') }}" method="post" enctype="multipart/form" name="">
    @csrf()
    <input type="text" name="subject" placeholder="Assunto">
    <textarea name="body" cols="30" rows="5" placeholder="Descrição"></textarea>
    <button type="submit">Enviar</button>
</form>