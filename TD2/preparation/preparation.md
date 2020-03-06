## Schéma

Categorie(__id__, nom, description)  
Annonce(__id__, titre, date, texte)  
Photo(__id__, file, date, taille_objet, #id_annonce)  
Type(__#id_annonce__, __#id_categorie__)  

## Méthodes

```php
class Annonce extends \Illuminate\Database\Eloquent\Model
  {
   protected $table='annonce';
   protected $primaryKey='id';
   
   public function photos() {
      return $this->hasMany('models\photo', 'id_annonce');
   }
   
   public function categories() {
        return $this->belongsToMany('models\categories', 'annonce2Categ', 'id_annonce', 'id_categorie');
   }
  }

class Photo extends \Illuminate\Database\Eloquent\Model
  {
   protected $table='photo';
   protected $primaryKey='id';

    public function annonce() {
        return $this->belongsTo('models\annonce', 'id_annonce');
    }
  }

class Categorie extends \Illuminate\Database\Eloquent\Model
  {
   protected $table='categorie';
   protected $primaryKey='id';
   
   public function annonces() {
        return $this->belongsToMany('models\categories', 'annonce2Categ', 'id_categorie', 'id_annonce');
   }
  }
```

```php

$q1 = Annonce::where('id', '=', '22')->first();
$q1->photos()->get();

$q2 = $q1->photos()
    ->where('taille_octet', '>', 100000)
    ->get();

$q3 = Annonce::has('photos', '>', '3')->get();

$q4 = Annonce::whereHas('photos', function($q) {
    $q->where('taille_octet', '>', '1000000');
})->get();

```

```php

$photo = new Photo();
$photo->file = $file;
$photo->date = $date;
$photo->taille_octet = $taille_octet;

```


