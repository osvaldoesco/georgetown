<?php
namespace Deployer;

require 'recipe/laravel.php';

set('repository', 'git@github.com:osvaldoesco/georgetown.git');
set('git_tty', true);
set('allow_anonymous_stats', false);

set('shared_files', [
    '.env'
]);

set('shared_dirs', [
    'public/storage'
]);

set('writable_dirs', [
    'bootstrap/cache',
    'storage'
]);

host('68.183.21.102')
    ->user('deploy')
    ->forwardAgent()
    ->set('branch', 'develop')
    ->stage('development')
    ->set('deploy_path', '/home/deploy/public/georgetown');

host('68.183.21.102')
    ->user('deploy')
    ->forwardAgent()
    ->set('branch', 'master')
    ->stage('production')
    ->set('deploy_path', '/home/deploy/public/georgetown');

// Restart PHP-FPM service
desc('Restart PHP-FPM service');
task('php-fpm:restart', function () {
    run('sudo /usr/sbin/service php7.0-fpm restart');
});

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.
after('deploy:symlink', 'php-fpm:restart');
before('deploy:symlink', 'artisan:migrate');

desc('Clean cache config');
task('artisan:config:clear', function () {
    run('{{bin/php}} {{release_path}}/artisan config:clear');
});

after('php-fpm:restart', 'artisan:config:clear');