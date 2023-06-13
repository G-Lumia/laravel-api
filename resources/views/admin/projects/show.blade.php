@extends('layouts.app')

@section('content')
<div class="d-flex flex-column align-items-center mt-5">
    <h1>{{ $project->name }}</h1>
    <img class="thumb" src="{{ $project->image }}" alt="{{ $project->name }}">
    <h4> Type : {{ $project->type ? $project->type->name : 'Typeless' }} </h4>
    @if ($project->technologies && count($project->technologies) > 0)
        <div>
            @foreach ($project->technologies as $technology)
                <a href="{{ route('admin.technologies.show', $technology->slug) }}">
                    <img class="tiny-icon" src="{{ url('/images/') }}/{{ $technology->image }}" alt="{{ $technology->name }}">
                </a>
            @endforeach
        </div>
    @endif
    <div class="mt-3">
        <a class="link" href="{!! $project->link !!}"> {!! $project->link !!} </a>
        <div class="d-flex gap-3 justify-content-center mt-3">
            <h4>
                Edit
            </h4>
            <a class="link" href="{{ route('admin.projects.edit', $project->slug) }}"><i class="fa-solid fa-pencil"></i></a>
        </div>
    </div>
</div>
@endsection
