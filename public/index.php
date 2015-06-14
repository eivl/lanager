<?php namespace Zeropingheroes\Lanager\Core\Domain;

require '../vendor/autoload.php';

$attendee = new Attendee\Attendee( 'ilumos' );

$shout = new Shout\Shout( $attendee, 'Hello LAN');

var_dump($shout);
