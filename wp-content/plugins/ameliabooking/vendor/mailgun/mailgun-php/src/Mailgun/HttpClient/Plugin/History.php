<?php

/*
 * Copyright (C) 2013 Mailgun
 *
 * This software may be modified and distributed under the terms
 * of the MIT license. See the LICENSE file for details.
 */

namespace Mailgun\HttpClient\Plugin;

use AmeliaHttp\Client\Common\Plugin\Journal;
use AmeliaHttp\Client\Exception;
use AmeliaPsr\Http\Message\RequestInterface;
use AmeliaPsr\Http\Message\ResponseInterface;

/**
 * A plugin to remember the last response.
 *
 * @author Tobias Nyholm <tobias.nyholm@gmail.com>
 */
final class History implements Journal
{
    /**
     * @var ResponseInterface
     */
    private $lastResponse;

    /**
     * @return ResponseInterface|null
     */
    public function getLastResponse()
    {
        return $this->lastResponse;
    }

    public function addSuccess(RequestInterface $request, ResponseInterface $response)
    {
        $this->lastResponse = $response;
    }

    public function addFailure(RequestInterface $request, Exception $exception)
    {
    }
}
