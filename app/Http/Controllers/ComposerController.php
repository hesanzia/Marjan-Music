<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreComposerRequest;
use App\Http\Requests\UpdateComposerRequest;
use App\Models\Composer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class ComposerController extends Controller
{
    public function index()
    {
        $composers = Composer::all()->sortBy('name');
        return view('composers.index',compact('composers'));
    }

    public function show(Composer $composer)
    {
        return view('composers.show', compact('composer'));
    }

    public function create()
    {
        abort_if(Gate::denies('admin'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('composers.create');
    }

    public function store(StoreComposerRequest $request)
    {
        Composer::create($request->validated());

        return redirect()->route('dashboard');
    }

    public function edit(Composer $composer)
    {
        abort_if(Gate::denies('admin'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('composers.edit',compact('composer'));
    }

    public function update(UpdateComposerRequest $request, Composer $composer)
    {
        abort_if(Gate::denies('admin'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $composer->update($request->validated());
        return redirect()->route('dashboard');
    }

    public function destroy(Composer $composer)
    {
        abort_if(Gate::denies('admin'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $composer->delete();
        return redirect()->route('dashboard');
    }
}
