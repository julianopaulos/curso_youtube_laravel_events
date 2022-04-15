@extends('layouts.main')

@section('title', 'Editando '.$event->title)

@section('content')
    <div id="event-create-container" class="col-md-6 offset-md-3">
        <h1>Editando {{$event->title}}</h1>
        <form action="/events/update/{{$event->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="image">Imagem do evento:</label>
                <input type="file" id="image" name="image" class="form-control-file">
                <img src="/img/events/{{ $event->image }}" alt="{{ $event->title }}" class="img-preview">
            </div>
            <div class="form-group">
                <label for="title">Evento:</label>
                <input type="text" class="form-control" placeholder="Nome do evento" id="title" name="title" value="{{ $event->title }}">
            </div>
            <div class="form-group">
                <label for="date">Data do evento:</label>   
                <input type="date" id="date" name="date" class="form-control" value="{{ $event->date->format('Y-m-d') }}" />
            </div>
            <div class="form-group">
                <label for="city">Cidade:</label>
                <input type="text" class="form-control" placeholder="Local do evento" id="city" name="city" value="{{ $event->city }}">
            </div>
            <div class="form-group">
                <label for="private">O evento é privado?</label>
                <select name="private" id="private" class="form-control">
                    <option value="0">Não</option>
                    <option value="1" {{ $event->private == 1 ? 'selected' : '' }}>Sim</option>
                </select>
            </div>
            <div class="form-group">
                <label for="description">Evento:</label>
                <textarea name="description" id="description" class="form-control" placeholder="O que vai acontecer no evento?">
                    {{ $event->description }}
                </textarea>
            </div>
            <div class="form-group">
                <label for="items">Adicione itens de infraestrutura:</label>
                <div class="form-group">
                    <input type="checkbox" name="items[]" id="items" value="Cadeiras"> Cadeiras
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" id="items" value="Palco"> Palco
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" id="items" value="Cerveja grátis"> Cerveja grátis
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" id="items" value="Open food"> Open food
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" id="items" value="Brindes"> Brindes
                </div>
            </div>
            <input type="submit" value="Editar evento" class="btn btn-primary">
        </form>
    </div>
@endsection