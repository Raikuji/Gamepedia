#### json_encode()

Un objet d'un modèle Eloquent retourne un objet JSON.

Un ensemble d'object de modèle Eloquent retourne un tableau d'objet JSON.

#### $_GET et $_POST

```php
$app->get('/mon/url/:get', function($get){
    //j'utilise le $get
});

$app->post('/mon/url/:post', function($post){
    //j'utilise le $post
});
```
#### SLIM Code retour et Header

+ Code retour

```php
$app = new Slim();
$app->response->setStatus(200);
```

+ Header
```php
$app = new Slim();
$app->response->headers->set('Content-Type, 'application/json);
```


