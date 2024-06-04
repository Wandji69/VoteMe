<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;
use App\Models\Position;


class CandidateController extends Controller
{
    //
    public function index()
    {
        $candidates = Candidate::with('position')->get();
        return view('candidates.index', compact('candidates'));
    }

    public function create()
    {
        $positions = Position::all();
        return view('candidates.create', compact('positions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'position_id' => 'required|exists:positions,id'
        ]);

        Candidate::create($request->all());
        return redirect()->route('candidates.index')->with('success', 'Candidate created successfully.');
    }

    public function show(Candidate $candidate)
    {
        return view('candidates.show', compact('candidate'));
    }

    public function edit(Candidate $candidate)
    {
        $positions = Position::all();
        return view('candidates.edit', compact('candidate', 'positions'));
    }

    public function update(Request $request, Candidate $candidate)
    {
        $request->validate([
            'name' => 'required',
            'position_id' => 'required|exists:positions,id'
        ]);

        $candidate->update($request->all());
        return redirect()->route('candidates.index')->with('success', 'Candidate updated successfully.');
    }

    public function destroy(Candidate $candidate)
    {
        $candidate->delete();
        return redirect()->route('candidates.index')->with('success', 'Candidate deleted successfully.');
    }
}
