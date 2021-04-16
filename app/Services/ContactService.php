<?php

namespace App\Services;

use App\Contact;
use Exception;

class ContactService
{
	
	public static function findByName(string $name): Contact
	{
		// queries to the db

		$contacts = [
			[
				'name' => 'Andres',
				'number' => '953486446'
			],
			[
				'name' => 'Gianncarlo',
				'number' => '999777555'
			],
		];

		$key = array_search($name, array_column($contacts, 'name'));

		if($key === false){
			throw new \Exception('Contact cannot be found');
		}

		return new Contact(
			$contacts[$key]['name'],
			$contacts[$key]['number']
		);
	}

	public static function validateNumber(string $number): bool
	{
		// logic to validate numbers
		return true;
	}
}