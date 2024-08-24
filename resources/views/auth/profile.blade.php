@extends('layouts.master')

@section('contenu')
    <div class="container">
        <div class="heading">Modifié votre profil</div>

        @if (session('status'))
            <p>{{ session('status') }}</p>
        @endif
        <form method="POST" action="{{ route('user.update') }}" class="form">
            @csrf
            @method('PATCH')
            <input required="" class="input" type="text" name="name" id="name" value="{{ old('name') }}"
                required placeholder="Nom">
            @error('name')
                <p>{{ $message }}</p>
            @enderror
            <input required="" class="input" type="email" name="email" id="email" value="{{ old('email') }}"
                required placeholder="E-mail">
            @error('email')
                <p>{{ $message }}</p>
            @enderror
            <input required="" class="input" type="password" name="password" id="password" placeholder="Password">
            @error('password')
                <p>{{ $message }}</p>
            @enderror
            <input required="" class="input" type="password" name="password_confirmation" id="password_confirmation"
                placeholder="Password">
            <input class="login-button" type="submit" value="Modifié le profil">

        </form>
        <div class="social-account-container">
            <div class="heading">Supprimé votre compte</div>
            <form method="POST" action="{{ route('user.destroy') }}">
                @csrf
                @method('DELETE')
                <input required="" class="input" type="password" name="password" id="password"
                    placeholder="Confirmez votre mot de passe pour la suppression">
                @error('password')
                    <p>{{ $message }}</p>
                @enderror
                <input class="login-button" type="submit" value="Supprimé le compte">
            </form>
        </div>
        <span class="agreement"><a href="#">Learn user licence agreement</a></span>
    </div>

    <style>
        .container {
            max-width: 350px;
            background: #F8F9FD;
            background: linear-gradient(0deg, rgb(255, 255, 255) 0%, rgb(244, 247, 251) 100%);
            border-radius: 40px;
            padding: 25px 35px;
            border: 5px solid rgb(255, 255, 255);
            box-shadow: rgba(133, 189, 215, 0.8784313725) 0px 30px 30px -20px;
            margin: 20px;
        }

        .heading {
            text-align: center;
            font-weight: 900;
            font-size: 30px;
            color: rgb(16, 137, 211);
        }

        .form {
            margin-top: 20px;
        }

        input{
            width: 100%;
            background: white;
            border: none;
            padding: 15px 20px;
            border-radius: 20px;
            margin-top: 15px;
            box-shadow: #cff0ff 0px 10px 10px -5px;
            border-inline: 2px solid transparent; 
        }

        .form .input {
            width: 100%;
            background: white;
            border: none;
            padding: 15px 20px;
            border-radius: 20px;
            margin-top: 15px;
            box-shadow: #cff0ff 0px 10px 10px -5px;
            border-inline: 2px solid transparent;
        }

        .form .input::-moz-placeholder {
            color: rgb(170, 170, 170);
        }

        .form .input::placeholder {
            color: rgb(170, 170, 170);
        }

        .form .input:focus {
            outline: none;
            border-inline: 2px solid #12B1D1;
        }

        .form .forgot-password {
            display: block;
            margin-top: 10px;
            margin-left: 10px;
        }

        .form .forgot-password a {
            font-size: 11px;
            color: #0099ff;
            text-decoration: none;
        }

        .form .login-button {
            display: block;
            width: 100%;
            font-weight: bold;
            background: linear-gradient(45deg, rgb(16, 137, 211) 0%, rgb(18, 177, 209) 100%);
            color: white;
            padding-block: 15px;
            margin: 20px auto;
            border-radius: 20px;
            box-shadow: rgba(133, 189, 215, 0.8784313725) 0px 20px 10px -15px;
            border: none;
            transition: all 0.2s ease-in-out;
        }

        .login-button{
            display: block;
            width: 100%;
            font-weight: bold;
            background: linear-gradient(45deg, rgb(16, 137, 211) 0%, rgb(18, 177, 209) 100%);
            color: white;
            padding-block: 15px;
            margin: 20px auto;
            border-radius: 20px;
            box-shadow: rgba(133, 189, 215, 0.8784313725) 0px 20px 10px -15px;
            border: none;
            transition: all 0.2s ease-in-out;
        }

        .form .login-button:hover {
            transform: scale(1.03);
            box-shadow: rgba(133, 189, 215, 0.8784313725) 0px 23px 10px -20px;
        }

        .form .login-button:active {
            transform: scale(0.95);
            box-shadow: rgba(133, 189, 215, 0.8784313725) 0px 15px 10px -10px;
        }

        .social-account-container {
            margin-top: 25px;
        }

        .social-account-container .title {
            display: block;
            text-align: center;
            font-size: 10px;
            color: rgb(170, 170, 170);
        }

        .social-account-container .social-accounts {
            width: 100%;
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 5px;
        }

        .social-account-container .social-accounts .social-button {
            background: linear-gradient(45deg, rgb(0, 0, 0) 0%, rgb(112, 112, 112) 100%);
            border: 5px solid white;
            padding: 5px;
            border-radius: 50%;
            width: 40px;
            aspect-ratio: 1;
            display: grid;
            place-content: center;
            box-shadow: rgba(133, 189, 215, 0.8784313725) 0px 12px 10px -8px;
            transition: all 0.2s ease-in-out;
        }

        .social-account-container .social-accounts .social-button .svg {
            fill: white;
            margin: auto;
        }

        .social-account-container .social-accounts .social-button:hover {
            transform: scale(1.2);
        }

        .social-account-container .social-accounts .social-button:active {
            transform: scale(0.9);
        }

        .agreement {
            display: block;
            text-align: center;
            margin-top: 15px;
        }

        .agreement a {
            text-decoration: none;
            color: #0099ff;
            font-size: 9px;
        }
    </style>
@endsection


{{-- <h1>Edit Profile</h1>

    @if (session('status'))
        <p>{{ session('status') }}</p>
    @endif

    <form method="POST" action="{{ route('user.update') }}">
        @csrf
        @method('PATCH')

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" required>
        @error('name')
            <p>{{ $message }}</p>
        @enderror

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        @error('email')
            <p>{{ $message }}</p>
        @enderror

        <label for="password">Password:</label>
        <input type="password" id="password" name="password">
        @error('password')
            <p>{{ $message }}</p>
        @enderror

        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" id="password_confirmation" name="password_confirmation">
        
        <button type="submit">Update Profile</button>
    </form>

    <form method="POST" action="{{ route('user.destroy') }}">
        @csrf
        @method('DELETE')

        <label for="password">Confirm Password for Deletion:</label>
        <input type="password" id="password" name="password" required>
        @error('password')
            <p>{{ $message }}</p>
        @enderror

        <button type="submit">Delete Account</button>
    </form> --}}
