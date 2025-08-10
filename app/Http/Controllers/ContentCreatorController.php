<?php

namespace App\Http\Controllers;

use App\Models\ContentCreator;
use Illuminate\Http\Request;

class ContentCreatorController extends Controller
{
    public function index()
    {
        return ContentCreator::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'channel_name' => 'required|string|max:255',
            'bio' => 'nullable|string',
        ]);

        return ContentCreator::create($data);
    }

    public function show(ContentCreator $contentCreator)
    {
        return $contentCreator;
    }

    public function update(Request $request, ContentCreator $contentCreator)
    {
        $data = $request->validate([
            'channel_name' => 'sometimes|string|max:255',
            'bio' => 'nullable|string',
        ]);

        $contentCreator->update($data);
        return $contentCreator;
    }

    public function destroy(ContentCreator $contentCreator)
    {
        $contentCreator->delete();
        return response()->noContent();
    }
}
