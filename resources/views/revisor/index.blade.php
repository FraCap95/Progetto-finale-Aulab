<x-layout>
    <div class="visual">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 mt-5" style="height:50px; width:100%;"></div>
                <div>
                    @if (session('message'))
                        <div class="alert alert-success alert-dismissible fade show">
                            {{ session('message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                </div>
                <div class="col-12">
                    <h3 class="text-center title">
                        {{ $article_to_check ? 'Ecco l\'annuncio da revisionare' : 'Non ci sono annunci da revisionare ' }}
                    </h3>
                </div>
            </div>
            @if ($article_to_check)
                <div class="container mt-5">
                    <div class="row justify-content-evenly">
                        <div class="col-4">
                            <div id="carouselExample" class="carousel slide">
                                @if ($article_to_check->images)
                                    <div class="carousel-inner">
                                        @foreach ($article_to_check->images as $image)
                                            <div class="carousel-item  @if ($loop->first) active @endif">
                                                <img src="{{ $image->getUrl(400, 300) }}"
                                                    class="d-block rounded img-fluid w-100" alt="...">
                                            </div>
                                        @endforeach
                                        </div>
                                @endif
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                        <div class="col-4 d-flex align-items-center revisorView">
                            <div class="container-fluid">
                                <div class="row justify-content-center">
                                    <div class="col-8 d-flex justify-content-center align-items-center">
                                        <h3 class="text-center title mt-5"> {{ __('ui.Titolo') }}: {{ $article_to_check->name }}</h3>
                                    </div>
                                    <div class="col-8 d-flex justify-content-center">
                                        <p class="text-center title mt-5 descp-show box-desc">{{ __('ui.Descrizione') }}:
                                            {{ $article_to_check->description }}</p>
                                    </div>
                                    <div class="col-8 d-flex justify-content-center">
                                        <p class="text-center title mt-5">{{ __('ui.Pubblicato il') }}:
                                            {{ $article_to_check->created_at->format('d/m/Y') }}</p>
                                    </div>
                                    <div class="col-8 d-flex justify-content-center">
                                        <button type="button" class="bn632-hover bn20" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal">
                                            Info
                                        </button>
                                    </div>
                    
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-5">
                            <div class="row justify-content-evenly">
                                <div class="col-4 d-flex justify-content-center">
                                    <form method="POST" action="{{ route('revisor.accept_articles', ['article' => $article_to_check]) }}">
                                        @csrf
                                        @method('PATCH')
                                        <button class="bn632-hover bn22" type="submit">{{ __('ui.Accetta') }}</button>
                                    </form>
                                </div>
                                <div class="col-4 d-flex justify-content-center">
                                    <form method="POST" action="{{ route('revisor.reject_articles', ['article' => $article_to_check]) }}">
                                        @csrf
                                        @method('PATCH')
                                        <button class="bn632-hover bn28" type="submit">{{ __('ui.Rifiuta') }}</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 title text-center" id="exampleModalLabel">{{ __('ui.Info') }}</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="container">
                                    <div class="row justify-content-evenly">
                                        <div class="col-4">
                                            <h5 class="title">Tags</h5>
                                            @if ($image->labels)
                                                @foreach ($image->labels as $label)
                                                    <p class="d-inline"> {{ $label }}</p>
                                                @endforeach
                                            @endif
                                        </div>
                                        <div class="col-4">
                                            <h5 class="title">Revisioni Immagini</h5>
                                            <p class="title">Adulti: <span class="{{ $image->adult }}"></span></p>
                                            <p class="title">Satira: <span class="{{ $image->spoof }}"></span></p>
                                            <p class="title">Medicina: <span class="{{ $image->medical }}"></span></p>
                                            <p class="title">Violenza: <span class="{{ $image->violence }}"></span></p>
                                            <p class="title">Contenuto Ammiccante: <span class="{{ $image->racy }}"></span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <div class="col-12" style="height:500px; width:100%;"></div>
</x-layout>
