<?php

namespace Tests;

use App\Mobile;
use Mockery as m;
use App\Providers\MyProvider;
use PHPUnit\Framework\TestCase;


class MobileTest extends TestCase
{
	
	/** @test */
	public function it_returns_null_when_name_empty()
	{	
		$provider = new MyProvider();
		$mobile = new Mobile($provider);

		$this->assertNull($mobile->makeCallByName(''));
	}

}
