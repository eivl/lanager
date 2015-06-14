<?php namespace Zeropingheroes\Lanager\Core\Domain\Shout;

use Zeropingheroes\Lanager\Core\Domain\Entity;
use Zeropingheroes\Lanager\Core\Domain\Attendee\Attendee;

class Shout extends Entity {

	public $id;

	public $poster;

	public $message;

	public function __construct( Attendee $attendee, $message )
	{
		$this->poster = $attendee;

		$this->message = (string) $message;
	}
}
