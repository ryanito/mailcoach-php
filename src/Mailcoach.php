<?php

namespace Ryanito\Mailcoach;

use GuzzleHttp\Client;

class Mailcoach
{
    private $client;

    public function __construct(string $url, string $token)
    {
        $this->client = new Client([
            'base_uri' => $url,
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
        ]);
    }

    public function subscribe(int $list, array $fields)
    {
        return $this->client->request('POST', 'email-lists/' . $list . '/subscribers', [
            'json' => $fields,
        ]);
    }

    public function update(int $id, array $fields)
    {
        return $this->client->request('PATCH', 'subscribers/' . $id, [
            'json' => $fields,
        ]);
    }

    public function unsubscribe(int $id)
    {
        return $this->client->request('POST', 'subscribers/' . $id . '/unsubscribe');
    }

    public function delete(int $id)
    {
        return $this->client->request('DELETE', 'subscribers/' . $id);
    }
}
