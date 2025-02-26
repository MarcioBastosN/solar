## About
<!-- docker-compose up  / para rodar os containeres-->docker exec 

* 1º composer install
* 2º php artisan key:generate
* config .env
    
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

* 3º npm install

<!-- iniciar o container -->
* 5° docker compose up -d --build

<!-- parando o conainer -->
    docker compose down
====
<!-- rodando o banco e os seeds -->
* sudo  docker compose exec app php artisan migrate --seed

<!-- rodando o livewire -->
* sudo docker compose exec app npm rum build


======================
.env
FILESYSTEM_DISK=public
