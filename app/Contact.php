<?php

namespace App;


class Contact
{
	public string $name;
	public string $number;

	function __construct(string $name, string $number)
	{
		$this->name = $name;
		$this->number = $number;
	}
}