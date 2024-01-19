<x-layout>
    <div class="container-fluid mt-5 visual">
        <div class="row justify-content-evenly">
            <div class="col-12 mb-5 mt-5">
                <h3 class="title mt-3">{{ __('ui.Esplora la categoria') }} > {{ $category->name }}</h3>
            </div>
            @forelse ($category->articles as $article)
                <div class="col-12 col-md-3 d-flex my-5 mx-5 justify-content-center card-group">
                    <div class="card product-card" style="width: 18rem;">
                        <img src="{{!$article->images()->get()->isEmpty() ? $article->images()->first()->getUrl(400, 300) : 'https://picsum.photos/300'}}" class="card-img-top product-image" alt="image">
                        <div class="card-body">
                        <h5 class="card-title product-name">{{ $article->name }}</h5>
                            <p class="card-text product-description text-truncate">{{ $article->description }}</p>
                            <p class="card-text price">{{ $article->price }} €</p>
                            <div class="mb-3">
                                <p class="targa"> {{ __('ui.Categoria') }}:
                                    <a class=" text-decoration-none text-black"
                                        href="{{ route('categoryShow', ['category' => $article->category]) }}">
                                        <b class="category">{{ $article->category->name }}</b></a>
                                </p>
                            </div>
                            <a href="{{ route('showArticle', compact('article')) }}"
                                class="btn btn-primary details">{{ __('ui.Visualizza') }}</a>
                            <p class="mt-3 date">{{ __('ui.Pubblicato il') }}: <b class="date-numbers">
                                    {{ $article->created_at->format('d/m/Y') }}</b></p>
                        </div>
                    </div>
                </div>
            @empty
            <div class="row align-items-center">
                <div class="col-12 d-flex justify-content-center my-3">
                    <h2 class="title">{{ __('ui.Non sono presenti annunci per questa categoria') }}</h2>
                </div>
                <div class="col-12 d-flex justify-content-center">
                    <p class="title">{{ __('ui.Pubblicane uno') }}
                        <a href="{{ route('article.create') }}" class="bn3637 bn36 mx-3" >{{ __('ui.Nuovo annuncio') }}</a>
                    </p>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</x-layout>
