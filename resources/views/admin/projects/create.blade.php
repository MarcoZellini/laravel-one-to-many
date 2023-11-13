@extends('layouts.admin')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li><strong>Error! </strong> {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="my-5">

        @csrf

        <h2 class="mb-4">Add New Project</h2>

        <div class="mb-4">
            <label for="title" class="form-label">Add Title</label>
            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
                placeholder="Insert project title" aria-describedby="helpId" value="{{ old('title') }}">
        </div>
        <div class="mb-4">
            <label for="cover_image" class="form-label">Add Image</label>
            <input type="file" name="cover_image" id="cover_image"
                class="form-control @error('cover_image') is-invalid @enderror" placeholder="Insert project image"
                aria-describedby="helpId">
        </div>
        <div class="mb-4">
            <label for="website_link" class="form-label">Add Website Link</label>
            <input type="url" name="website_link" id="website_link"
                class="form-control @error('website_link') is-invalid @enderror" placeholder="Insert project website link"
                aria-describedby="helpId" value="{{ old('website_link') }}">
        </div>
        <div class="mb-4">
            <label for="github_link" class="form-label">Add GitHub Link</label>
            <input type="url" name="github_link" id="github_link"
                class="form-control @error('github_link') is-invalid @enderror" placeholder="Insert project GitHub link"
                aria-describedby="helpId" value="{{ old('github_link') }}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label @error('description') is-invalid @enderror">Add
                Description</label>
            <textarea class="form-control" name="description" id="description" rows="5"
                placeholder="Insert project description">{{ old('descritpion') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Create New Project</button>

    </form>
@endsection
