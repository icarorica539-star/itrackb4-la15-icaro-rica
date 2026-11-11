<?php

namespace App\Http\Controllers;

use App\Models\Prerequisite;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SubjectController extends Controller
{
    /**
     * Display the list of subjects.
     */
   
public function index(Request $request)
{
    $query = Subject::with('prerequisite');

    // H2: Search by Subject Code
    if ($request->filled('code')) {
        $query->where('code', 'like', '%' . $request->code . '%');
    }

    // Existing Filter: Units
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

    // I2 and I3: Validate allowed sorting columns
    $sort = $request->query('sort', 'id');

    if (! in_array($sort, ['code', 'title'])) {
        $sort = 'id';
    }

    // I4: Sort first, then paginate, then preserve query strings
    $subjects = $query->orderBy($sort, 'asc')
                      ->paginate(7)
                      ->withQueryString();

    // Get prerequisites for dropdown
    $prerequisites = Prerequisite::all();

    return view('subjects.index', compact('subjects', 'prerequisites'));
    }

    /**
     * Remove the specified subject.
     */
    
public function destroy(Subject $subject)
{
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
