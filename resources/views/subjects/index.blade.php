@extends('layouts.app')

@section('title', 'My Subjects')

@section('content')

<div class="container py-4">

    {{-- Page Heading --}}
    <div class="mb-4">
        <h2>My Subjects</h2>
        <p class="text-muted mb-0">Prepared by Rica Icaro</p>
    </div>

    {{-- Success Message --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Validation Errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Please fix the following errors:</strong>

            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Add Subject Button: Authenticated Users Only --}}
    @auth
        <div class="mb-3">
            <a href="{{ route('subjects.create') }}"
               class="btn btn-primary">
                + Add Subject
            </a>
        </div>
    @endauth

    {{-- Search, Filters, and Sorting --}}
    <div class="card mb-4">

        <div class="card-header">
            <strong>Search and Filter Subjects</strong>
        </div>

        <div class="card-body">

            <form method="GET" action="{{ route('subjects.index') }}">

                <div class="row g-3">

                    {{-- Search by Subject Code --}}
                    <div class="col-md-4">
                        <label for="code" class="form-label">
                            Subject Code
                        </label>

                        <input
                            type="text"
                            name="code"
                            id="code"
                            class="form-control"
                            placeholder="Enter subject code"
                            value="{{ request('code') }}"
                        >
                    </div>

                    {{-- Filter by Units --}}
                    <div class="col-md-4">
                        <label for="units" class="form-label">
                            Units
                        </label>

                        <select name="units"
                                id="units"
                                class="form-select">

                            <option value="">All Units</option>

                            <option value="2"
                                @selected(request('units') == '2')>
                                2 Units
                            </option>

                            <option value="3"
                                @selected(request('units') == '3')>
                                3 Units
                            </option>

                        </select>
                    </div>

                    {{-- Filter by Prerequisite --}}
                    <div class="col-md-4">
                        <label for="prerequisite_id" class="form-label">
                            Prerequisite
                        </label>

                        <select
                            name="prerequisite_id"
                            id="prerequisite_id"
                            class="form-select">

                            <option value="">All Prerequisites</option>

                            @foreach ($prerequisites as $prerequisite)
                                <option
                                    value="{{ $prerequisite->id }}"
                                    @selected(request('prerequisite_id') == $prerequisite->id)
                                >
                                    {{ $prerequisite->name }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    {{-- Filter by Active Status --}}
                    <div class="col-md-4">
                        <label for="is_active" class="form-label">
                            Status
                        </label>

                        <select
                            name="is_active"
                            id="is_active"
                            class="form-select">

                            <option value="">Any Status</option>

                            <option value="1"
                                @selected(request('is_active') === '1')>
                                Active
                            </option>

                            <option value="0"
                                @selected(request('is_active') === '0')>
                                Inactive
                            </option>

                        </select>
                    </div>

                    {{-- Sort Subjects --}}
                    <div class="col-md-4">
                        <label for="sort" class="form-label">
                            Sort By
                        </label>

                        <select name="sort"
                                id="sort"
                                class="form-select">

                            <option value="id"
                                @selected(request('sort', 'id') === 'id')>
                                Default
                            </option>

                            <option value="code"
                                @selected(request('sort') === 'code')>
                                Subject Code
                            </option>

                            <option value="title"
                                @selected(request('sort') === 'title')>
                                Subject Title
                            </option>

                        </select>
                    </div>

                </div>

                {{-- Apply and Clear Buttons --}}
                <div class="mt-3">

                    <button type="submit" class="btn btn-success">
                        Apply Filters
                    </button>

                    <a href="{{ route('subjects.index') }}"
                       class="btn btn-secondary">
                        Clear
                    </a>

                </div>

            </form>

        </div>
    </div>

    {{-- Subjects Table --}}
    <div class="card">

        <div class="card-header bg-dark text-white">
            <strong>Subject List</strong>
        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-striped table-hover">

                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Code</th>
                            <th>Title</th>
                            <th>Units</th>
                            <th>Prerequisite</th>

                            {{-- Actions Heading: Authenticated Users Only --}}
                            @auth
                                <th>Actions</th>
                            @endauth
                        </tr>
                    </thead>

                    <tbody>

                        @forelse ($subjects as $subject)

                            <tr>

                                <td>{{ $subject->id }}</td>

                                {{-- Clickable Subject Code --}}
                                <td>
                                    <a
                                        href="{{ route('subjects.show', $subject) }}"
                                        class="text-decoration-none fw-bold"
                                    >
                                        {{ $subject->code }}
                                    </a>
                                </td>

                                {{-- Clickable Subject Title --}}
                                <td>
                                    <a
                                        href="{{ route('subjects.show', $subject) }}"
                                        class="text-decoration-none"
                                    >
                                        {{ $subject->title }}
                                    </a>
                                </td>

                                <td>{{ $subject->units }}</td>

                                <td>
                                    @if ($subject->prerequisite)
                                        {{ $subject->prerequisite->name }}
                                    @else
                                        None
                                    @endif
                                </td>

                                {{-- Edit and Delete: Authenticated Users Only --}}
                                @auth
                                    <td>

                                        {{-- Edit Button --}}
                                        <a
                                            href="{{ route('subjects.edit', $subject) }}"
                                            class="btn btn-sm btn-primary"
                                        >
                                            Edit
                                        </a>

                                        {{-- Delete Button --}}
                                        <form
                                            action="{{ route('subjects.destroy', $subject) }}"
                                            method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('Are you sure you want to delete this subject?');"
                                        >

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="btn btn-sm btn-danger"
                                            >
                                                Delete
                                            </button>

                                        </form>

                                    </td>
                                @endauth

                            </tr>

                        @empty

                            <tr>
                                <td colspan="{{ auth()->check() ? 6 : 5 }}"
                                    class="text-center">
                                    No subjects found.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            {{-- Pagination --}}
            <div class="mt-3">
                {{ $subjects->links() }}
            </div>

        </div>
    </div>

</div>

@endsection
