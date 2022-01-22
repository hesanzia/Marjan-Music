<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSingerRequest;
use App\Http\Requests\UpdateSingerRequest;
use App\Models\Singer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class SingerController extends Controller
{
    public function index()
    {
        $singers = Singer::all()->sortBy('name');
        return view('singers.index',compact('singers'));
    }

    public function show(Singer $singer)
    {
        return view('singers.show', compact('singer'));
    }

    public function create()
    {
        abort_if(Gate::denies('admin'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('singers.create');
    }

    public function store(StoreSingerRequest $request)
    {
        Singer::create($request->validated());

        return redirect()->route('dashboard');
    }


    public function edit(Singer $singer)
    {
        abort_if(Gate::denies('admin'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('singers.edit',compact('singer'));
    }

    public function update(UpdateSingerRequest $request, Singer $singer)
    {
        abort_if(Gate::denies('admin'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $singer->update($request->validated());
        return redirect()->route('dashboard');
    }

    public function destroy(Singer $singer)
    {
        abort_if(Gate::denies('admin'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $singer->delete();
        return redirect()->route('dashboard');
    }
}
