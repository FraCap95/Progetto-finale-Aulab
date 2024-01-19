<div>
    @foreach ($article as $article)
        <div class="card" style="width: 18rem;">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ $article->name }}</h5>
                <p class="card-text">{{ $article->description }}</p>
                <p class="card-text">{{ $article->price }}</p>
                <a href="{{route('showArticle', compact ('article'))}}" class="btn btn-primary">Dettagli</a>
                @auth
                    <a href="{{ route('article.edit', compact('article')) }}" class="btn btn-warning">Modifica</a>
                    <a href="#" class="btn btn-danger" wire:click='delete({{ $article }})'>Elimina</a>
                @endauth
            </div>
        </div>
    @endforeach
</div>
