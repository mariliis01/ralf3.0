<?php
namespace Deployer;

require 'recipe/laravel.php';

// Config
// Zone ühendus
set('application', 'Ralf');
set('remote_user', 'virt118420');
set('http_user', 'virt118420');
set('keep_release', 2);

host('ta22sink.itmajakas.ee')
    ->setHostname('ta22sink.itmajakas.ee')
    ->set('http_user', 'virt118420')
    ->set('deploy_path', '~/domeenid/www.ta22sink.itmajakas.ee/ralf')
    ->set('branch', 'main');

set('repository', 'git@github.com:mariliis01/ralf3.0.git');

//tasks

task('opcache:clear', function (){
    run('killall php82-cgi || true');
})->desc('Clear ocache');

task('build:node', function (){
    cd('{{release_path}}');
    run('npm i');
    run('npx vite build');
    run('rm -rf node_modules');
});

task('deploy', [
    'deploy:prepare',
    'deploy:vendors',
    'artisan:storage:link',
    'artisan:view:cache',
    'artisan:config:cache',
    'build:node',
    'deploy:publish',
    'opcache:clear',
    'artisan:cache:clear'
]);


// Hosts


// Hooks

after('deploy:failed', 'deploy:unlock');
