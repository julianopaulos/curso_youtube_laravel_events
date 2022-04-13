@extends('layouts.main')

@section('title', 'HDC Events')

@section('content')
    {{-- esse é um comentário do blade --}}
    <!--<img src="/img/banner.jpg"/>-->
    <div id="search-container" class="col-md-12">
        <h1>Busque um evento</h1>
        <form action="/" method="get">
            <input type="text" id="search" value="{{ $search }}"name="search" placeholder="Procurar..." class="form-control">
        </form>
    </div>
    <div id="events-container" class="col-md-12">
        @if($search)
            <h2>Buscando por: {{ $search }}</h2>
        @else
            <h2>Próximos eventos</h2>
            <p class="subtitle">Veja os eventos dos próximos dias</p>
        @endif
        
        <div id="cards-container" class="row">
            @foreach ($events as $event)
                <div class="card col-md-3">
                    <img src="/img/events/{{ $event->image }}" alt="{{ $event->title}}">
                    <div class="card-body">
                        <p class="card-date">{{ date_format($event->date, "d/m/Y") }}</p>
                        <h5 class="card-title">{{ $event->title}}</h5>
                        <p class="card-participants">X participantes</p>
                        <a href="/events/{{ $event->id }}" class="btn btn-primary">Saber mais</a>
                    </div>
                </div>
            @endforeach
            @if(count($events) === 0 && $search)
                <p>Não foi possível encontrar um evento com {{ $search }}! <a href="/">Ver todos</a></p>
            @elseif(count($events) === 0)
                <p>Não há eventos disponíveis</p>
            @endif
        </div>
    </div>
@endsection