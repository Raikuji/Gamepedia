# Partie 1

### Utilisation de microtime en PHP

```php
$time_start = microtime(true);
echo "Je patiente... <br>";
echo "Je patiente... <br>";
$elapsed_time = microtime(true) - $time_start;
echo "Temps écoulé : " . $elapsed_time . " secondes.";
```

#### Résultat 

```
Je patiente...
Je patiente...
Temps écoulé : 2.8610229492188E-6 secondes.
```


### Principes des index SQL

C'est une structure de données qui trie de manière ordonnées les valeurs sur lesquelles elle se rapporte. Il permet de faire des recherches plus rapides sur de grandes bases de données.

# Partie 2

### Structure des logs d'une query.


Résultat pour `Game::where('name', 'like', 'Mario%')->first();`
```php
array (size=1)
  0 => 
    array (size=3)
      'query' => string 'select * from `Game` where `name` like ? limit 1' (length=48)
      'bindings' => 
        array (size=1)
          0 => string 'Mario%' (length=6)
      'time' => float 14.8
```

### Problème des N+1 query 

Exemple lorsqu'on essaie d'obtenir toutes les livres d'une bibliothèque 

```sql
SELECT * from livre
```
et pour CHAQUE livre trouvé

```sql
select * from auteur where livreId = ?
```

Si on a 25 livres, on aura un total de 26 query. (ce qui est beaucoup). Le eager loading permet de réduire cela.




