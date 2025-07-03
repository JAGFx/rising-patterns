<?php

namespace Jagfx\RisingPatterns\Structural\Adapter\Entity;

use DateTimeImmutable;
use Jagfx\RisingPatterns\Structural\Adapter\Contract\AttendeeContract;

class CiscoWebexVirtualMeeting extends AbstractVirtualMeeting
{
    /**
     * @param AttendeeContract[] $attendees
     */
    public function __construct(
        DateTimeImmutable $expectedAt,
        int $durationInMinutes,
        array $attendees,
        ?string $roomUrl = null,
        private ?string $ciscoWebexId = null,
    ) {
        parent::__construct($expectedAt, $durationInMinutes, $attendees, $roomUrl);
    }

    public function getCiscoWebexId(): ?string
    {
        return $this->ciscoWebexId;
    }

    public function setCiscoWebexId(?string $ciscoWebexId): void
    {
        $this->ciscoWebexId = $ciscoWebexId;
    }

    public function __toString(): string
    {
        return sprintf('CiscoWebex | %s | %dmins | URL: %s | ID: %s', $this->getExpectedAt()->format('Y-m-d H:i:s'), $this->getDurationInMinutes(), $this->getRoomUrl(), $this->getCiscoWebexId());
    }
}
