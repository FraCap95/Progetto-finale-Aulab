<div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Modifica articolo</h1>
            </div>
            @if (session('message'))
            <div class="alert alert-warning">
                {{ session('message') }}
            </div>
            @endif
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form wire:submit.prevent='edit' >
                
                <div class="mb-3">
                    <label for="text" class="form-label">Nome</label>
                    <input wire:model.live='name' type="text" class="form-control" id="exampleInputEmail1" >
                    
                </div>
                <div class="mb-3">
                    <label for="text" class="form-label">Descrizione</label>
                    <input wire:model.live='description' type="text" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                    <label for="text" class="form-label">Prezzo</label>
                    <input wire:model.live= 'price'  type="text" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                    <label for="category">Categoria</label>
                    <select wire:model.defer="category" class="form-select" aria-label="Default select example">
                        <option selected>Scegli la categoria</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Invia</button>
            </form>
        </div>
    </div>
</div>
