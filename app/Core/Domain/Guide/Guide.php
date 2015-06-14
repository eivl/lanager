<?php namespace Zeropingheroes\Lanager\Core\Domain\Guide;

use Zeropingheroes\Lanager\Core\Domain\Entity;
use DomainException;
use DateTime;

class Guide extends Entity {

	public $id;

	public $title;

	public $body;

	public function __construct( $title, $body )
	{
		if ( empty( $title ) )
			throw new DomainException( 'Title is required' );

		if ( empty( $body ) )
			throw new DomainException( 'Body is required' );

		$this->title = (string) $title;

		$this->body = (string) $body;

	}
}
