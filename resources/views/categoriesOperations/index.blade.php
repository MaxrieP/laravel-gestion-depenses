@extends('layout')
@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="bg-white rounded-lg shadow-sm p-5">
                <div class="tab-content">
                    <div id="nav-tab-card" class="tab-pane fade show active">
                        <h3>Liste des Catégories d'opérations</h3>
                        <!-- Tableau -->
                        <table class="table">
                            <thead>
                                <tr>

                                    <th scope="col">Nom</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categorieOperations as $categoriesOperations)

                                <tr>
                                    <td>{{$categoriesOperations->nomCategorieOperation}}</td>
                                    <td>
                                        <a href="{{route('categorie_operations.edit', $categoriesOperations->idCategorieOperation)}}" class="btn btn-primary btn-sm">Editer</a>
                                        <form action="{{ route('categorie_operations.destroy', $categoriesOperations->idCategorieOperation)}}" method="POST" style="display: inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm" type=" submit">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <!-- Fin du Tableau -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <a href="{{route('categorie_operations.create')}}" class="btn btn-secondary">Générer une opération</a>
    </div>
    @endsection
