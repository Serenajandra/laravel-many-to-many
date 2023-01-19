@extends('layouts.admin')
@section('content')
    <div class="container">
        <h2>Modifica il progetto</h2>
        @if ($errors->any())
            <div class="alert alert-success">
                @foreach ($errors->all() as $error)
                    <ul>
                        <li>{{ $error }}</li>
                    </ul>
                @endforeach
            </div>
        @endif
        <form action="{{ route('admin.projects.update', $project->slug) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-goup">
                <label for="title">Titolo</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $project->title }}">
            </div>
            <div class="mb-3">
                <label for="type">Tipologia</label>
                <select name="type_id" id="type" class="form-select">
                    <option value="">Seleziona</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" @selected(old('type_id', $project->type_id) == $type->id)>{{ $type->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="subject">Argomento trattato</label>
                <input type="text" name="subject" id="subject" class="form-control" value="{{ $project->subject }}">
            </div>
            <div class="form-group">
                <label for="presentation">Presentazione in breve</label>
                <input type="text" name="presentation" id="presentation" class="form-control"
                    value="{{ $project->presentation }}">
            </div>
            <div class="form-group mt-3">
                <h4>Tecnologie usate</h4>
                {{-- @foreach ($technologies as $technology)
                    <div class="form-check">
                        <input class="form-check-input" id="{{ $technology->id }}" name="technologies[]" type="checkbox"
                            value="{{ $technology->id }}" @checked($errors->any() ? in_array($technology->id, old('technologies', [])) : $project->technologies->contains($technology))>

                            @checked($project->technologies->contains($technology))>
                        <label for="{{ $technology->id }}" class="form-check-label">{{ $technology->name }}</label>
                    </div>
                @endforeach --}}

            </div>
            <div class="form-group">
                <label for="content">Contenuto</label>
                <textarea name="content" id="content" rows="10" class="form-control">{{ $project->content }}</textarea>
            </div>
            <button class="btn btn-success" type="submit">Salva</button>
        </form>
    </div>
@endsection
