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



