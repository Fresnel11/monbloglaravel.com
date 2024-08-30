@extends('layouts.master')

@section('title', 'Register')

@section('contenu')
<section class=" p-3 p-md-4 p-xl-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6 col-xxl-5">
          <div class="card border border-light-subtle rounded-4">
            <div class="card-body p-3 p-md-4 p-xl-5">
              <div class="row">
                <div class="col-12">
                  <div class="mb-5">
                    <div class="text-center mb-4">
                      
                        <h2>Se Connecter</h2>
                      
                    </div>
                    <h4 class="text-center">Bienvenue sur code quizz !</h4>
                  </div>
                </div>
              </div>
              <form action="{{ route('login') }} " method="post">
                @csrf
                <div class="row gy-3 overflow-hidden">
                  <div class="col-12">
                    <div class="form-floating mb-3">
                      <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="name@example.com" required>
                      <label for="email" class="form-label">Email</label>
                      @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-floating mb-3">
                      <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" value="" placeholder="Password" required>
                      <label for="password" class="form-label">Mot de passe</label>
                      @error('password')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                  @enderror
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="d-grid">
                      <button id="creer" class="btn bsb-btn-xl btn-primary" type="submit">Connecter vous</button>
                    </div>
                  </div>
                </div>
              </form>
              <div class="row">
                <div class="col-12">
                  <hr class="mt-5 mb-4 border-secondary-subtle">
                  <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-end">
                    <a href="{{ route('register') }}"  class="link-secondary text-decoration-none">Créer un compte</a>
                    {{-- <a href="#!" class="link-secondary text-decoration-none">Forgot password</a> --}}
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<style>
    #creer{
        background-color: #018673;
        border: none;
    }
</style>
@endsection

{{-- <div class="">
    <div class="p-8 lg:w-1/2 mx-auto">
        <div class="bg-gray-100 rounded-b-lg py-12 px-4 lg:px-24">
            <form class="mt-6">
                <div class="relative"> <input
                        class="appearance-none border pl-12 border-gray-100 shadow-sm focus:shadow-md focus:placeholder-gray-600  transition  rounded-md w-full py-3 text-gray-600 leading-tight focus:outline-none focus:ring-gray-600 focus:shadow-outline"
                        id="username" type="text" placeholder="Email" />
                    <div class="absolute left-0 inset-y-0 flex items-center"> <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-7 w-7 ml-3 text-gray-400 p-1" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                        </svg> </div>
                </div>
                <div class="relative mt-3"> <input
                        class="appearance-none border pl-12 border-gray-100 shadow-sm focus:shadow-md focus:placeholder-gray-600  transition  rounded-md w-full py-3 text-gray-600 leading-tight focus:outline-none focus:ring-gray-600 focus:shadow-outline"
                        id="username" type="text" placeholder="Password" />
                    <div class="absolute left-0 inset-y-0 flex items-center"> <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-7 w-7 ml-3 text-gray-400 p-1" viewBox="0 0 20 20" fill="currentColor">
                            <path
                                d="M10 2a5 5 0 00-5 5v2a2 2 0 00-2 2v5a2 2 0 002 2h10a2 2 0 002-2v-5a2 2 0 00-2-2H7V7a3 3 0 015.905-.75 1 1 0 001.937-.5A5.002 5.002 0 0010 2z" />
                        </svg> </div>
                </div>
                <div class="mt-4 flex items-center text-gray-500"> <input type="checkbox" id="remember" name="remember"
                        class="mr-3" /> <label for="remember">Remember me</label> </div>
                <div class="flex items-center justify-center mt-8"> <button
                        class="text-white py-2 px-4 uppercase rounded bg-indigo-500 hover:bg-indigo-600 shadow hover:shadow-lg font-medium transition transform hover:-translate-y-0.5">
                        Sign in </button> </div>
            </form>
        </div>
    </div>
</div> --}}
<!-- Login 7 - Bootstrap Brain Component -->
