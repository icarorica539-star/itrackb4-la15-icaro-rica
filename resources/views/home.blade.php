@extends('layouts.app')

@section('title', 'Home')

@section('content')

<style>
    body {
        background-color: #f1f5f9;
    }

    .hero-section {
        background: linear-gradient(135deg, #172554, #1e40af);
        color: white;
        border-radius: 18px;
        padding: 55px 40px;
        margin-bottom: 35px;
        box-shadow: 0 8px 25px rgba(23, 37, 84, 0.15);
    }

    .hero-section h2 {
        font-size: 2.2rem;
        font-weight: 700;
    }

    .hero-section p {
        color: #dbeafe;
        font-size: 1.05rem;
        max-width: 650px;
    }

    .subject-icon {
        font-size: 2rem;
        margin-bottom: 12px;
    }

    .btn-subjects {
        background-color: #fbbf24;
        color: #172554;
        font-weight: 600;
        border: none;
        padding: 12px 25px;
        border-radius: 8px;
    }

    .btn-subjects:hover {
        background-color: #f59e0b;
        color: #172554;
    }

    /* LIVE COUNT SECTION */
    .counts-section {
        max-width: 850px;
        margin: 0 auto 40px auto;
    }

    .count-card {
        background: white;
        border: none;
        border-radius: 16px;
        padding: 25px 15px;
        box-shadow: 0 5px 18px rgba(0, 0, 0, 0.07);
        height: 100%;
        text-align: center;
    }

    .count-card h5 {
        color: #475569;
        font-weight: 600;
    }

    .count-number {
        font-size: 3rem;
        font-weight: 700;
    }

    .subject-number {
        color: #2563eb;
    }

    .prerequisite-number {
        color: #059669;
    }

    .count-description {
        color: #64748b;
    }

    /* PROFILE SECTION */
    .profile-card {
        background: white;
        border-radius: 16px;
        padding: 30px;
        margin: 0 auto 35px auto;
        max-width: 850px;
        box-shadow: 0 5px 18px rgba(0, 0, 0, 0.07);
    }

    .profile-photo {
        width: 120px;
        height: 120px;
        object-fit: cover;
        border: 4px solid #dbeafe;
    }

    .profile-name {
        color: #172554;
        font-size: 1.5rem;
        font-weight: 700;
    }

    .profile-details {
        color: #64748b;
        margin-bottom: 7px;
    }
</style>

{{-- HERO SECTION --}}
<div class="hero-section">

    <div class="subject-icon">📚 🎓</div>

    <h2>Manage and Explore Academic Subjects</h2>

    <p>
        Organize and explore academic subjects, track their units,
        and manage prerequisite information in one convenient place.
    </p>

    <a href="{{ route('subjects.index') }}" class="btn btn-subjects">
        View Subject List
    </a>

</div>

{{-- LIVE DATABASE COUNTS --}}
<div class="counts-section">

    <div class="row g-4 justify-content-center">

        <div class="col-md-6">
            <div class="card count-card">

                <div class="subject-icon">📘</div>

                <h5>Total Subjects</h5>

                <div class="count-number subject-number">
                    {{ $subjectCount }}
                </div>

                <p class="count-description mb-0">
                    Number of academic subjects
                </p>

            </div>
        </div>

        <div class="col-md-6">
            <div class="card count-card">

                <div class="subject-icon">📖</div>

                <h5>Total Prerequisites</h5>

                <div class="count-number prerequisite-number">
                    {{ $prerequisiteCount }}
                </div>

                <p class="count-description mb-0">
                    Number of prerequisite records
                </p>

            </div>
        </div>

    </div>

</div>

{{-- STUDENT PROFILE SECTION --}}
<div class="profile-card">

    <div class="row align-items-center">

        <div class="col-md-4 text-center mb-3 mb-md-0">

            <img
                src="{{ asset('img/profile.jpg') }}"
                alt="Rica Icaro Profile Photo"
                width="120"
                height="120"
                class="rounded-circle profile-photo"
            >

        </div>

        <div class="col-md-8">

            <h4 class="profile-name">Rica Icaro</h4>

            <p class="profile-details">
                <strong>Course:</strong> YOUR COURSE
            </p>

            <p class="profile-details">
                <strong>Year:</strong> 4th YEAR
            </p>

            <p class="profile-details">
                <strong>Block:</strong> 4A
            </p>

        </div>

    </div>

</div>

@endsection
