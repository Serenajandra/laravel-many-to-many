@extends('layouts.admin')
@section('content')
    <div class="container">
        <h2 class="text-center m-3">{{ $project->title }}</h2>
        <h5 class="text-center">{{ $project->type?->type }}</h5>
        <h4 class="mt-3">{{ $project->subject }}</h4>
        <p> {{ $project->presentation }}</p>
        <h5>Contenuto</h5>
        <p>{{ $project->content }}</p>
        <a href="{{ route('admin.projects.index') }}">Torna alla lista dei progetti</a>

    </div>
@endsection
