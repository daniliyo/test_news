1. Clone to your directory
2. Go to your directory
3. Run in terminale next commands
4. `docker-compose build`
5. `docker-compose up -d`
6. `docker exec -it dnews_php /bin/sh`
7. In php container run next commands
8. `composer install`
9. `cp .env.example .env`
10. `php artisan key:generate`
11. `chmod -R 777 storage`

Use this data for connect to database. Put it in .env file (which located in src directore)
`DB_CONNECTION=mysql`
`DB_HOST=mysql`
`DB_PORT=3306`
`DB_DATABASE=news`
`DB_USERNAME=admin`
`DB_PASSWORD=123456`

12. Continue to run next commands
13. `php artisan migrate --seed`
14. `npm install`
15. `npm run`
16. `npm run build`

URL http://localhost:8000/

Manager page - http://localhost:8000/manager
