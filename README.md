<!-- 
    se for necessarios instalar o docker-compose antes usar o arquivo rode 
    ./install_docker
 -->

## About
<!-- docker-compose up  / para rodar os containeres-->

<!-- iniciar o container -->
* 
    docker-compose up -d --build

<!-- parando o conainer -->
    docker-compose down

<!-- ====================================== -->

* 1º 
    docker-compose exec app composer install

* 2º 
    docker-compose exec app npm install

* 3º 
    docker-compose exec app php artisan key:generate

* 3º  
    config .env
    {
        DB_CONNECTION=pgsql
        DB_HOST=db
        DB_PORT=5432
        DB_DATABASE=solar
        DB_USERNAME=postgres
        DB_PASSWORD=postgres
    }
    {
        MAIL_MAILER=smtp
        MAIL_HOST=sandbox.smtp.mailtrap.io
        MAIL_PORT=2525
        MAIL_USERNAME=config
        MAIL_PASSWORD=config
    }
    {
        FILESYSTEM_DISK=public
    }

<!-- rodando o banco e os seeds -->
* 4º
    docker-compose exec app php artisan migrate --seed

<!-- rodando o livewire -->
* 5º
    docker-compose exec app npm rum build

======================
.env
FILESYSTEM_DISK=public
