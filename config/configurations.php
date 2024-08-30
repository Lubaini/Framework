<?php 

// -------------------------DATABASE CONNECTION
/*
 **UNCOMENT TO USE DB CONNECTION
 */
$SERVER['driver']   = 'mysql';
$SERVER['host']     = '127.0.0.1';
$SERVER['db']       = 'meru_db';
$SERVER['username'] = 'root';
$SERVER['password'] = '';

define('SERVER', $SERVER, FALSE);

#development or production
$SYSTEM['ENVIRONMENT'] = 'development';

if (isset($SYSTEM['ENVIRONMENT'])) {

    define('ENVIRONMENT', $SYSTEM['ENVIRONMENT'], FALSE);
}