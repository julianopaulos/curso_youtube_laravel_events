@extends('layouts.main')

@section('title', 'HDC Events')

@section('content')
    <div id="event-create-container" class="col-md-6 offset-md-3">
        <h1>Crie o seu evento</h1>
        <form action="/events" method="POST">
            {{-- 
                Toda vez que você definir um formulário HTML "POST", "PUT", "PATCH", ou 
                "DELETE" na sua aplicação, você deve incluir um campo oculto CSRF _token
                no formulário então esse middleware de proteção CSRF poderá validar a requisição.
                Por conveniencia, você pode usar a diretiva Blade @csrf para gerar o campo oculto de token
            --}}
            @csrf
            <div class="form-group">
                <label for="title">Evento:</label>
                <input type="text" class="form-control" placeholder="Nome do evento" id="title" name="title">
            </div>
            <div class="form-group">
                <label for="city">Cidade:</label>
                <input type="text" class="form-control" placeholder="Local do evento" id="city" name="city">
            </div>
            <div class="form-group">
                <label for="private">O evento é privado?</label>
                <select name="private" id="private" class="form-control">
                    <option value="0">Não</option>
                    <option value="1">Sim</option>
                </select>
            </div>
            <div class="form-group">
                <label for="description">Evento:</label>
                <textarea name="description" id="description" class="form-control" placeholder="O que vai acontecer no evento?"></textarea>
            </div>
            <input type="submit" value="Criar evento" class="btn btn-primary">
        </form>
    </div>
@endsection