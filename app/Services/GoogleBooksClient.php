<?php

namespace App\Services;

use GuzzleHttp\Client;

class GoogleBooksClient
{
  private $apiKey;

  public function __construct(string $apiKey)
  {
    $this->apiKey = $apiKey;
  }

  public function searchBooks(string $keyword)
  {

    $client = new Client();

    $keyword = '978-643107949';

    $res = $client->request('GET', 'https://www.googleapis.com/books/v1/volumes', [
      'query' => [
        'q' => sprintf('isbn:%s', $keyword),
        'key' => $this->apiKey

      ]
    ]);

    $data = json_decode($res->getBody()->getContents());

    return $data->items;
  }

}