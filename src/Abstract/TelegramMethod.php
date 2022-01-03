<?php

namespace WeStacks\TeleBot\Abstract;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use WeStacks\TeleBot\Exception\TeleBotRequestException;
use WeStacks\TeleBot\Helpers\TypeCaster;

abstract class TelegramMethod
{
    /**
     * Method name.
     */
	protected string $method;

    /**
     * Method parameters and their types.
     */
    protected array $parameters;

    /**
     * Method expected return type.
     */
	protected string $expect;

    /**
     * Create new method instance.
     */
    public function __construct(
        protected string $api,
        protected string $token,
        protected Client &$client,
        protected bool $exceptions,
        protected bool $async,
    ) {}

    public function __invoke($arguments = [])
    {
        $promise = $this->client->postAsync("{$this->api}/bot{$this->token}/{$this->method}", [
            'multipart' => TypeCaster::flatten($arguments, $this->parameters)
        ])->then(function (ResponseInterface $result) {
            $result = json_decode($result->getBody());

            if (!$result->ok && $this->exceptions) {
                throw TeleBotRequestException::requestError($result);
            }

            return $result->ok ? TypeCaster::cast($result->result, $this->expect) : false;
        });

        return $this->async ? $promise : $promise->wait();
    }
}
