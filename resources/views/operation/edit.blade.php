@extends('layout')
@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-7 mx-auto">
            <div class="bg-white rounded-lg shadow-sm p-5">
                <div class="tab-content">
                    <div id="nav-tab-card" class="tab-pane fade show active">
                        <h3> Modifier une opération</h3>
                        <!-- Message d'information -->
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <!-- Formulaire -->
                        <form method="POST" action="{{route('operation.update', $operation->id)}}">
                            @csrf
                            <div class="form-group">
                                <label>Type</label>
                                <input type="text" name="typeOperation" class="form-control" value="{{ $operation->typeOperation}}">
                            </div>
                            <div class="form-group">
                                <label>Montant</label>
                                <input type="number" name="montantOperation" class="form-control" value="{{ $operation->montantOperation}}">
                            </div>
                            <div class="form-group">
                                <select name="categorieOperation_id" class="custom-select">
                                    <option value="{{ $operation->categoriesOperation_id}}">{{ $operation->categorieOperation->nomCategorieOperation }}</option>
                                    @foreach($categorieOperation as $categorieOperation)
                                    <option value="{{ $categorieOperation->id }}">{{ $categorieOperation->nomCategorieOperation }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary  rounded-pill shadow-sm"> Mettre à jour l'opération</button>
                        </form>
                        <!-- Fin du formulaire -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
