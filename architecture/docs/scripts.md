Script list
===========

 + __scripts/cache-clean.sh [env]__ : Clean Redis, Drupal and Varnish cache.
 + __scripts/static-clean.sh [env]__ : Empty pub/static and var/view_preprocessed on non production environment.
 + __scripts/composer-requirements.sh__ : Add the composer requirements for Drupal 2.
 + __scripts/deploy.sh [env] [-p packageVersion or -b branch or -t tag]__ : Deploy the given version (or a specific tag or branch) on the target environment.
 + __scripts/generate-urn-catalog.sh__ : Generate the URN catalog for PHPStorm.
 + __scripts/install.sh [env]__ : Install Drupal on LXC using the Drupal setup.
 + __scripts/launch-test.sh__ : Launch the Drupal tests on the lxc environment.
 + __scripts/drupal.sh [env] [drupal:command] [params]__ : Launch the Drupal binary on the given environment. Ex: `bin/drupal.sh lxc cache:flush`
 + __scripts/grunt.sh [env] [task:themename]__ : Launch the Grunt command on the given environment. Ex: `bin/grunt.sh lxc exec:themename`
 + __scripts/permissions.sh [env]__ : Restore the file permissions on the given environment.
 + __scripts/provision.sh [env]__ : Install all needed components and configure them.
 + __scripts/set-maintenance.sh [env] [enable|disable]__ : Add or remove the maintenance flag.
 + __scripts/setup-upgrade.sh [env]__ : Launch the Drupal setup upgrade on the given environment.
 