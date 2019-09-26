<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Steps to complete

1. Make a fork of the laravel/laravel repo to your own github account

2. Modify the fork to add a new Artisan console command

3. Make artisan command send a simple POST request to given endpoint

4. It is very critical that the request reaches the destination, take all necessary steps to ensure reliable delivery

## Deployment notes

Update the env configurations accordingly and configure the parameters for the job (config/doRequestJob.php)

Also remember to create the schema before running the migrations.

1. Install composer dependencies
1. Run migrations
2. Start the queue ``php artisan queue:work``
3. Execute the command on another window ``php artisan incFileCommand:send``
4. Check the queue and logs to track status
