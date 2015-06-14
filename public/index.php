<?php namespace Zeropingheroes\Lanager\Core\Domain;

use DateTime;

require '../vendor/autoload.php';

$user = new User\User( 'ilumos' );

$shout = new Shout\Shout( $user, 'Hello LAN');

$event = new Event\Event( 'Pizza Time', new DateTime('2015-06-14 14:00:00'), new DateTime('2015-06-14 18:00:00') );

$guide = new Guide\Guide( 'LAN Party Rules', 'No diving' );

$achievement = new Achievement\Achievement( 'Bonk!', 'Drink 5 caffinated beverages' );

$lan = new Lan\Lan( 'Zero Ping Heroes LAN 13', new DateTime('2015-06-12 18:00:00'), new DateTime('2015-06-14 18:00:00') );

$role = new Role\Role( 'Administrator' );

var_dump( $role );
