<x-layout>
    @if ($errors->any())
    <div class="col-12" style="height:80px; width:100%;"></div>
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="col-12" style="height:50px; width:100%;"></div>
    <div class="container-fluid my-5 visual">
        <div class="row justify-content-center">
            <div class="col-6 d-flex justify-content-center">
                <div class="form-structor">
                    <form class="" method="POST" action="/register">
                        @csrf
                        <div class="signup">
                            <h2 class="form-title" id="signup">{{ __('ui.Registrati') }}</h2>
                            <div class="social-container mt-5">
                                <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                                <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                            <div class="form-holder">
                                <input class="input " type="text" placeholder="{{ __('ui.Nome') }}" name="name" />
                                <input class="input " type="email" placeholder="{{ __('ui.Email') }}" name="email" />
                                <input class="input " type="password" placeholder="{{ __('ui.Password') }}" name="password" />
                                <input class="input " type="password" placeholder="{{ __('ui.Conferma password') }}"
                                    name="password_confirmation" />
                            </div>
                            <button class="submit-btn">{{ __('ui.Registrati') }}</button>
                        </div>
                    </form>
                    <form class="" method="POST" action="/login">
                        @csrf
                        <div class="login slide-up">
                            <div class="center">
                                <h2 class="form-title" id="login">{{ __('ui.Accedi') }}</h2>
                                <div class="social-container mt-5">
                                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                                <div class="form-holder">
                                    <input class="input" type="email" placeholder="Email" name="email" />
                                    <input class="input" type="password" placeholder="Password" name="password" />
                                </div>
                                <button class="submit-btn">{{ __('ui.Accedi') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>

