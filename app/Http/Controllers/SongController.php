<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSongRequest;
use App\Http\Requests\UpdateSongRequest;
use App\Models\Composer;
use App\Models\Producer;
use App\Models\Singer;
use App\Models\Song;
use App\Models\Songwriter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class SongController extends Controller
{
    public function show(Song $song)
    {
        return view('songs.show', compact('song'));
    }
    public function create()
    {
        $singers = Singer::all()->sortBy('name');
        $producers = Producer::all()->sortBy('name');
        $composers = Composer::all()->sortBy('name');
        $songwriters = Songwriter::all()->sortBy('name');
        abort_if(Gate::denies('admin'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('songs.create', compact('singers','songwriters','composers','producers'));
    }

    public function store(StoreSongRequest $request)
    {
        Song::create($request->validated());

        return redirect()->route('dashboard');
    }

    public function edit(Song $song)
    {
        $singers = Song::all()->sortBy('name');
        $producers = Producer::all()->sortBy('name');
        $composers = Composer::all()->sortBy('name');
        $songwriters = Songwriter::all()->sortBy('name');
        abort_if(Gate::denies('admin'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('songs.edit',compact('song','singers','songwriters','composers','producers'));
    }

    public function update(UpdateSongRequest $request , Song $song)
    {
        abort_if(Gate::denies('admin'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $song->update($request->validated());
        return redirect()->route('dashboard');
    }

    public function destroy(Song $song)
    {
        abort_if(Gate::denies('admin'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $song->delete();
        return redirect()->route('dashboard');
    }
}
