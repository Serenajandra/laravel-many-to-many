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
            <div class="form-group">
                <label for="subject">Argomenti</label>
                <input type="text" name="subject" id="subject" class="form-control" value="{{ $project->subject }}">
            </div>
            <div class="form-group">
                <label for="presentation">Presentazione</label>
                <input type="text" name="presentation" id="presentation" class="form-control"
                    value="{{ $project->presentation }}">
            </div>
            <div class="form-group">
                <label for="content">Contenuto</label>
                <textarea name="content" id="content" rows="10" class="form-control">{{ $project->content }}</textarea>
            </div>
            <button class="btn btn-success" type="submit">Salva</button>
        </form>
    </div>
@endsection
