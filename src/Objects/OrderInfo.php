<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Abstract\TelegramObject;

/**
 * This object represents information about an order.
 *
 * @property string $name Optional. User name
 * @property string $phone_number Optional. User's phone number
 * @property string $email Optional. User email
 * @property ShippingAddress $shipping_address Optional. User shipping address
 */
class OrderInfo extends TelegramObject
{
	protected array $attributes = [
		'name' => 'string',
		'phone_number' => 'string',
		'email' => 'string',
		'shipping_address' => 'ShippingAddress',
	];
}
