# CODE QUIZZ
## MES FONCTIONNALITES
### Register

1. Register
Pour permettre à l'utilisateur de creer un compte sur mon site j'ai créer un controller *RegisterController* dans un dossier **Auth**. Ce controller contient une classe `RegisterController` dans lequel j'ai deux fonctionnalités (methodes) `index` et `store`.
   
   * La methode `index` permet de retourner la vue d'inscription `auth.register`. Cette méthode est utilisé dans une route dans le fichier `web.php` avec une méthode **get** avec pour *name* ('register') et un midleware ('guest').
    ```php
    public function index() {
        return view('auth.register');
    }
    ```

   * La methode `store` prends d'abord en paramètre `RegisterRequest` qui est une classe qui contient les methodes ou les règles de validation. Ensuite cette methode (`store`) permet de creer un nouveau utilisateur avec son ``name``, son ``email`` et son mot de passe ``password`` crypté. Une fois l'utilisateur à creer son compte il sera directement connecté et redirigé sur la pages des quizzs `quizzes.index`.
    ```php
        public function store(RegisterRequest $request){
        $validated = $request->validated();
        
        // creér le nouvel utilisateur
        User::create([
            "name" => $validated["name"],
            "email" => $validated["email"],
            "password" => bcrypt($validated["password"]),
        ]);
        // Connecter l'utilisateur
        $user = User::where('email', $validated["email"])->firstorFail();
        Auth::login($user);
        // rediriger l'utilisateur
        return redirect()->route('quizzes.index');
        // dd($validated);
    }
    ```

### Login & Logout

1. Pour la connexion et la deconnexion j'ai creer un controller ``SessionController`` qui comporte trois fonctionnalité, ``authenticate``, ``logout`` et ``editProfile``. Ces différentes fonctionnatlités vont permettre à l'utilisateur de respectivement se connecter, se déconnecter et de pouvoir modifié son profile.

### is_admin
* Pour ajouter un utilisateur en tant qu'admin, je suis passé par différents étapes. D'abord j'ai créé un AdminMidlleware qui contient une fonctionnalité ``handle``. Cette fonctionnalité vérifie si un utilisateur est un admin et le redirige sur la vue principal.
```php
  public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && auth()->user()->is_admin) {
            return $next($request);
        }
        return redirect('/'); 
    }
````



* Un utilisateur admin peut avoir accès a un bouton admin Dashboard où il peut avoir accès à plusieurs données sur les utilisateurs du site et sera aussi le seul à pouvoir ajouté des quizz sur le site.
* Pour ajouter un utilisateur en tant qu'admin je passe par ``php artisan tinker``. 
  
  J'utilise la méthode `find` pour chercher l'utilisateur par id.
  ```bash
  $user = User::find(1); // 1 si l'utilisateur à pour id 1
  ```
  Je mets a jour la colonne is_admin puis je sauvegarde.
  ```bash
  $user->is_admin = true;
  $user->save();
  ```
(Je pense ajouter une fonctionnalité pour permettre à l'admin d'ajouter directement un utilisateur en tant qu'admin)