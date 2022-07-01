<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategorieOperation;

class CategorieOperationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorieOperations = CategorieOperation::all();
        return view('categoriesOperations.index', compact('categorieOperations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categoriesOperations.create');
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

            'nomCategorieOperation'=>'required',

        ]);

        CategorieOperation::create([
            'nomCategorieOperation'=>  $request->nomCategorieOperation,

        ]);

        return redirect()->route('categoriesOperations.index')
                        ->with('success', 'Catégorie ajouté avec succès !');
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
        $categorieOperations = CategorieOperation::findOrFail($id);
        return view('categorieOperations.edit', compact('categorieOperations'));
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
        $updateCategoriesOperations = $request->validate([
            'nomCategorieOperation'=>'required',

        ]);
        CategorieOperation::whereId($id)->update($updateCategoriesOperations);
        return redirect()->route('categorie_operations.index')
            ->with('success', 'la catégorie a été mis à jour avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categorieOperations = CategorieOperation::findOrFail($id);
        $categorieOperations->delete();
        return redirect('/categorieOperations')->with('success', 'Catégorie supprimée avec succès');
    }
}
