<?php

namespace Tests;

use App\Call;
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

	/** @test */
	public function it_returns_a_call_when_have_a_valid_contact()
	{
		$mockProvider = m::mock(MyProvider::class);
		$mobile = new mobile($mockProvider);
		$mockMobile = m::mock($mobile);

		$mockMobile->shouldReceive('makeCallByName')
				   ->andReturn(new Call());

		$call = $mockMobile->makeCallByName('Andres');

		$this->assertEquals(Call::class, get_class($call));
	}

}
