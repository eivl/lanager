<?php namespace Zeropingheroes\Lanager\Core\Domain;

require '../vendor/autoload.php';

$attendee = new Attendee\Attendee( 'ilumos' );

$shout = new Shout\Shout( $attendee, 'Hello LAN');

$start = new \DateTime('2015-06-14 14:00:00');
$end = new \DateTime('2015-06-14 18:00:00');

$event = new Event\Event( 'Pizza Time', $start, $end );

var_dump($event);
