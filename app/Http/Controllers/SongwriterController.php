<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSongwriterRequest;
use App\Http\Requests\UpdateSongwriterRequest;
use App\Models\Songwriter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class SongwriterController extends Controller
{
    public function index()
    {
        $songwriters = Songwriter::all()->sortBy('name');
        return view('songwriters.index',compact('songwriters'));
    }

    public function show(Songwriter $songwriter)
    {
        return view('songwriters.show', compact('songwriter'));
    }

    public function create()
    {
        abort_if(Gate::denies('admin'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('songwriters.create');
    }

    public function store(StoreSongwriterRequest $request)
    {
        Songwriter::create($request->validated());

        return redirect()->route('dashboard');
    }

    public function edit(Songwriter $songwriter)
    {
        abort_if(Gate::denies('admin'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('songwriters.edit',compact('songwriter'));
    }

    public function update(UpdateSongwriterRequest $request, Songwriter $songwriter)
    {
        abort_if(Gate::denies('admin'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $songwriter->update($request->validated());
        return redirect()->route('dashboard');
    }

    public function destroy(Songwriter $songwriter)
    {
        abort_if(Gate::denies('admin'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $songwriter->delete();
        return redirect()->route('dashboard');
    }
}
