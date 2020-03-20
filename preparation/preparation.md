####  Installation de Faker

```
composer require fzaninotto/faker
```

#### Donnez un exemple de code pour générer une adresse américaine en utilisant faker

```php
$faker = Faker\Factory::create();
echo $faker->address;
```

#### Formattez une date en type DateTime : "2017/02/16 (16:15)"

```php
$faker = Faker\Factory::create();
echo $faker->date($format = 'Y/m/d', $max = 'now');
echo $faker->time($format = 'H:i', $max = 'now');
```



