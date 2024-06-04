<?php

namespace App\Http\Controllers;

use App\Http\Middleware\IsAdmin;
use Illuminate\Http\Request;
use App\Models\Vote;
use App\Models\Candidate;
use Illuminate\Support\Facades\Mail;
use App\Mail\VoteNotification;
use App\Mail\VoteCastMail;
use App\Models\Position;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class VoteController extends Controller
{
    //

    public function index(): View
    {
        $positions = Position::all();
        return view('vote', compact('positions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'candidate_id' => 'required|exists:candidates,id',
        ]);

        $user = auth()->user();
        $candidate = Candidate::findOrFail($request->candidate_id);

        // Check if the user has already voted for this position
        $existingVote = Vote::where('user_id', $user->id)
            ->whereHas('candidate', function ($query) use ($candidate) {
                $query->where('position_id', $candidate->position_id);
            })->first();

        if ($existingVote) {
            return redirect()->back()->with('error', 'You have already voted for this position.');
        }

        // Store the vote
        Vote::create([
            'user_id' => $user->id,
            'candidate_id' => $candidate->id,
        ]);

        $candidate->increment('total_votes');

        // Send email notification to the admin
        if (Auth::user()->is_admin) {
            Mail::to(Auth::user()->email)->send(new VoteNotification($candidate));
        }

        // Send email notification
        Mail::to(Auth::user()->email)->send(new VoteCastMail($candidate));

        return redirect()->back()->with('success', 'Vote cast successfully.');
    }
}
