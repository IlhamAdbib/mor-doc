<x-guest-layout>

    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <center><h2 class="form-title">SE CONNECTER EN TANT QU'ADMIN</h2></center>


            <!-- Email Address -->
            <div>
                <x-input-label for="email"/>
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" placeholder="Votre adresse email" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password"/>

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                placeholder="Votre mot de passe"
                                required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))

                @endif
                <x-primary-button class="ml-3">
                    {{ __('Se connecter') }}
                </x-primary-button>
            </div>
            
            
        </form>
    </x-auth-card>
</x-guest-layout>
<style>
    h2 {
  line-height: 1.66;
  margin: 0;
  padding: 0;
  font-weight: 700;
  color: #222;
  font-family: 'Montserrat';
  font-size: 20px;
  text-transform: uppercase;
  text-align: center;
  margin-bottom: 40px; 
}
</style>