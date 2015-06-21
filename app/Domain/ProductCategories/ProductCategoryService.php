<?php namespace Zeropingheroes\Lanager\Domain\ProductCategories;

use Zeropingheroes\Lanager\Domain\ResourceService;
use \DomainException;

class ProductCategoryService extends ResourceService {

	protected $model = 'Zeropingheroes\Lanager\Domain\ProductCategories\ProductCategory';

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
			'name'			=> [ 'required', 'max:255', 'unique:product_categories,name' ],
		];
	}

	protected function validationRulesOnUpdate( $input )
	{
		$rules = $this->validationRulesOnStore( $input );

		// Exclude current item from uniqueness test
		$rules['name'] = [ 'required', 'max:255', 'unique:product_categories,name,' . $input['id'] ];

		return $rules;
	}

}