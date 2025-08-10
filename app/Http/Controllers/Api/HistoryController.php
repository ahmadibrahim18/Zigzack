<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Video;
use App\Models\User;


class HistoryController extends Controller
{
    public function index()
    {
        
        $history = History::with('video')
            ->where('user_id', Auth::id())
            ->orderBy('watched_at', 'desc')
            ->get();

        return response()->json($history);
    }

    public function store(Request $request)
    {
        $request->validate([
            'video_id' => 'required|exists:videos,id',
        ]);

        $history = History::create([
            'user_id' => Auth::id(),
            'video_id' => $request->video_id,
            'watched_at' => now(),
        ]);

        return response()->json($history, 201);
    }

    public function destroy($id)
    {
        $history = History::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $history->delete();

        return response()->json(['message' => 'History entry deleted']);
    }

    public function clear()
    {
        History::where('user_id', Auth::id())->delete();

        return response()->json(['message' => 'All history cleared']);
    }
}

