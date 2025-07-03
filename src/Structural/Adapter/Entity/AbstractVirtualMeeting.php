<?php

namespace Jagfx\RisingPatterns\Structural\Adapter\Entity;

use DateTimeImmutable;
use Jagfx\RisingPatterns\Structural\Adapter\Contract\AttendeeContract;
use Jagfx\RisingPatterns\Structural\Adapter\Contract\VirtualMeetingContract;

abstract class AbstractVirtualMeeting implements VirtualMeetingContract
{
    /**
     * @param AttendeeContract[] $attendees
     */
    public function __construct(
        protected DateTimeImmutable $expectedAt,
        protected int $durationInMinutes,
        protected array $attendees,
        protected ?string $roomUrl = null
    ) {
    }

    public function getExpectedAt(): DateTimeImmutable
    {
        return $this->expectedAt;
    }

    public function setExpectedAt(DateTimeImmutable $expectedAt): void
    {
        $this->expectedAt = $expectedAt;
    }

    public function getDurationInMinutes(): int
    {
        return $this->durationInMinutes;
    }

    public function setDurationInMinutes(int $durationInMinutes): void
    {
        $this->durationInMinutes = $durationInMinutes;
    }

    /**
     * @return AttendeeContract[]
     */
    public function getAttendees(): array
    {
        return $this->attendees;
    }

    /**
     * @param AttendeeContract[] $attendees
     */
    public function setAttendees(array $attendees): void
    {
        $this->attendees = $attendees;
    }

    public function getRoomUrl(): ?string
    {
        return $this->roomUrl;
    }

    public function setRoomUrl(?string $roomUrl): void
    {
        $this->roomUrl = $roomUrl;
    }
}
