<?php

namespace AmeliaHttp\Client\Common\HttpClientPool;

use AmeliaHttp\Client\Common\Exception\HttpClientNotFoundException;
use AmeliaHttp\Client\Common\HttpClientPool;
use AmeliaHttp\Client\Common\HttpClientPoolItem;

/**
 * LeastUsedClientPool will choose the client with the less current request in the pool.
 *
 * This strategy is only useful when doing async request
 *
 * @author Joel Wurtz <joel.wurtz@gmail.com>
 */
final class LeastUsedClientPool extends HttpClientPool
{
    /**
     * {@inheritdoc}
     */
    protected function chooseHttpClient()
    {
        $clientPool = array_filter($this->clientPool, function (HttpClientPoolItem $clientPoolItem) {
            return !$clientPoolItem->isDisabled();
        });

        if (0 === count($clientPool)) {
            throw new HttpClientNotFoundException('Cannot choose a http client as there is no one present in the pool');
        }

        usort($clientPool, function (HttpClientPoolItem $clientA, HttpClientPoolItem $clientB) {
            if ($clientA->getSendingRequestCount() === $clientB->getSendingRequestCount()) {
                return 0;
            }

            if ($clientA->getSendingRequestCount() < $clientB->getSendingRequestCount()) {
                return -1;
            }

            return 1;
        });

        return reset($clientPool);
    }
}
