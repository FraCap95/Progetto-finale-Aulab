<x-layout>
    <div class="col-12" style="height:80px; width:100%;"></div>
    <div class="container visual">
        <div class="row justify-content-center">
            <div class="col-12 d-flex justify-content-center mt-5">
                <h1 class="text-center title">Diventa revisore</h1>
            </div>
            <div class="col-6 d-flex justify-content-center form-revisor mt-3">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <form method="POST" action="{{route('becomerevisor.submit')}}">
                                @csrf
                                <ul class="form-list mt-3">
                                    <li class="form-list__row">
                                        <label class="form-label" for="name">{{ __('ui.Nome') }}</label>
                                        <input class="input-form-rev" id="name" name="name"required="" type="text" value="{{old('name')??Auth::user()->name}}"/>
                                    </li>
                                    <li class="form-list__row">
                                        <label class="form-label" for="email">{{ __('ui.Email') }}</label>
                                        <input class="input-form-rev" id="email" name="email" required="" type="email" value="{{old('email')??Auth::user()->email}}"/>
                                    </li>
                                    <li class="form-list__row">
                                        <label class="form-label" for="body">{{ __('ui.Lascia un messaggio') }}</label>
                                        <textarea class="input-form-rev" id="body" name="body" required="" rows="4"></textarea>
                                    </li>
                                    <div class="container my-3">
                                        <div class="row justify-content-center">
                                            <div class="col-3 d-flex justify-content-center">
                                                <li>
                                                    <button type="submit" class="bn9"><span>{{ __('ui.Invia') }}</span></button>
                                                </li>
                                            </div>
                                        </div>
                                    </div>
                                </ul>
                            </form>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</x-layout>

