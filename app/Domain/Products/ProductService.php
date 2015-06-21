<?php namespace Zeropingheroes\Lanager\Domain\Products;

use Zeropingheroes\Lanager\Domain\ResourceService;
use \DomainException;

class ProductService extends ResourceService {

	protected $model = 'Zeropingheroes\Lanager\Domain\Products\Product';

	protected $orderBy = [ 'name' ];

	protected function readAuthorised()
	{
		return true;
	}

	protected function storeAuthorised()
	{
		return $this->user->hasRole('Orders Admin');
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
			'name'			=> [ 'required', 'max:255', 'unique:products,name' ],
			'category_id'	=> [ 'required', 'numeric', 'exists:product_categories,id' ],
			'price'			=> [ 'required', 'numeric' ],
		];
	}

	protected function validationRulesOnUpdate( $input )
	{
		$rules = $this->validationRulesOnStore( $input );

		// Exclude current event type from uniqueness test
		$rules['name'] = [ 'required', 'max:255', 'unique:products,name,' . $input['id'] ];

		return $rules;
	}

}