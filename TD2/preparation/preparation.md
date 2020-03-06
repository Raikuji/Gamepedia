## Schéma

Categorie(__id__, nom, description)  
Annonce(__id__, titre, date, texte)  
Photo(__id__, file, date, taille_objet, #id_annonce)  
Type(__#id_annonce__, __#id_categorie__)  

## Méthodes

```
class Annonce extends \Illuminate\Database\Eloquent\Model
  {
   protected $table='annonce';
   protected $primaryKey='id';
   
   public function photos() {
      return $this->hasMany('models\photo', 'id');
   }
   
   public function categories() {
        return $this->hasMany('models\categorie', 'id);
   }
  }

class Photo extends \Illuminate\Database\Eloquent\Model
  {
   protected $table='photo';
   protected $primaryKey='id';

    public function annonce() {
        return $this->belongsTo('models\annonce', 'id);
    }
  }

class Categorie extends \Illuminate\Database\Eloquent\Model
  {
   protected $table='categorie';
   protected $primaryKey='id';
   
   public function annonces() {
      return $this->hasMany('models\annonce', 'id');
   }
  }

```