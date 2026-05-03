<?php

namespace App\Http\Controllers;

use App\Models\UserProgress;
use Illuminate\Http\Request;

class UserProgressController extends Controller
{
    public function unlock(Request $request)
{
    UserProgress::updateOrCreate(
        [
            'user_id' => auth()->id(),
            'materi_slug' => $request->materi_slug,
            'sub_materi_slug' => $request->sub_materi_slug,
        ],
        [
            'unlocked' => true
        ]
    );

    return response()->json(['success' => true]);
}

public function complete(Request $request)
{
    UserProgress::complete(
        auth()->id(),
        $request->materi_slug,
        $request->sub_materi_slug
    );

    return response()->json(['success' => true]);
}
}
