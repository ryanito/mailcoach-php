<?php

use Ryanito\Mailcoach\Mailcoach;

$mailcoach = new Mailcoach(config('mailcoach.api_url'), config('mailcoach.api_token'));

/**
 * Subscribe a user to a list
 */
$response = $mailcoach->subscribe(
    1,
    [
         'email' => 'test@test.com',
         'first_name' => 'John',
         'last_name' => 'Doe',
     ]
);
 $mailcoachId = json_decode($response->getBody()->getContents())->data->id;

 /**
  * Update a subscriber
  */
$mailcoach->update(
    1,
    [
         'email' => 'test@test.com',
         'tags' => ['test', 'test2'],
     ]
);

/**
 * Unsubscribe a subscriber from a list
 */
$mailcoach->unsubscribe(1);

/**
 * Delete a subscriber from a list
 */
$mailcoach->delete(1);
