<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Abstract\TelegramObject;

/**
 * This object represents one row of the high scores table for a game.
 *
 * @property integer $position Position in high score table for the game
 * @property User $user User
 * @property integer $score Score
 */
class GameHighScore extends TelegramObject
{
	protected array $attributes = ['position' => 'integer', 'user' => 'User', 'score' => 'integer'];
}
