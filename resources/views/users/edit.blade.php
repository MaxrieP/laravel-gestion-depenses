<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
<div class="container py-5">
  <div class="row">
    <div class="col-lg-7 mx-auto">
      <div class="bg-white rounded-lg shadow-sm p-5">
        <div class="tab-content">
          <div id="nav-tab-card" class="tab-pane fade show active">
            <h3>Modifier son profil</h3>
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
             <form method="post" action="{{ route('users.update', $user->id) }}">
              @csrf
              @method('PATCH')
              <div class="form-group">
                <label>Prénom</label>
                <input type="text" name="firstNameUser" class="form-control" value="{{ $user->firstNameUser }}">
              </div>
              <div class="form-group">
                <label>Nom</label>
                <input type="text" name="lastNameUser" class="form-control" value="{{ $user->lastNameUser }}">
              </div>
              <div class="form-group">
                <label>Adresse</label>
                <input type="text" name="street" class="form-control" value="{{ $user->street }}">
              </div>
              <div class="form-group">
                <label>Code Postal</label>
                <input type="text" name="postalCode" class="form-control" value="{{ $user->postalCode }}">
              </div>
              <div class="form-group">
                <label>Ville</label>
                <input type="text" name="city" class="form-control" value="{{ $user->city }}">
              </div>

              <button type="submit" class="btn btn-primary  rounded-pill shadow-sm">Mettre à jour</button>
            </form>
            <!-- Fin du formulaire -->
          </div>
      </div>
    </div>
  </div>
</div>
</x-app-layout>