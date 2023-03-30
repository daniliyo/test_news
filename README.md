1. Clone to your directory
2. Go to your directory
3. Run in terminale next commands
3.1. `docker-compose build`
3.2. `docker-compose up -d`
3.3. `docker exec -it dnews_php /bin/sh`
3.3.1. In php container run next commands
3.3.2. `composer install`
3.3.3. `cp .env.example .env`
3.3.4. `php artisan key:generate`
3.3.5. `chmod -R 777 storage`
Use this data for connect to database. Put it in .env file (which located in src directore)
`DB_CONNECTION=mysql`
`DB_HOST=mysql`
`DB_PORT=3306`
`DB_DATABASE=news`
`DB_USERNAME=admin`
`DB_PASSWORD=123456`
3.3.6. Continue to run next commands
3.3.6. `php artisan migrate --seed`
3.3.7. `npm install`
3.3.8. `npm run`
3.3.9. `npm run build`

URL http://localhost:8000/
Manager page - http://localhost:8000/manager