<?php

namespace Jagfx\RisingPatterns\Structural\Facade\Entity;

use DateTimeImmutable;
use Jagfx\RisingPatterns\Structural\Facade\Contract\AttendeeContract;

class AdobeConnectVirtualMeeting extends AbstractVirtualMeeting
{
    /**
     * @param AttendeeContract[] $attendees
     */
    public function __construct(
        DateTimeImmutable $expectedAt,
        int $durationInMinutes,
        array $attendees,
        ?string $roomUrl = null,
        private ?string $adobeConnectId = null,
    ) {
        parent::__construct($expectedAt, $durationInMinutes, $attendees, $roomUrl);
    }

    public function getAdobeConnectId(): ?string
    {
        return $this->adobeConnectId;
    }

    public function setAdobeConnectId(?string $adobeConnectId): void
    {
        $this->adobeConnectId = $adobeConnectId;
    }

    public function __toString(): string
    {
        return sprintf('AdobeConnect | %s | %dmins | URL: %s | ID: %s', $this->getExpectedAt()->format('Y-m-d H:i:s'), $this->getDurationInMinutes(), $this->getRoomUrl(), $this->getAdobeConnectId());
    }
}
