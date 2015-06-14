<?php namespace Zeropingheroes\Lanager\Core\Domain\Role;

use Zeropingheroes\Lanager\Core\Domain\ValueObject;
use DomainException;

class Role extends ValueObject {

	private $name;

	public function __construct( $name )
	{
		if ( empty( $name ) )
			throw new DomainException( 'Name is required' );

		$this->name = (string) $name;
	}

	public function __toString()
	{
		return $this->name;
	}

	public function equals( Role $role )
	{
		return strtolower( (string) $this ) === strtolower( (string) $role );
	}

}
