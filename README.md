
## Clone Repo
git clone https://github.com/jbpablo/vue-crud.git
cd vue-crud


## Install composer
composer install

## Install NPM
npm install
npm run dev

## .env Config
copy your .env.example to .env and setup your desired database connection.

## Run Artisan Commands
php artisan migrate
php artisan db:seed
php artisan route:cache
php artisan config:clear




