<?php
namespace Deployer;

require 'recipe/symfony.php';

require_once(__DIR__ .'/readEnv.php');
$env = new \readEnv();
$env->convertEnv('.deploy_env');

// Project name
set('application', $env->getEnv('DEPLOY_APPLICATION'));
set('default_timeout', $env->getEnv('DEPLOY_TIMEOUT') ?? 2000);
set('git_tty', true);
add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);
set('deploy_path', $env->getEnv('DEPLOY_PATH_LOCAL'));

if($env->getEnv('DEPLOY_ENV') === 'production'){
    # setup deploy host in here
    host($env->getEnv('DEPLOY_HOST'))
    ->user($env->getEnv('DEPLOY_USER'))
    ->port($env->getEnv('DEPLOY_PORT')) //68 : qa - 70 : dev
    ->identityFile($env->getEnv('DEPLOY_CERTIFICATE'))
    ->set('deploy_path', $env->getEnv('DEPLOY_PATH'))
    ->set('permission', $env->getEnv('DEPLOY_PERMISSION'))
    ->multiplexing(true);
}

task('deploy:dev', [
    'deploy:chown-directory',
    'deploy:maintenance-start',
    'deploy:git',
//    'deploy:migrate-rollback',
//    'deploy:migrate',
//    'deploy:install-server',
//    'deploy:start-supervisor',
//    'deploy:vendors',
//    'deploy:node',
    'deploy:build',
    'deploy:upload',
//    'deploy:mkdir-framework',
//    'deploy:make-logs',
    'deploy:clear-cache',
//    'deploy:permission',
    'deploy:chmod',
    'deploy:maintenance-stop'
]);

task('deploy:git', function(){ // Install vendors by composer
    try {
        $path = get('deploy_path');
        run("cd \"{$path}\" && sudo git checkout .");
//        run("cd \"{$path}\" && git add .");
//        run("cd \"{$path}\" && git commit -m \"auto-commit-by-deployer\" ");
        run("cd \"{$path}\" && sudo git pull origin master");
    } catch (\Symfony\Component\Process\Exception\ProcessFailedException $e) {
        writeln($e->getMessage());
    }
});

task('deploy:migrate-rollback', function(){ // Install vendors by composer
    try {
        $path = get('deploy_path');
        run("cd \"{$path}\" && php artisan migrate:rollback");
    } catch (\Symfony\Component\Process\Exception\ProcessFailedException $e) {
        writeln($e->getMessage());
    }
});

task('deploy:migrate', function(){ // Install vendors by composer
    try {
        $path = get('deploy_path');
        run("cd \"{$path}\" && php artisan migrate");
    } catch (\Symfony\Component\Process\Exception\ProcessFailedException $e) {
        writeln($e->getMessage());
    }
});

task('deploy:vendors', function(){ // Install vendors by composer
    try {
        $path = get('deploy_path');
        run("cd \"{$path}\" && COMPOSER_PROCESS_TIMEOUT=2000 composer update");
    } catch (\Symfony\Component\Process\Exception\ProcessFailedException $e) {
        writeln($e->getMessage());
    }
});

task('deploy:node', function(){ // Install node modules
    $path = get('deploy_path');
    run("cd \"{$path}\" && npm install");
});

task('deploy:build', function(){ // Build frontend
    $path = get('deploy_path');

    # code...
    run("cd \"{$path}\" && npm run build-vendors");
    run("cd \"{$path}\" && npm run build-backend");
    run("cd \"{$path}\" && npm run build-client");
    run("cd \"{$path}\" && npm run build-helper");
    run("cd \"{$path}\" && npm run build");
})->local();

//task('deploy:make-logs', function(){ // Build frontend
//    $path = get('deploy_path');
//    # code...
//    run("cd \"{$path}\" && sudo mkdir storage/framework");
//    run("cd \"{$path}\" && sudo mkdir storage/framework/cache");
//    run("cd \"{$path}\" && sudo mkdir storage/framework/sessions");
//    run("cd \"{$path}\" && sudo mkdir storage/framework/views");
//});

task('deploy:mkdir-framework', function(){ // Build frontend
    $path = get('deploy_path');
    # code...
    run("cd \"{$path}\" && sudo mkdir storage/framework");
    run("cd \"{$path}\" && sudo mkdir storage/framework/cache");
    run("cd \"{$path}\" && sudo mkdir storage/framework/sessions");
    run("cd \"{$path}\" && sudo mkdir storage/framework/views");
});

task('deploy:upload', function(){
    writeln('Upload...');
    $path = get('deploy_path');
    $uploads = [
//        "deploy" => "{$path}//deploy",
        "public//assets" => "{$path}//public//assets",
    ];
    foreach ($uploads as $rootPath => $upload) {
        upload("{$rootPath}//", $upload);
    }
//    run("sudo chmod -R 755 " . $path . "deploy");
});

task('deploy:install-server', function(){
    writeln('start install server...');
    $path = get('deploy_path');

    run("/{$path}/deploy/install-server.sh");
});

task('deploy:start-supervisor', function(){
    writeln('start supervisor...');
    $path = get('deploy_path');

    run("/{$path}/deploy/start-server.sh");
});

task('deploy:chmod', function(){
    writeln('Change Mod...');
    $path = get('deploy_path');
    run("sudo chmod -R 777 " . $path . "storage/app/public/");
});

task('deploy:chown-directory', function(){
    writeln('Change chown directory...');
    $path = get('deploy_path');
    $permission = get('permission');
    run("sudo chown -R " . $permission . " " . $path);
});

task('deploy:permission', function(){
    writeln('Change permission...');
    $permission = get('permission');
    run('chown -R '.$permission.' '.get('deploy_path'));
    run('chown root:root ~/.ssh/authorized_keys');
});

task('deploy:clear-cache', function(){
    $path = get('deploy_path');
    run("cd \"{$path}\" && php artisan cache:clear");
    run("cd \"{$path}\" && php artisan view:clear");
    run("cd \"{$path}\" && composer dump-autoload");
});

task('deploy:maintenance-start', function(){ // Install vendors by composer
    $path = get('deploy_path');
    run("cd \"{$path}\" && php artisan maintenance:run true");
});

task('deploy:maintenance-stop', function(){ // Install vendors by composer
    $path = get('deploy_path');
    run("cd \"{$path}\" && php artisan maintenance:run false");
});


after('deploy:failed', 'deploy:restore');