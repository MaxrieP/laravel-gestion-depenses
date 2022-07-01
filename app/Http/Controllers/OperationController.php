<?php

namespace App\Http\Controllers;

use App\Models\CategorieOperation;
use App\Models\Operation;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\Operator;

class OperationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $operations = Operation::all();
        return view('operations.index', compact('operations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorieOperations = CategorieOperation::all();
        return view('operations.create', compact('categorieOperations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'typeOperation'=>'required',
            'montantOperation'=>'required',
            'categorieOperation_id'=>'required'

        ]);

        Operation::create([
            'typeOperation'=>  $request->typeOperation,
            'montantOperation'=>  $request->montantOperation,
            'categorieOperation_id'=>$request->categorieOperation_id

        ]);

        return redirect()->route('operations.index')
                        ->with('success', 'Opération ajouté avec succès !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $operation = Operation::findOrFail($id);
        $categorieOperations = CategorieOperation::all();

        return view('operations.edit', compact('operation', 'categorieOperations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updateOperation = $request->validate([
            'typeOperation'=>'required',
            'montantOperation'=>'required',
            'categorieOperations_id'=>'required'

        ]);
        Operation::whereId($id)->update($updateOperation);
        return redirect()->route('heroes.index')
            ->with('success', 'L\'opération a été mis à jour avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $operation = Operation::findOrFail($id);
        $operation->delete();
        return redirect('/operation')->with('success', 'Opération supprimée avec succès');
    }
}
