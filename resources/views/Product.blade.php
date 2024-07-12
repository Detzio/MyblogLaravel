@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $product->name }}</h1>
    <p>{{ $product->description }}</p>
    <p><strong>Prix :</strong> {{ $product->price }} €</p>
    <a href="{{ route('products.index') }}" class="btn btn-primary">Retour à la liste des produits</a>
</div>
@endsection