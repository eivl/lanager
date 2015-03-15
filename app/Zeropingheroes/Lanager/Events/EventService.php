<?php namespace Zeropingheroes\Lanager\Events;

use Zeropingheroes\Lanager\FlatResourceService;

class EventService extends FlatResourceService {

	protected $resource = 'events';

	public function __construct( $listener )
	{
		parent::__construct($listener, new Event);
	}

}