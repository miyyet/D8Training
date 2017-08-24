<?php

/**
 * @file
 * Contains \DrupalProject\composer\ScriptHandler.
 */

namespace DrupalProject\composer;

use Composer\Script\Event;
use Symfony\Component\Filesystem\Filesystem;

class ScriptHandler
{

    protected static $drupal_web_dir = '/src';

    protected static $default_dir_list = [
        'modules',
        'profiles',
        'themes',
    ];

    protected static $composer_json_mask_list = ['/sites/*/composer.json','/profiles/*/composer.json'];

    protected static function getDrupalRoot($project_root)
    {
        return $project_root . self::$drupal_web_dir;
    }

    public static function createRequiredFiles(Event $event)
    {
        $fs = new Filesystem();
        $project_root = getcwd();
        $root = static::getDrupalRoot($project_root);

        // Required for unit testing
        foreach (self::$default_dir_list as $dir) {
            if (!$fs->exists($root . '/' . $dir)) {
                $fs->mkdir($root . '/' . $dir);
                $fs->touch($root . '/' . $dir . '/.gitkeep');
            }
        }

        // Create the files directory with chmod 0775
        if (!$fs->exists($root . '/sites/default/files')) {
            $oldmask = umask(0);
            $fs->mkdir($root . '/sites/default/files', 0775);
            umask($oldmask);
            $event->getIO()->write('Create a sites/default/files directory with chmod 0775');
        }

        // Execute composer install defined on array $composer_json_mask_list
        $composerPathListToExec = array();
        foreach(self::$composer_json_mask_list as $composer_json_mask){
            $currentComposerList = glob($root.$composer_json_mask);
            if(is_array($currentComposerList)){
                $composerPathListToExec = array_merge($composerPathListToExec,$currentComposerList);
            }
        }
        if ($composerPathListToExec) {
            foreach ($composerPathListToExec as $composerPathToExec){
                exec('cd ' . dirname($composerPathToExec) . ' && composer install && cd -');
                $event->getIO()->write('Composer lauched on ' . $composerPathToExec);
            }
        }

        if ($fs->exists($project_root . '/bin/spbuilder')) {
            // Init spbuilder
            if (!$fs->exists($project_root . '/.spbuilder.yml')) {
                static::initSpbuilder();
            }
        }
    }

    protected static function initSpbuilder()
    {
        exec('bin/spbuilder init drupal8');
    }

}
