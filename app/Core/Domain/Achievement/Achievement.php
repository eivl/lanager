<?php namespace Zeropingheroes\Lanager\Core\Domain\Achievement;

use Zeropingheroes\Lanager\Core\Domain\Entity;
use DomainException;

class Achievement extends Entity {

	public $id;

	public $name;

	public $description;

	public function __construct( $name, $description = '' )
	{
		if ( empty( $name ) )
			throw new DomainException( 'Name is required' );

		$this->name = (string) $name;

		$this->description = (string) $description;

	}
}
