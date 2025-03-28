<?php

namespace App\Http\Controllers;
use App\Http\Requests\AtividadeRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Atividade;
use Illuminate\Http\Request;


class AtividadeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $atividades = Atividade::where('user_id', Auth::id())->get();
        return view('Atividade.index', compact('atividades'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('atividade.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AtividadeRequest $request)
{
    // Criar e salvar a atividade sem redundâncias
    $atividade = new Atividade($request->validated());
    $atividade->user_id = Auth::id();
    $atividade->save();

    return redirect()->route('atividades.index')->with('success', 'Atividade criada com sucesso!');
}

    /**
     * Display the specified resource.
     */
    public function show(Atividade $atividade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Atividade $atividade)
    {
        if ($atividade->user_id !== Auth::id()) {
            return redirect()->route('atividades.index');
        }

        return view('atividade.edit', compact('atividade')); // Corrigido para 'atividade.edit'
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Atividade $atividade)
    {
        if ($atividade->user_id !== Auth::id()) {
            return redirect()->route('atividades.index');
        }

        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'data_inicio' => 'required|date',
            'data_termino' => 'required|date|after:data_inicio',
            'status' => 'required|in:pendente,concluída,cancelada',
        ]);

        $atividade->update($request->all());

        return redirect()->route('atividades.index')->with('success', 'Atividade atualizada.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Atividade $atividade)
    {
        if ($atividade->user_id !== Auth::id()) return redirect()->route('atividades.index');

        $atividade->delete();
        return redirect()->route('atividades.index')->with('success', 'Atividade excluída.');
    }
}
