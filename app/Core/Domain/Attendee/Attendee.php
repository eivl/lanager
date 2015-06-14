<?php namespace Zeropingheroes\Lanager\Core\Domain\Attendee;

use Zeropingheroes\Lanager\Core\Domain\Entity;
use DomainException;

class Attendee extends Entity {

	public $id;

	public $username;

	public $avatar;

	public function __construct( $username )
	{
		if ( empty( $username ) AND $username !== '0' AND $username !== 0 )
			throw new DomainException( 'Username is required' );

		$this->username = (string) $username;
	}
}
