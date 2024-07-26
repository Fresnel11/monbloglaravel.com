## Contraintes MySQL

  ```php
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

  ```

  - `onDelete('cascade')`:
  * cela définit le comportement à adopter lors de la suppression d'un enrégistrement dans la table `users`
  * `onDelete('cascade')` signifie que si un enregistrement est supprimé dans la table `users`, tous les enrégistrements dans la table `comments` seront également supprimés
  
## Valeurs possibles

1- `cascade`: supprime les enregistrements enfants associés lorsque l'enregistrement parent est supprimé
2- `set null`: définit la clé étrangère sur `NULL` dans les enregistrements enfants associés lorsque l'enregistrement parent est supprimé. Cela nécessite que la colonne de la clé étrangère soit nullable.
3- `restrict`: empêche la suppression de l'enregistrement parent tant qu'il y a des enregistrements enfant associés.
4- `no action`: aucune action spécifique n'est entreprise sur les enregistrements enfants. si vous essayez de supprimer un enregistrement parent qui a des enfants, cela entraînera des erreurs.
5- `set default`: définit la clé étrangère sur sa valeur par défaut lorsqu'un enrégistrement parent est supprimé.

## Les noms de route recommandé

Une ressource a par défaut 7 routes (IndexCreateStoreShowEditUpdateDelete). Laravel recommande par défaut des noms de route suivant pour une ressource "articles":

```php
|Verbe HTTP  |  Chemin                     |                Action
|------------|----------------|----------------------|
|GET         |       /articles                  |  index|
|GET         |       /articles/create           |  create|
|POST        |      /articles                  |  store|
|GET         |       /articles/{article}        |  show|
|GET         | /articles/{article}/edit   |  edit|
|PUT/PAT|    | /articles/{article}        |  update|
|DETELETE    | /articles/{article}        |  destroy|

## Liens symboliques

Un lien symbolique (ou symlink) est un type de fichier spécial qui pointe vers un autre fichier ou répertoire. Il agit comme un raccourci, permettant d'accéder au fichier ou au répertoire cible en passant par le lien symbolique.