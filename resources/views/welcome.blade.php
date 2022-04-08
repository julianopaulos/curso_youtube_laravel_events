@extends('layouts.main')

@section('title', 'HDC Events')

@section('content')
    {{-- esse é um comentário do blade --}}
    <!--<img src="/img/banner.jpg"/>-->
    <div id="search-container" class="col-md-12">
        <h1>Busque um evento</h1>
        <form action="">
            <input type="text" id="search" name="search" placeholder="Procurar..." class="form-control">
        </form>
    </div>
    <div id="events-container" class="col-md-12">
        <h2>Próximos eventos</h2>
        <p class="subtitle">Veja os eventos dos próximos dias</p>
        <div id="cards-container" class="row">
            @foreach ($events as $event)
                <div class="card col-md-3">
                    <img src="/img/event_placeholder.jpg" alt="{{ $event->title}}">
                    <div class="card-body">
                        <p class="card-date">{{ date_format($event->created_at, "d/m/Y") }}</p>
                        <h5 class="card-title">{{ $event->title}}</h5>
                        <p class="card-participants">X participantes</p>
                        <a href="#" class="btn btn-primary">Saber mais</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection