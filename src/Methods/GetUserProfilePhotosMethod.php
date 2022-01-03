<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Abstract\TelegramMethod;

/**
 * Use this method to get a list of profile pictures for a user. Returns a [UserProfilePhotos](https://core.telegram.org/bots/api#userprofilephotos) object.
 *
 * @property integer $user_id __Required: Yes__. Unique identifier of the target user
 * @property integer $offset __Required: Optional__. Sequential number of the first photo to be returned. By default, all photos are returned.
 * @property integer $limit __Required: Optional__. Limits the number of photos to be retrieved. Values between 1-100 are accepted. Defaults to 100.
 */
class GetUserProfilePhotosMethod extends TelegramMethod
{
	protected string $method = 'getUserProfilePhotos';
	protected string $expect = 'UserProfilePhotos';
	protected array $parameters = ['user_id' => 'integer', 'offset' => 'integer', 'limit' => 'integer'];
}
