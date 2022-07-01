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
                                @foreach($categorieOperation as $categorieOperations)

                                <tr>
                                    <td>{{$operation->nomCategorieOperation}}</td>
                                    <td>
                                        <a href="{{route('operation.edit', $operation->id)}}" class="btn btn-primary btn-sm">Editer</a>
                                        <form action="{{ route('operation.destroy', $operation->id)}}" method="POST" style="display: inline-block">
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
        <a href="{{route('operation.create')}}" class="btn btn-secondary">Générer une opération</a>
    </div>
    @endsection
