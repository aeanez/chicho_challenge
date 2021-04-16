<?php

namespace Tests;

use App\Call;
use App\Mobile;
use Mockery as m;
use App\Providers\MyProvider;
use App\Providers\ProviderFactory;
use App\Services\ContactService;
use Exception;
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

	/** @test */
	public function it_returns_an_exception_when_there_is_no_valid_contact_supplied()
	{
		try {
			ContactService::findByName('Undefined');
		} catch (\Exception $e) {
			$error = $e->getMessage();
		}

		$this->assertEquals(Exception::class, get_class($e));
	}

	/** @test */
	public function it_returs_a_message_if_the_contact_number_is_valid()
	{
		try {
			$provider = new MyProvider();

			$mobile = new Mobile($provider);

			$result = $mobile->SendMessageByName('Andres', 'Hi there!');

		} catch (\Throwable $th) {
			echo $e->getMessage();
		}

		$this->assertEquals($result, "The message 'Hi there!' was sent to 953486446");
	}

	/** @test */
	public function it_will_assert_true_if_the_class_type_match_for_my_provider()
	{
		$provider = new ProviderFactory(new MyProvider());

		$this->assertEquals(MyProvider::class, get_class($provider->provider));
	}

	/** @test */
	public function it_will_assert_true_if_the_class_type_match_for_my_second_provider()
	{
		$provider = new ProviderFactory(new MyProvider());

		$this->assertEquals(MyProvider::class, get_class($provider->provider));
	}

}
