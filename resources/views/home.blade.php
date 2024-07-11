@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Carousel pour les promotions -->
    <div id="promotionCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicateurs -->
        <ol class="carousel-indicators">
            @foreach($promotions as $key => $promotion)
                <li data-target="#promotionCarousel" data-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}"></li>
            @endforeach
        </ol>
    
        <!-- Wrapper pour les slides -->
        <div class="carousel-inner">
            @foreach($promotions as $key => $promotion)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <img src="{{ $promotion->image_url }}" class="d-block w-100" alt="{{ $promotion->name }}">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>{{ $promotion->name }}</h5>
                        <p>{{ $promotion->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        
        <!-- Contrôles du carousel -->
        <a class="carousel-control-prev" href="#promotionCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Précédent</span>
        </a>
        <a class="carousel-control-next" href="#promotionCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Suivant</span>
        </a>
    </div>

    <!-- Affichage des catégories -->
    <div class="row mt-4">
        @foreach($categories as $category)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('storage/category_images/' . $category->image) }}" class="card-img-top" alt="{{ $category->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $category->name }}</h5>
                        <a href="{{ route('category.products', $category->id) }}" class="btn btn-primary">Voir les produits</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection