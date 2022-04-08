@extends('layouts.main')

@section('title', 'HDC Events')

@section('content')
    {{-- esse é um comentário do blade --}}
    @foreach ($events as $event)
        <p>{{ $event->title}} - {{ $event->description }}
        </p>
    @endforeach
    <!--<img src="/img/banner.jpg"/>-->
@endsection