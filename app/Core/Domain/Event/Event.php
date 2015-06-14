<?php namespace Zeropingheroes\Lanager\Core\Domain\Event;

use Zeropingheroes\Lanager\Core\Domain\Entity;
use DomainException;
use DateTime;

class Event extends Entity {

	public $id;

	public $title;

	public $start;

	public $end;

	public $description;

	public function __construct( $title, DateTime $start, DateTime $end )
	{
		if ( empty( $title ) )
			throw new DomainException( 'Title is required' );

		if ( $start > $end )
			throw new DomainException( 'Start must be before end' );

		$this->title = (string) $title;

		$this->start = $start;

		$this->end = $end;
	}
}
