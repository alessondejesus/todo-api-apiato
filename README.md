1 - composer install 2x
2 - ./vendor/bin/sail up (requer seu docker rodando)
3 - sail artisan migrate --seed
4 - sail artisan passport:install (copia o segundo mesmo, de id 2, para o .env)
5 - pronto, agora so partir pro vue
6 - sail artisan route:list ajuda tbm...


default user = admin@admin.com
default senha = admin

Aqui nao da pra criar usuarios, alterar os TODO, status deles, etc..
Pq? pq tive que dar prioridade a outras coisas

Aqui usei arquitetura PORTO junto com APIATO, ele da varios comandos e a arquitetura agiliza algumas coisas... 
