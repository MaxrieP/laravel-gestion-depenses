@extends('layout')
@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="bg-white rounded-lg shadow-sm p-5">
                <div class="tab-content">
                    <div id="nav-tab-card" class="tab-pane fade show active">
                        <h3>Liste fournisseurs</h3>
                        <!-- Tableau -->
                        <table class="table">
                            <thead>
                                <tr>

                                    <th scope="col">Nom</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($fournisseur as $fournisseurs)

                                <tr>
                                    <td>{{$fournisseur->nomFournisseur}}</td>
                                    <td>
                                        <a href="{{route('fournisseur.edit', $fournisseur->id)}}" class="btn btn-primary btn-sm">Editer</a>
                                        <form action="{{ route('fournisseur.destroy', $fournisseur->id)}}" method="POST" style="display: inline-block">
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
