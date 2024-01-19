<x-layout>
    <div class="container my-5">
        <div class="row">
            <div class="col-12" style="height:50px; width:100%;"></div>
            <div class="col-12 title mt-5">
                {{ __('ui.Annuncio') }}: {{ $article->name }}
            </div>
            <div class="container mt-5">
                <div class="row justify-content-evenly">
                    <div class="col-4">
                        <div id="carouselExample" class="carousel slide">
                            @if ($article->images)
                                <div class="carousel-inner">
                                    @foreach ($article->images as $image)
                                        <div class="carousel-item  @if ($loop->first) active @endif">
                                            <img src="{{ $image->getUrl(400, 300) }}"
                                                class="d-block rounded img-fluid w-100" alt="...">
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                    <div class="col-4 d-flex align-items-center revisorView">
                        <div class="container-fluid">
                            <div class="row justify-content-center">
                                <div class="col-8 d-flex justify-content-center align-items-center">
                                    <h3 class="text-center title mt-5"> {{ __('ui.Titolo') }}: {{ $article->name }}</h3>
                                </div>
                                <div class="col-8 d-flex justify-content-center">
                                    <p class="text-center title mt-5 descp-show box-desc">{{ __('ui.Descrizione') }}:
                                        {{ $article->description }}</p>
                                </div>
                                <div class="col-8 d-flex justify-content-center">
                                    <a class="text-decoration-none text-center title mt-5"
                                        href="{{ route('categoryShow', ['category' => $article->category]) }}">
                                        {{ __('ui.Categoria') }}:
                                        {{ $article->category->name }}</a>
                                </div>
                                <div class="col-8 d-flex justify-content-center">
                                    <p class="text-center title mt-5">{{ __('ui.Prezzo') }}: {{ $article->price }} €
                                    </p>
                                </div>
                                <div class="col-8 d-flex justify-content-center">
                                    <p class="text-center title mt-5">{{ __('ui.Pubblicato il') }}:
                                        {{ $article->created_at->format('d/m/Y') }}</p>
                                </div>
                                <div class="col-8 d-flex justify-content-center">
                                    @if ($article->user)
                                        <p class="text-center title mt-5"> {{ __('ui.Autore') }}:
                                            {{ $article->user->name }} </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mt-3">
                <div class="row justify-content-center">
                    <div class="col-4 d-flex justify-content-center">
                        @if (Auth::user() && Auth::user()->is_revisor )
                        <div class="col-4 d-flex justify-content-center">
                            <form method="POST" action="{{ route('revisor.edit_articles', ['article'=>$article]) }}">
                                @csrf
                                @method('PATCH')
                                <button class="bn632-hover bn22" type="submit">{{ __('ui.Annulla') }}</button>
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>

