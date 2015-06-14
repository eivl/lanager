<?php namespace Zeropingheroes\Lanager\Core\Domain\User;

use Zeropingheroes\Lanager\Core\Domain\Entity;
use DomainException;

class User extends Entity {

	public $id;

	public $username;

	public function __construct( $username )
	{
		if ( empty( $username ) AND $username !== '0' AND $username !== 0 )
			throw new DomainException( 'Username is required' );

		$this->username = (string) $username;
	}
}
