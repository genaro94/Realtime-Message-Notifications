@extends('layouts.app')

@section('content')

<form action="{{route('message.submit')}}" method="post" class="container">
    {{ csrf_field() }}
    <input type="text" name="title" class="form-control" placeholder="Digite o titulo">
    <textarea name="body"class="form-control" placeholder="Digite a messagem" ></textarea>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>

@endsection
