<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Log;

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

    $normalizedKeyword = str_replace('-', '', $keyword);

    $url = 'https://www.googleapis.com/books/v1/volumes?q=' . $normalizedKeyword . '&key=' . $this->apiKey;

    $client = new Client();

    try {
    $res = $client->request('GET', $url);
    // $res = $client->request('GET', 'https://www.googleapis.com/books/v1/volumes', [
    //   'query' => [
    //     'q' => sprintf('isbn:%s', $normalizedKeyword),
    //     'key' => $this->apiKey

    //   ]
    // ]);

    } catch (\Exception $e) {
      if ($e->getResponse()->getStatusCode() == 429) {
        session()->flash('error', 'API rate limit exceeded. Please try again later.');
      } else {
        session()->flash('error', 'An error occurred. Please try again.');
      }
      // session()->flash('error', 'An error occurred. Please try again.');
      Log::error($e->getMessage());
      return [];
    }

    $data = json_decode($res->getBody()->getContents());

    if (empty($data->items)) {
      return [];
    }
    return $url;
    // return $data->items;
  }

}