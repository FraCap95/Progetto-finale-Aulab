<x-layout>
    <div class="col-12" style="height:80px; width:100%;"></div>
    @if (session('message'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner text-center">
            <div class="carousel-item active">
                <img src="https://images.unsplash.com/photo-1567016546367-c27a0d56712e?auto=format&fit=crop&q=80&w=2940&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                    class="img-carousel" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h1 class="title-carousel">{{ __('ui.SEDIE') }}</h1>
                    <p class="subtitle">
                        {{ __('ui.Sedute di stile, design che parla: scopri l\'eleganza quotidiana con le nostre sedie uniche') }}
                    </p>
                    <a href="/categoria/1" class="bn1">{{ __('ui.Acquista ora') }}</a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://images.unsplash.com/photo-1581094725469-f429921c09c1?q=80&w=2940&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                    class="img-carousel" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h1 class="title-carousel">{{ __('ui.POLTRONE') }}</h1>
                    <p class="subtitle">
                        {{ __('ui.Avvolgiti nell\'eleganza: le nostre poltrone trasformano ogni momento in un\'esperienza di comfort e stile senza tempo') }}
                    </p>
                    <a href="/categoria/7" class="bn1">{{ __('ui.Acquista ora') }}</a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://images.unsplash.com/photo-1551516594-56cb78394645?q=80&w=2930&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                    class="img-carousel" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h1 class="title-carousel">{{ __('ui.ACCESSORI') }}</h1>
                    <p class="subtitle">
                        {{ __('ui.Eleva il tuo spazio con dettagli straordinari: i nostri accessori sono la firma perfetta per la tua casa, dove ogni angolo racconta la tua unicità') }}
                    </p>
                    <a href="/categoria/5" class="bn1">{{ __('ui.Acquista ora') }}</a>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <section>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-12 d-flex justify-content-center">
                    <h5 class="title fw-light">{{ __('ui.DescrizioneWelcome') }}</h5>
                </div>
            </div>
        </div>
    </section>

    <div class="container-fluid my-5 visual">
        <div class="row justify-content-evenly">
            <div class="col-12">
                <hr>
                <h3 class="text-center title mt-5">— {{ __('ui.allAnnouncements') }} —</h3>
            </div>

            @foreach ($article as $article)
                <div class="col-12 col-md-3 d-flex my-5 justify-content-center card-group">
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
            @endforeach
        </div>
    </div>
</x-layout>
