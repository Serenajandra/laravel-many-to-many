@extends('layouts.admin')
@section('content')
    <div class="container">
        <h2 class=" border mt-3 text-center py-3">Lista dei progetti</h2>
        <div class="row justify-content-center col-10">
            <div class="text-end mx-4">
                <a class="btn btn-success" href="{{ route('admin.projects.create') }}">Nuovo
                    progetto</a>
            </div>
            <div class="mt-4">
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Titolo</th>
                            <th scope="col">Data di creazione</th>
                            <th scope="col">Argomenti</th>
                            <th scope="col">Anteprima</th>
                            <th scope="col">Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                            <tr>
                                <td scope="row">{{ $project->title }}</td>
                                <td>{{ $project->created_at }}</td>
                                <td>{{ $project->subject }}</td>
                                <td></td>
                                <td class="">
                                    <a class="btn btn-warning p-1"
                                        href="{{ route('admin.projects.show', $project->slug) }}">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a class="btn btn-primary p-1"
                                        href="{{ route('admin.projects.edit', $project->slug) }}"><i
                                            class="fa-solid fa-pen-to-square"></i></a>
                                    <form action="{{ route('admin.projects.destroy', $project->slug) }}" method="POST"
                                        class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger p-1" type="submit"><i
                                                class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
@endsection
