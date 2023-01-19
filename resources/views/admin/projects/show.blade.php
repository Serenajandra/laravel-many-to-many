@extends('layouts.admin')
@section('content')
    <div class="container">
        <h2 class="text-center m-3">{{ $project->title }}</h2>
        <div>
            <h5>Tipo di progetto</h5>
            {{-- <p>{{ $project->type?->type }}</p> --}}
            <p>{{ $project->type ? $project->type : 'informazione mancante' }}</p>
        </div>
        <div>
            <h4 class="mt-3">Argomento trattato</h4>
            <p> {{ $project->subject }}</p>

        </div>
        <div>
            <h4 class="mt-3">Presentazione in breve</h4>
            <p> {{ $project->presentation }}</p>
        </div>
        {{-- <div>
            <h4 class="mt-3">Tecnologie</h4>
            <ul class="list-unstyled">
                @forelse ($project->technologies as $technology)
                    <li>{{ $technology->name }}</li>
                @empty
                    <li>Tecnologia non specificata
                    </li>
                @endforelse
            </ul>
        </div> --}}
        <h4>Contenuto</h4>
        <p>{{ $project->content }}</p>



        <a href="{{ route('admin.projects.index') }}">Torna alla lista dei progetti</a>

    </div>
@endsection
