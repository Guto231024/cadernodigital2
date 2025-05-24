@extends('adminlte::page')

@section('title', 'Perfil do Usuário')

@section('content_header')
    <h1>Perfil do Usuário</h1>
@stop

@section('content')
    <p>Bem-vindo ao seu perfil, {{ auth()->user()->name }}!</p>
@stop
