<?php namespace Zeropingheroes\Lanager\Domain\Orders;

use Zeropingheroes\Lanager\Domain\ResourceService;
use \DomainException;

class OrderService extends ResourceService {

	protected $model = 'Zeropingheroes\Lanager\Domain\Orders\Order';

	protected $orderBy = [ ['created_at', 'asc'], ['user_id', 'asc'] ];

	public function store( $input )
	{
		$this->setUser();

		$input['user_id'] = $this->user->id();
		$input['paid'] = false;

		return parent::store( $input );
	}

	protected function readAuthorised()
	{
		return $this->user->isAuthenticated();
	}

	protected function storeAuthorised()
	{
		return $this->user->isAuthenticated();
	}

	protected function updateAuthorised()
	{
		return $this->user->hasRole('Orders Admin');
	}

	protected function destroyAuthorised()
	{
		return $this->user->hasRole('Orders Admin');
	}

	protected function validationRulesOnStore( $input )
	{
		return [
			'user_id'		=> [ 'required', 'numeric', 'exists:users,id' ],
			'product_id'	=> [ 'required', 'numeric', 'exists:products,id' ],
			'paid'			=> [ 'required', 'boolean' ],
		];
	}

	protected function validationRulesOnUpdate( $input )
	{
		return $this->validationRulesOnStore( $input );
	}

}