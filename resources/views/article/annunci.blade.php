<x-layout>
    <div class="col-12" style="height:50px; width:100%;"></div>
    <div class="container-fluid my-4">
        <div class="row justify-content-evenly">
            <div class="col-12">
                <h2 class="text-center title mt-5">— {{ __('ui.allAnnouncements') }} —</h2>
            </div>
            @forelse ($articles as $article)
                <div class="col-12 col-md-3 d-flex my-5 mx-5 justify-content-center card-group">
                    <div class="card product-card" style="width: 18rem;">
                        <img src="{{ !$article->images()->get()->isEmpty()? $article->images()->first()->getUrl(400, 300): 'https://picsum.photos/300' }}"
                            class="card-img-top product-image" alt="...">
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
                <div class="col-12 visual">
                    <div class="alert alert-warning shadow">
                        <p class="text-center">{{ __('ui.Non ci sono annunci') }}</p>
                    </div>
                </div>
                
            @endforelse
            <div class="row justify-content-center">
                <div class="col-6 d-flex justify-content-center">
                    {{ $articles->links() }}
                </div>
            </div>
        </div>
    </div>
</x-layout>
