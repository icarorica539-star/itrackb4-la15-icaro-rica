@extends('layouts.app')

@section('title', 'Add Subject')

@section('content')

<div class="container py-5">

    <div class="card shadow-sm">

        <div class="card-header bg-dark text-white">
            <h2 class="mb-0">Add Subject</h2>
        </div>

        <div class="card-body">

            {{-- VALIDATION ERRORS --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Please correct the following errors:</strong>

                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- ADD SUBJECT FORM --}}
            <form action="{{ route('subjects.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Code</label>
                    <input type="text"
                           name="code"
                           class="form-control"
                           value="{{ old('code') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text"
                           name="title"
                           class="form-control"
                           value="{{ old('title') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Units</label>
                    <input type="number"
                           name="units"
                           class="form-control"
                           value="{{ old('units') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Active</label>
                    <select name="is_active" class="form-select">
                        <option value="">Select...</option>
                        <option value="1" @selected(old('is_active') === '1')>Yes</option>
                        <option value="0" @selected(old('is_active') === '0')>No</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Prerequisite</label>
                    <select name="prerequisite_id" class="form-select">
                        <option value="">Select...</option>

                        @foreach ($prerequisites as $prerequisite)
                            <option value="{{ $prerequisite->id }}"
                                @selected(old('prerequisite_id') == $prerequisite->id)>
                                {{ $prerequisite->name }}
                            </option>
                        @endforeach

                    </select>
                </div>

                <button type="submit" class="btn btn-primary">
                    Save
                </button>

                <a href="{{ route('subjects.index') }}"
                   class="btn btn-outline-dark">
                    Cancel
                </a>

            </form>

        </div>
    </div>

</div>

@endsection
