<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProducerRequest;
use App\Http\Requests\UpdateProducerRequest;
use App\Models\Producer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class ProducerController extends Controller
{
    public function index()
    {
        $producers = Producer::all()->sortBy('name');
        return view('producers.index',compact('producers'));
    }

    public function show(Producer $producer)
    {
        return view('producers.show', compact('producer'));
    }

    public function create()
    {
        abort_if(Gate::denies('admin'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('producers.create');
    }

    public function store(StoreProducerRequest $request)
    {
        Producer::create($request->validated());

        return redirect()->route('dashboard');
    }

    public function edit(Producer $producer)
    {
        abort_if(Gate::denies('admin'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('producers.edit',compact('producer'));
    }

    public function update(UpdateProducerRequest $request, Producer $producer)
    {
        abort_if(Gate::denies('admin'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $producer->update($request->validated());
        return redirect()->route('dashboard');
    }

    public function destroy(Producer $producer)
    {
        abort_if(Gate::denies('admin'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $producer->delete();
        return redirect()->route('dashboard');
    }
}
