-Panterest


1- Creer un controlleur et modifier la route : symfony console make:controller pins
2- Creer une entite :  symfony console make:entity Pin
3- Modifier les infos d'acces a la bd (fichier .env) -> creation fichier .env.local
4- Creation bd : symfony console doctrine:database:create
5- Migration de la base de donnée crée : symfony console make:migration
6- Migration de la table crée : symfony console make:migration
7- Migration : symfony console doctrine:migrations:migrate
8- Creation de pins avec la console Psysh
9- Install : composer req theofidry/psysh-bundle --dev
10- PS C:\Users\ihiri\Documents\Panterest\Panterest> symfony console psysh
<aside>Psy Shell v0.10.6 (PHP 7.3.5 — cli) by Justin Hileman</aside>

>>> 2+2
=> 4
>>> ls
<strong>Variables</strong>: <public>$container</public>, <public>$kernel</public>, <public>$parameters</public>, <public>$self</public>
>>> dump(get_class($self))
"Psy\Shell"
=> "Psy\Shell"
>>> use App\Entity\Pin;
>>> $em = $container->get('doctrine')->getManager();
=> ContainerXsjbRG5\EntityManager_9a5be93 - Doctrine\ORM\EntityManager@proxy {#2765}
>>> $p1 = new Pin;
=> App\Entity\Pin {#2803}
>>> dump($p1)
App\Entity\Pin {#2803
  -id: null
  -title: null
  -description: null
}
=> App\Entity\Pin {#2803}
>>> $p1->setTitle('Pin 1')
=> App\Entity\Pin {#2803}
>>> $p1->setDescription('Description 1')
=> App\Entity\Pin {#2803}
>>> dump($p1)
App\Entity\Pin {#2803
  -id: null
  -title: "Pin 1"
  -description: "Description 1"
}
=> App\Entity\Pin {#2803}
>>> $em->persist($p1)
=> null
>>> $em->flush()
=> null


11- Les infos sont entrés dans la bd par l'outil precedent
12- Exemple de selection des données depuis la base de données : 

Dans le controlleur :

public function index(PinRepository $pinRepository)
    {

        $pins = $pinRepository->findAll();
        
        return $this->render('pins/index.html.twig',compact('pins'));
    }


Dans le twig :

{% for pin in pins %}
<article>

<h2>{{ pin.title }}</h2>
<p>{{ pin.description }}</p>

</article>


13- Creer un form : symfony console make:form

14- Ajuster les assets : composer req encore

15- Compile les assets : yarn encore dev --watch

16- Ajouter l' bootstrap : yarn add bootstrap --dev

17- Ajouter l' Jquery : yarn add jquery popper.js


18- Ajouter un champs dans une entité existant :
PS C:\Users\ihiri\Documents\Panterest\Panterest> symfony console make:entity Pin

 Your entity already exists! So let's add some new fields!

 New property name (press <return> to stop adding fields):
 > imageName

 Field type (enter ? to see all types) [string]:
 >

 Field length [255]:
 >

 Can this field be null in the database (nullable) (yes/no) [no]:
 > yes

 updated: src/Entity/Pin.php

 Add another property? Enter the property name (or press <return> to stop adding fields):
 >



  Success!


 Next: When you're ready, create a migration with php bin/console make:migration

PS C:\Users\ihiri\Documents\Panterest\Panterest> symfony console make:migration

 [WARNING] You have 1 previously executed migrations in the database that are not registered migrations.

 Are you sure you wish to continue? (yes/no) [yes]:
 >



  Success!


 Next: Review the new migration "migrations/Version20210215120846.php"
 Then: Run the migration with php bin/console doctrine:migrations:migrate
 See https://symfony.com/doc/current/bundles/DoctrineMigrationsBundle/index.html
PS C:\Users\ihiri\Documents\Panterest\Panterest> symfony console doctrine:migrations:migrate

 WARNING! You are about to execute a migration in database "panterest" that could result in schema changes and data loss. Are you sure you wish to continue? (yes/no) [yes]:
 > yes

 [WARNING] You have 1 previously executed migrations in the database that are not registered migrations.

 >> 2021-02-06 18:57:42 (DoctrineMigrations\Version20210206175429)

 Are you sure you wish to continue? (yes/no) [yes]:
 > yes

[notice] Migrating up to DoctrineMigrations\Version20210215120846
[notice] finished in 7267.1ms, used 20M memory, 1 migrations executed, 1 sql queries

PS C:\Users\ihiri\Documents\Panterest\Panterest>


19- Ajouter des images a la base de donnée : composer require vich/uploader-bundle