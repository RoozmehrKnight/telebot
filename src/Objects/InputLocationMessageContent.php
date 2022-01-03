<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Abstract\TelegramObject;

/**
 * Represents the [content](https://core.telegram.org/bots/api#inputmessagecontent) of a location message to be sent as the result of an inline query.
 *
 * @property double $latitude Latitude of the location in degrees
 * @property double $longitude Longitude of the location in degrees
 * @property double $horizontal_accuracy Optional. The radius of uncertainty for the location, measured in meters; 0-1500
 * @property integer $live_period Optional. Period in seconds for which the location can be updated, should be between 60 and 86400.
 * @property integer $heading Optional. For live locations, a direction in which the user is moving, in degrees. Must be between 1 and 360 if specified.
 * @property integer $proximity_alert_radius Optional. For live locations, a maximum distance for proximity alerts about approaching another chat member, in meters. Must be between 1 and 100000 if specified.
 */
class InputLocationMessageContent extends InputMessageContent
{
	protected array $attributes = [
		'latitude' => 'double',
		'longitude' => 'double',
		'horizontal_accuracy' => 'double',
		'live_period' => 'integer',
		'heading' => 'integer',
		'proximity_alert_radius' => 'integer',
	];
}
