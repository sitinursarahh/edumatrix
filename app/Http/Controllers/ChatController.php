<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Events\MessageSent;
use Illuminate\View\View;
use App\Models\MessageUserDelete;
use App\Models\Kelas;
use App\Models\ChatRead;


class ChatController extends Controller
{
    public function send(Request $request)
{
    $request->validate([
        'message' => 'nullable|string',
        'class_id' => 'required',
        'file' => 'nullable|file|max:10240'
    ]);

    $filePath = null;
    $fileName = null;

    if ($request->hasFile('file')) {
        $file = $request->file('file');
        $filePath = $file->store('chat_files', 'public');
        $fileName = $file->getClientOriginalName();
    }

    $message = Message::create([
    'class_id' => $request->class_id,
    'user_id' => auth()->id(),
    'message' => $request->message ?? '',
    'file_path' => $filePath,
    'file_name' => $fileName,
]);

    $message->load('user');

    // 🔥 INI YANG TADI HILANG
    broadcast(new MessageSent($message));

    return response()->json([
        'success' => true,
        'message' => $message
    ]);
}
public function index($classId)
{
    $user = auth()->user();

    // 🔒 Siswa tidak boleh buka kelas lain
    if ($user->role == 'siswa' && $user->class_id != $classId) {
        abort(403);
    }

    $messages = Message::with('user')
        ->where('class_id', $classId)
        ->whereDoesntHave('deletedByUsers', function ($q) {
            $q->where('user_id', auth()->id());
        })
        ->orderBy('created_at', 'asc')
        ->get();

    // =======================
    // SISWA
    // =======================
    if ($user->role == 'siswa') {

        $latestMessageTime = Message::where('class_id', $classId)
            ->latest()
            ->value('created_at');

        if ($latestMessageTime) {
            $user->last_seen_chat_at = now();
            $user->save();
        }

        return view('chat', compact('messages', 'classId'));
    }

    // =======================
    // GURU
    // =======================
    if ($user->role == 'guru') {

        ChatRead::updateOrCreate(
            [
                'user_id' => $user->id,
                'class_id' => $classId
            ],
            [
                'last_seen_at' => now()
            ]
        );

        return view('chat_guru', compact('messages', 'classId'));
    }
}
public function delete($id)
{
    $message = Message::findOrFail($id);

    MessageUserDelete::create([
        'message_id' => $message->id,
        'user_id' => auth()->id(),
    ]);

    return response()->json(['success' => true]);
}

public function roomSelector()
{
    $user = auth()->user();

    // ======================
    // SISWA (JANGAN DIUBAH)
    // ======================
    if ($user->role == 'siswa') {
        return redirect('/chat/' . $user->class_id);
    }

    // ======================
    // GURU
    // ======================
    $classes = Kelas::all();

    $unreadPerClass = [];
    $totalUnread = 0;

    foreach ($classes as $class) {

        $lastSeen = ChatRead::where('user_id', $user->id)
            ->where('class_id', $class->id)
            ->value('last_seen_at');

        $query = Message::where('class_id', $class->id)
            ->where('user_id', '!=', $user->id);

        if ($lastSeen) {
            $query->where('created_at', '>', $lastSeen);
        }

        $count = $query->count();

        $unreadPerClass[$class->id] = $count;
        $totalUnread += $count;
    }

    return view('chat_rooms', compact(
        'classes',
        'unreadPerClass',
        'totalUnread'
    ));
}
}
