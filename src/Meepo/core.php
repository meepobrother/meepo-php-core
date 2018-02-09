<?php
namespace Meepo;
use Psr\Log\LoggerInterface;

class MeepoCore
{
    private $logger;
    public function __construct(LoggerInterface $logger = null)
    {
        $this->logger = $logger;

        if ($this->logger) {
            $this->logger->info('Doing work');
        }
    }
}
