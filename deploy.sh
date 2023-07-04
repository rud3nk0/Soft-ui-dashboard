set -eu
set -o pipefail
echo "Deploy script started"
cd /usr/share/nginx/html/soft_ui_dashboard_laravel_free/ # go to project repository on the server
git fetch --all
php8.0 artisan down
git reset --hard origin/main
php8.0 /usr/local/bin/composer install --no-interaction #install php part
php8.0 artisan migrate:fresh --seed
php8.0 artisan optimize:clear
php8.0 artisan view:clear
php8.0 artisan route:clear
php8.0 artisan config:clear
php8.0 artisan view:cache
php8.0 artisan route:cache
php8.0 artisan storage:link
chown -R www-data:www-data /usr/share/nginx/html/soft_ui_dashboard_laravel_free/ #change here too project repository
php8.0 artisan up
source ~/.nvm/nvm.sh
npm install
npm run prod
echo "Deploy script finished execution"
