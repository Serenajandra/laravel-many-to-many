@extends('layouts.admin')
@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-success">
                @foreach ($errors->all() as $error)
                    <ul>
                        <li>{{ $error }}</li>
                    </ul>
                @endforeach
            </div>
        @endif
        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mt-4">
                <label for="title">Titolo</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
            </div>
            <div class="form-group mt-4">
                <label for="subject">Argomenti</label>
                <input type="text" name="subject" id="subject" class="form-control" value="{{ old('subject') }}">
            </div>
            <div class="form-group mt-4">
                <label for="presentation">Presentazione</label>
                <input type="text" name="presentation" id="presentation" class="form-control"
                    value="{{ old('presentation') }}">
            </div>
            <div class="form-group mt-4">
                <label for="type">Tipologia</label>
                <select name="type_id" id="type" class="form-select">
                    <option value="">Altra tipologia</option>

                    @foreach ($types as $type)
                        <option value="{{ $type->id }}">{{ $type->type }}</option>
                    @endforeach

                </select>
            </div>

            <div class="form-control">
                <p>Tecnologie</p>
                @foreach ($technologies as $technology)
                    <div class="form-check">
                        <input type="checkbox" name="technologies[]" id="technology-{{ $technology->id }}"
                            class="form-check-input" value="{{ $technology->id }}" @checked(in_array($technology->id, old('technologies', [])))>
                        <label for="technology-{{ $technology->id }}"
                            class="form-check-label">{{ $technology->name }}</label>
                    </div>
                @endforeach
            </div>

            <div class="form-group mt-4">
                <label for="image">Immagine</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>
            <div class="form-group">
                <label for="content">Contenuto</label>
                <textarea name="content" id="content" rows="10" class="form-control" value="{{ old('title') }}"></textarea>
            </div>
            <button class="btn btn-success" type="submit">Salva</button>
        </form>
    </div>
@endsection
