<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Abstract\TelegramObject;

/**
 * This object contains information about a poll.
 *
 * @property string $id Unique poll identifier
 * @property string $question Poll question, 1-300 characters
 * @property PollOption[] $options List of poll options
 * @property integer $total_voter_count Total number of users that voted in the poll
 * @property boolean $is_closed True, if the poll is closed
 * @property boolean $is_anonymous True, if the poll is anonymous
 * @property string $type Poll type, currently can be “regular” or “quiz”
 * @property boolean $allows_multiple_answers True, if the poll allows multiple answers
 * @property integer $correct_option_id Optional. 0-based identifier of the correct answer option. Available only for polls in the quiz mode, which are closed, or was sent (not forwarded) by the bot or to the private chat with the bot.
 * @property string $explanation Optional. Text that is shown when a user chooses an incorrect answer or taps on the lamp icon in a quiz-style poll, 0-200 characters
 * @property MessageEntity[] $explanation_entities Optional. Special entities like usernames, URLs, bot commands, etc. that appear in the explanation
 * @property integer $open_period Optional. Amount of time in seconds the poll will be active after creation
 * @property integer $close_date Optional. Point in time (Unix timestamp) when the poll will be automatically closed
 */
class Poll extends TelegramObject
{
	protected array $attributes = [
		'id' => 'string',
		'question' => 'string',
		'options' => 'PollOption[]',
		'total_voter_count' => 'integer',
		'is_closed' => 'boolean',
		'is_anonymous' => 'boolean',
		'type' => 'string',
		'allows_multiple_answers' => 'boolean',
		'correct_option_id' => 'integer',
		'explanation' => 'string',
		'explanation_entities' => 'MessageEntity[]',
		'open_period' => 'integer',
		'close_date' => 'integer',
	];
}
