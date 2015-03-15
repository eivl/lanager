<?php namespace Zeropingheroes\Lanager\Playlists;

use Zeropingheroes\Lanager\FlatResourceService;

class PlaylistService extends FlatResourceService {

	protected $resource = 'playlists';

	public function __construct( $listener )
	{
		parent::__construct($listener, new Playlist);
	}

}