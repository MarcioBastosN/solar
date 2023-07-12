## About

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

* 3º npm install
* 4º npm run dev

* 5° docker-compose up -d --build

====
rodando o banco e os seeds
* docker-compose exec app php artisan migrate --seed


======================
.env
FILESYSTEM_DISK=public
