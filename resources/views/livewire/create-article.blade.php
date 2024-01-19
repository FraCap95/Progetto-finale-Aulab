<div class="container">
    <div class="row">
        <div class="col-12" style="height:80px; width:100%;"></div>
        @if (session('message'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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
        <div class="container visual">
            <div class="row justify-content-center">
                <div class="col-12 d-flex justify-content-center mt-5">
                    <h1 class="text-center title">{{ __('ui.Crea il tuo annuncio') }}</h1>
                </div>
                <div class="col-4 d-flex justify-content-center form-annuncio mt-3">
                    <form wire:submit.prevent='store'>
                        <ul class="form-list mt-3">
                            <li class="form-list__row">
                                <label for="name" class="form-label">{{ __('ui.Titolo') }}</label>
                                <input wire:model.live='name' type="text" class="input-form-ads" id="name">
                            </li>
                            <li class="form-list__row">
                                <label for="description " class="form-label">{{ __('ui.Descrizione') }}</label>
                                <input wire:model.live='description' type="text" class="input-form-ads"
                                    id="description">
                            </li>
                            <li class="form-list__row">
                                <label for="price" class="form-label">{{ __('ui.Prezzo') }}</label>
                                <input wire:model.live= 'price' type="text" class="input-form-ads" id="price">
                            </li>
                            <li class="form-list__row">
                                <label class="form-label" for="category">{{ __('ui.Categoria') }}</label>
                                <select wire:model.defer="category" class="form-select"
                                    aria-label="Default select example">
                                    <option selected>{{ __('ui.Scegli la categoria') }}</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </li>
                            <div class="mb-3">
                                <input wire:model="temporary_images" type="file" name="images" multiple
                                    class="form-control shadow @error('temporary_images.*') is-invaid @enderror"
                                    placeholder="Img">
                                @error('temporary_images.*')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-8 d-flex justify-content-center">
                                        <button type="button" class="bn632-hover bn20" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        Anteprima
                                    </button>
                                    </div>
                                </div>
                            </div>
                            <div class="container my-3">
                                <div class="row justify-content-center">
                                    <div class="col-3 d-flex justify-content-center">
                                        <li>
                                            <button type="submit"
                                                class="bn9"><span>{{ __('ui.Invia') }}</span></button>
                                        </li>
                                    </div>
                                </div>
                            </div>
                        </ul>
                    </form>
                </div>
                <div class="col-4 img-form-annunci mt-3"></div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title title text-center fs-5" id="exampleModalLabel">Anteprima immagine</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if (!empty($images))
                    <div class="row">
                        <div class="col-12">
                            <p class="title">Anteprima immagine</p>
                            <div class="row border border-4 border-info rounded shadow py-3">
                                @foreach ($images as $key => $image)
                                    <div class="col-12 my-3">
                                        <div class="img-preview mx-auto shadow rounded"
                                            style="background-image: url({{ $image->temporaryUrl() }}); background-position:center;">
                                        </div>
                                        <button type="button"
                                            class="btn btn-danger rounded-circle shadow d-block text-center mt-3 mx-auto"
                                            wire:click="removeImage({{ $key }})">X</button>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
