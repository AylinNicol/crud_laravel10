<?php

namespace App\Http\Controllers;

use App\Models\Animale;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\AnimaleRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class AnimaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $animales = Animale::paginate();

        return view('animale.index', compact('animales'))
            ->with('i', ($request->input('page', 1) - 1) * $animales->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $animale = new Animale();

        return view('animale.create', compact('animale'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AnimaleRequest $request): RedirectResponse
    {
        Animale::create($request->validated());

        return Redirect::route('animales.index')
            ->with('success', 'Animale created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $animale = Animale::find($id);

        return view('animale.show', compact('animale'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $animale = Animale::find($id);

        return view('animale.edit', compact('animale'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AnimaleRequest $request, Animale $animale): RedirectResponse
    {
        $animale->update($request->validated());

        return Redirect::route('animales.index')
            ->with('success', 'Animale updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Animale::find($id)->delete();

        return Redirect::route('animales.index')
            ->with('success', 'Animale deleted successfully');
    }
}
