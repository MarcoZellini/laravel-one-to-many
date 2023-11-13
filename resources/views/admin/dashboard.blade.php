@extends('layouts.admin')

@section('content')
    <div class="container-md dashboard">
        <h2 class="fs-4 text-secondary my-4 text-capitalize">
            {{ __(Request::segment(2)) }}
        </h2>
        <div class="row justify-content-center g-4">

            <h5 class="text-muted">Review</h5>
            <div class="col-12 col-md-6">
                <div class="card">
                    <h6 class="card-header text-uppercase">Projects</h6>
                    <div class="card-body">
                        <strong>Projects Counter:</strong> {{ $total_projects }}
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="card">
                    <h6 class="card-header text-uppercase">User Counter</h6>
                    <div class="card-body">
                        <strong>Projects Counter:</strong> {{ $total_users }}
                    </div>
                </div>
            </div>

            <h5 class="text-muted">Last Projects</h5>

            @foreach ($last_projects as $project)
                <div class="col-12 col-lg-4 mb-3">
                    <a class="text-decoration-none" href="{{ route('admin.projects.show', $project) }}">
                        <div class="card h-100">
                            <div class="card-header h-100 flex-grow-1 d-flex flex-column justify-content-between">
                                <h3 class="fw-bold">{{ $project->title }}</h3>
                                <p>Project Number: # {{ $project->id }}</p>
                            </div>

                            <div>
                                @if (str_contains($project->cover_image, 'http'))
                                    <img class="img-fluid card-img-bottom last_project_image"
                                        src="{{ asset($project->cover_image) }}" alt="">
                                @else
                                    <img class="img-fluid card-img-bottom last_project_image"
                                        src="{{ asset('storage/' . $project->cover_image) }}" alt="">
                                @endif
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach

        </div>
    </div>
@endsection
