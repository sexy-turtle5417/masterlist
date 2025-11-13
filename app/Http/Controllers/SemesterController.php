<?php

namespace App\Http\Controllers;

use App\Models\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Semester $semester)
    {
        //
        $cadets = $semester->cadets()
            ->with([
                'student',
                'courseSemester.course'
            ])
            ->withSum(['attendances as total_hours_attended'], 'hours_credit')
            ->withSum(['trainingSessions as total_training_hours'], 'hours_credit')
            ->take(10)
            ->get();

        $semesterCadets = $semester->cadets();

        $totalCadetStrength = $semesterCadets->count();

        $genderCounts = DB::table('semesters as sem')
            ->join('course_semesters as cs', 'cs.semester_id', '=', 'sem.id')
            ->join('cadets as c', 'c.course_semester_id', '=', 'cs.id')
            ->join('students as s', 's.id', '=', 'c.student_id')
            ->select('s.gender', DB::raw('COUNT(s.id) as total'))
            ->where('sem.id', '=', $semester->id)
            ->groupBy('s.gender')
            ->pluck('total', 's.gender');

        return view('semesters.show', [
            "cadets" => $cadets,
            "total_strength" => $totalCadetStrength,
            "female_cadet_count" => $genderCounts['FEMALE'] ?? 0,
            "male_cadet_count" => $genderCounts['MALE'] ?? 0
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
