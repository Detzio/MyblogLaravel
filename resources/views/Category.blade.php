@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $category->name }}</h1>
    <p>{{ $category->description }}</p>
    <div class="row">
        @forelse ($category->products as $product)
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="bd-placeholder-img card-img-top">
                    <div class="card-body">
                        <p class="card-text">{{ $product->name }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                            </div>
                            <small class="text-muted">{{ $product->price }} €</small>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p>Aucun produit trouvé dans cette catégorie.</p>
        @endforelse
    </div>
</div>
@endsection