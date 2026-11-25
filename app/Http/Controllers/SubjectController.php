<?php

namespace App\Http\Controllers;

use App\Models\Prerequisite;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

class SubjectController extends Controller
{
    public function index(Request $request)
    {
        $query = Subject::with('prerequisite');

        // H2: Search by Subject Code
        if ($request->filled('code')) {
            $query->where('code', 'like', '%' . $request->code . '%');
        }

        // Filter by Units
        if ($request->filled('units')) {
            $query->where('units', $request->units);
        }

        // H3: Filter by Prerequisite
        if ($request->filled('prerequisite_id')) {
            $query->where('prerequisite_id', $request->prerequisite_id);
        }

        // H4: Filter by Active / Inactive
        $active = $request->query('is_active');

        if ($active !== null && $active !== '') {
            $query->where('is_active', $active);
        }

        // I2 and I3: Validate sorting columns
        $sort = $request->query('sort', 'id');

        if (!in_array($sort, ['code', 'title'])) {
            $sort = 'id';
        }

        // I4: Sort, paginate, preserve query strings
        $subjects = $query->orderBy($sort, 'asc')
            ->paginate(7)
            ->withQueryString();

        $prerequisites = Prerequisite::all();

        return view('subjects.index', compact(
            'subjects',
            'prerequisites'
        ));
    }

    public function create()
    {
        Gate::authorize('create', Subject::class);

        $prerequisites = Prerequisite::all();

        return view('subjects.create', compact('prerequisites'));
    }

    /**
     * Store a newly created subject.
     */
    public function store(Request $request)
    {
        Gate::authorize('create', Subject::class);

        $validated = $request->validate([
            'code' => 'required|string|max:255|unique:subjects,code',
            'title' => 'required|string|max:255',
            'units' => 'required|integer|min:1',
            'is_active' => 'sometimes|boolean',
            'prerequisite_id' => 'nullable|exists:prerequisites,id',
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        $subject = Subject::create($validated);

        Log::info('Subject saved', [
            'subject_id' => $subject->id,
        ]);

        return redirect()
            ->route('subjects.index')
            ->with('success', 'Subject added successfully!');
    }

    
    public function show(Subject $subject)
    {
        $subject->load('prerequisite');

        return view('subjects.show', compact('subject'));
    }
    
    public function edit(Subject $subject)
    {
        Gate::authorize('update', $subject);

        $prerequisites = Prerequisite::all();

        return view('subjects.edit', compact(
            'subject',
            'prerequisites'
        ));
    }
   
    public function update(Request $request, Subject $subject)
    {
        Gate::authorize('update', $subject);

        $validated = $request->validate([
            'code' => 'required|string|max:255|unique:subjects,code,' . $subject->id,
            'title' => 'required|string|max:255',
            'units' => 'required|integer|min:1',
            'is_active' => 'sometimes|boolean',
            'prerequisite_id' => 'nullable|exists:prerequisites,id',
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        $subject->update($validated);

        return redirect()
            ->route('subjects.index')
            ->with('success', 'Subject updated successfully!');
    }

    public function destroy(Subject $subject)
    {
        Gate::authorize('delete', $subject);

        abort_if(
            $subject->prerequisite !== null &&
            $subject->prerequisite->subjects()->count() === 1,
            403
        );

        $subject->delete();

        return redirect()
            ->route('subjects.index')
            ->with('success', 'Subject deleted successfully!');
    }
}
