<?php namespace Zeropingheroes\Lanager\Core\Domain\Lan;

use Zeropingheroes\Lanager\Core\Domain\Entity;
use DomainException;
use DateTime;

class Lan extends Entity {

	public $id;

	public $name;

	public $start;

	public $end;

	public $description;

	public function __construct( $name, DateTime $start, DateTime $end )
	{
		if ( empty( $name ) )
			throw new DomainException( 'Name is required' );

		if ( $start > $end )
			throw new DomainException( 'Start must be before end' );

		$this->name = (string) $name;

		$this->start = $start;

		$this->end = $end;
	}
}
