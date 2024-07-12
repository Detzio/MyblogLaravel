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
                    <img src="{{ $promotion->image_url }}" class="d-block w-100 img-fluid" style="height: 400px;" alt="{{ $promotion->name }}">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 style="color: black;">{{ $promotion->name }}</h5>
                        <p style="color: black;">{{ $promotion->description }}</p>
                    </div>                    
                </div>
            @endforeach
        </div>
    
        <!-- Contrôles du carousel -->
        <a class="carousel-control-prev" href="#promotionCarousel" role="button" data-slide="prev" style="color: black;">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#promotionCarousel" role="button" data-slide="next" style="color: black;">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    
</div>
    
    <section>
        <h3>Categories</h3>
        <!-- Affichage des catégories -->
        <div class="row mt-4">
            @foreach($categories as $category)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $category->name }}</h5>
                            <p class="card-text">{{ $category->description }}</p>
                            <a href="{{ route('category.products', $category->id) }}" class="btn btn-primary">Voir les produits</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</div>
@endsection