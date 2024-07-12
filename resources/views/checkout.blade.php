@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Validation du Panier</h2>
    <form action="{{ route('cart.validate') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="address">Adresse de Livraison</label>
            <input type="text" class="form-control" id="address" name="address" required>
        </div>
        <button type="submit" class="btn btn-success">Valider la Commande</button>
    </form>
</div>
@endsection