<?php namespace Zeropingheroes\Lanager\Core\Domain\Shout;

use Zeropingheroes\Lanager\Core\Domain\Entity;
use Zeropingheroes\Lanager\Core\Domain\User\User;

class Shout extends Entity {

	public $id;

	public $poster;

	public $message;

	public function __construct( User $user, $message )
	{
		$this->poster = $user;

		$this->message = (string) $message;
	}
}
