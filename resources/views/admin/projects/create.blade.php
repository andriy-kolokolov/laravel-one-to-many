@extends('admin.layouts.base')

@section('contents')
    <div class="container">
        <h2>Add New Project</h2>
        <form method="POST" action="{{ route('admin.projects.store') }}">
            @csrf
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="programming_languages">Programming Languages:</label>
                <input type="text" class="form-control" id="programming_languages" name="programming_languages" required>
            </div>
            <div class="form-group">
                <label for="frameworks">Frameworks:</label>
                <input type="text" class="form-control" id="frameworks" name="frameworks">
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
            </div>
            <div class="form-group">
                <label for="project_url">Project URL:</label>
                <input type="url" class="form-control" id="project_url" name="project_url" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Project</button>
        </form>
    </div>
@endsection
