<?php
return [
   "driver"    => "mysql",
   "host"      => "alumnes.insjoaquimmir.cat",
   "port"      => 9316,
   "database"  => "2daw.equip06",
   "user"      => "2daw.equip06",
   "password"  => "JXhNR*8J",
   "options"   => [
       PDO::MYSQL_ATTR_SSL_KEY                => __DIR__ . '/client-key.pem',
       PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false
   ]
];
//2daw.equip06@fp.insjoaquimmir.cat