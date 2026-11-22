<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMediaRequest;
use App\Http\Requests\UpdateMediaRequest;
use App\Http\Resources\MediaResource;
use App\Models\Media;
use App\Models\User;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function index(Request $request)
    {
        $query = Media::query();

        if ($request->filled('search')) {
            $query->where(
                'title',
                'like',
                '%' . $request->search . '%'
            );
        }

        return MediaResource::collection(
            $query->latest()->paginate(10)
        );
    }

    public function show(Media $media)
    {
        $media->load('users');

        return new MediaResource($media);
    }

    public function store(StoreMediaRequest $request)
    {
        $media = Media::create($request->validated());

        return (new MediaResource($media))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateMediaRequest $request, Media $media)
    {
        $media->update($request->validated());

        return new MediaResource($media->fresh());
    }

    public function destroy(Media $media)
    {
        $media->delete();

        return response()->noContent();
    }

    public function addToCollection(User $user, Media $media)
    {
        if ($user->media()->where('media.id', $media->id)->exists()) {
            return response()->json([
                'message' => 'Media already exists in this collection.',
            ], 409);
        }

        $user->media()->attach($media->id);

        return response()->json([
            'message' => 'Media added to collection successfully.',
            'data' => new MediaResource($media),
        ], 201);
    }

    public function removeFromCollection(User $user, Media $media)
    {
        if (!$user->media()->where('media.id', $media->id)->exists()) {
            return response()->json([
                'message' => 'Media not found in this collection.',
            ], 404);
        }

        $user->media()->detach($media->id);

        return response()->json([
            'message' => 'Media removed from collection successfully.',
        ]);
    }
}
