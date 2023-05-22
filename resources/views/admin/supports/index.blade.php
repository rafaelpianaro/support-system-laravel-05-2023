@extends('admin.layouts.app')

@section('title', 'Suportes')

@section('header')
    @include('admin.supports.partials.header')
@endsection

@section('content')

<a href="{{ route('supports.create') }}"> Criar Dúvida</a>

{{-- {{ $supports->path() }} --}}
{{-- https://laravel.com/docs/10.x/pagination#customizing-the-pagination-view --}}

@include('admin.supports.partials.content')

<x-pagination :paginator="$supports" :appends="$filters" />

@endsection