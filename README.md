# ComPredict Code Challenge

## Steps to run this project locally:

1. Clone the repo :
```ini
git clone git@github.com:ehababoshehab/compredict.git
```

2. Copy `.env.example` to `.env`

3. Run `composer install`

4. Run `npm install`

5. Run `npm run dev`

6. Run `./vendor/bin/sail up -d`

7. RUN `docker ps`
```ini
NAMES
compredict_web_1
compredict_mysql_1
```

### Enter the container
8. RUN `docker exec -it compredict_web_1 /bin/sh`

9. RUN `php artisan migrate:fresh --seed`

10. RUN `exit` to exit from the Container
### Exited

11. You will be able to navigate to the app from `http://localhost/`

## Note : Make sure the ports 80 and 3306 are not busy on your system
