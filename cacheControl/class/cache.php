<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 5/19/14
 * Time: 2:13 PM
 */

class cache {

        private $key;
        private $inputKey;

        function __construct() {
            $this->key = 'goF1ushY0ur5elfCl3an';
            $this->inputKey = $_GET['userKey'];


            switch($this->inputKey) {
                case $this->key:
                    $this->flush_cache();
                    break;
                default:
                    echo "Flusher not ready";
                    break;
            }
        }


        private function flush_cache() {
            $dirs = array(
                //'../downloader/.cache/',
                //'../downloader/pearlib/cache/*',
                //'../downloader/pearlib/download/*',
                //'../var/cache/',
                //'../var/locks/',
                //'../var/log/',
                //'../var/report/',
                //'../var/session/',
                '../var/full_page_cache/'
            );

            foreach($dirs as $dir) {

                $this->rrmdir($dir);
                echo $dir . '  ----------flushed<br />';
            }

        }

    private function rrmdir($dir) {
        if (is_dir($dir)) {
            $objects = scandir($dir);
            foreach ($objects as $object) {
                if ($object != "." && $object != "..") {
                    if (filetype($dir."/".$object) == "dir") $this->rrmdir($dir."/".$object); else unlink($dir."/".$object);
                }
            }
            reset($objects);
            rmdir($dir);

        }
    }
} 