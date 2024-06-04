<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Candidate;
use App\Models\Position;


class AdminCandidateController extends Controller
{
    //
    public function index()
    {
        $candidates = Candidate::with('position')->get();
        return view('admin.candidates.index', compact('candidates'));
    }

    public function create()
    {
        $positions = Position::all();
        return view('admin.candidates.create', compact('positions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'position_id' => 'required|exists:positions,id'
        ]);

        Candidate::create($request->all());
        return redirect()->route('admin.candidates.index')->with('success', 'Candidate created successfully.');
    }

    public function show(Candidate $candidate)
    {
        return view('admin.candidates.show', compact('candidate'));
    }

    public function edit(Candidate $candidate)
    {
        $positions = Position::all();
        return view('admin.candidates.edit', compact('candidate', 'positions'));
    }

    public function update(Request $request, Candidate $candidate)
    {
        $request->validate([
            'name' => 'required',
            'position_id' => 'required|exists:positions,id'
        ]);

        $candidate->update($request->all());
        return redirect()->route('admin.candidates.index')->with('success', 'Candidate updated successfully.');
    }

    public function destroy(Candidate $candidate)
    {
        $candidate->delete();
        return redirect()->route('admin.candidates.index')->with('success', 'Candidate deleted successfully.');
    }
}
