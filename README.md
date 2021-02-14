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
