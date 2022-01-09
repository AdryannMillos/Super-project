<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Enum\ChampionshipEnum;
use App\Service\ChampionshipService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Enum;

final class ChampionshipController extends Controller
{
    private ChampionshipService $championshipService;

    public function __construct(ChampionshipService $championshipService)
    {
        $this->championshipService = $championshipService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $championships = $this->championshipService->getAll();

        return view('championship.indexBack',compact('championships'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('championship.createBack');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'logo' => 'nullable|string',
            'status' => [new Enum(ChampionshipEnum::class)],
        ]);

        $this->championshipService->create($request->all());

        return redirect()->route('championship.indexBack')
            ->with('success', 'Campeonato creado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(int $id)
    {
        $championship = $this->championshipService->find($id);

        return view('championship.show', compact('championship'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(int $id)
    {
        $championship = $this->championshipService->find($id);

        return view('championship.create', compact('championship'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);

        $this->championshipService->update($request->all(),$id);

        return redirect()->route('championship.index')
            ->with('success', 'Campeonato criado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(int $id)
    {
        $this->championshipService->delete($id);

        return redirect()->route('championship.index')
            ->with('success', 'Product deleted successfully');
    }
}
