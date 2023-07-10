@extends('admin.layouts.base')

@section('contents')
@php
//dd($projects);
@endphp
    <h1>Projects</h1>

    @if (session('delete_success'))
        @php $project = session('delete_success') @endphp
        <div class="alert alert-danger">
            Project "{{ $project->title }}" was deleted.
            {{-- <form
                action="{{ route("admin.posts.restore", ['post' => $post]) }}"
                    method="post"
                    class="d-inline-block"
                >
                @csrf
                <button class="btn btn-warning">Ripristina</button>
            </form> --}}
        </div>
    @endif

    {{-- @if (session('restore_success'))
        @php $post = session('restore_success') @endphp
        <div class="alert alert-success">
            La post "{{ $post->title }}" è stata ripristinata
        </div>
    @endif --}}

    <table class="table table-bordered table-hover table-rounded">
        <thead>
        <tr>
            <th class="col">Title</th>
            <th class="col">Programming Languages</th>
            <th class="col">Frameworks</th>
            <th class="col-2">Description</th>
            <th class="col">Project URL</th>
        </tr>
        </thead>
        <tbody>
        @foreach($projects as $project)
            <tr>
                <td>{{ $project->title }}</td>
                <td>
                    {{ $project->programmingLanguages->pluck('programming_language')->implode(', ') }}
                </td>
                <td>
                    @foreach($project->frameworks as $framework)
                        {{ $framework->framework }}<br>
                    @endforeach
                </td>
                <td>{{ $project->description }}</td>
                <td><a href="{{ $project->project_url }}" target="_blank">Show on GitHub</a></td>
                <!--    CRUD ACTIONS     -->
                <td>
                    <a href="{{ route('admin.projects.show', ['project' => $project->id]) }}" class="btn btn-success btn-sm fs-6">View</a>
                    <a href="{{ route('admin.projects.edit', ['project' => $project->id]) }}" class="btn btn-primary btn-sm fs-6">Edit</a>
                    <button type="button" class="btn btn-danger js-delete" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{ $project->id }}">
                        Delete
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="deleteModalLabel">Delete confirmation</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <form
                        action=""
                        data-template="{{ route('admin.projects.destroy', ['project' => '*****']) }}"
                        method="post"
                        class="d-inline-block"
                        id="confirm-delete"
                    >
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger">Yes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{ $projects->links() }}

@endsection
