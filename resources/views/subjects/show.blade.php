@extends('layouts.app')

@section('title', 'Subject Details')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Subject Details</h1>

        <a href="{{ route('subjects.index') }}" class="btn btn-secondary">
            Back to Subject List
        </a>
    </div>

    <div class="card shadow">
        <div class="card-header bg-dark text-white">
            Subject Information
        </div>

        <div class="card-body">
            <p>
                <strong>Subject Code:</strong>
                {{ $subject->code }}
            </p>

            <p>
                <strong>Subject Title:</strong>
                {{ $subject->title }}
            </p>

            <p>
                <strong>Units:</strong>
                {{ $subject->units }}
            </p>

            <p>
                <strong>Prerequisite:</strong>
                {{ $subject->prerequisite?->name ?? 'None' }}
            </p>

            <p>
                <strong>Status:</strong>
                @if ($subject->is_active)
                    <span class="badge bg-success">Active</span>
                @else
                    <span class="badge bg-danger">Inactive</span>
                @endif
            </p>
        </div>

        <div class="card-footer">
            <a href="{{ route('subjects.edit', $subject) }}"
               class="btn btn-primary">
                Edit Subject
            </a>

            <a href="{{ route('subjects.index') }}"
               class="btn btn-secondary">
                Back
            </a>
        </div>
    </div>
</div>
@endsection
