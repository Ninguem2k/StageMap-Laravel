<center>
<center>
<h3>Criar o projeto Laravel:</h3>

    Laravel new StageMap

<h1>Usuario</h1>
Requisitos:
    
        #1 mysql
        #2 PHP 8+
        #3 Composer

Iniciar Sistema:

        php artisan serve - Iniciar o Servidor do Laravel

        php artisan migrate - Criar o banco de dados

Recurso ordered (ordered)

Endpoint: /ordereds

Endpoints:

    	GET /ordereds - Recuperar os ordereds;

    	GET /ordered/{id} - Recuperar um ordered em especifico;

    	POST /ordered - Criar um novo ordered;

    	PUT /ordered/{id} - Atualizar um ordered especifico;

    	DELETE /ordered/(id) - Remover um ordered específico;

    	PATCH /ordered/{id} - Atualizar parte de um protudo em especifico;

    	OPTIONS /ordered - Quais verbos eu posso utilizar em ordereds;

Filtros & Busca:

        http://127.0.0.1:8000/api/ordered?fields=name,price - Filtrar oque seja recebido;

        http://127.0.0.1:8000/api/ordered?coditions=price:>:0 - Condições para ser recebido

        http://127.0.0.1:8000/api/ordered?fields=name,price&coditions=price:<:0&page=2 - Junção dos dois paramentros + paginação

</center>
<center>

<h3>Gerar as Migrations, Controllers, Factorys, Seeds, Requests:</h3>
    
    php artisan make:model Client -a --api
    php artisan make:model Ordered -a --api
    php artisan make:model Product -a --api
    php artisan make:model Image -a --api
    php artisan make:model Stage -a --api
    php artisan make:migration Ordred_Stage 
    php artisan make:migration Stage_Product

</center>
</center>
</center>
# StageMap-Laravel
