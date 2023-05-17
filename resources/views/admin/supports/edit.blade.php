<h1>Suporte {{ $support->id }}</h1>

<x-alert/>

<form action="{{ route('supports.update', $support->id) }}" method="post">
    @method('put')
    @include('admin.supports.partials.form', [
        'support' => $support
    ])
</form>