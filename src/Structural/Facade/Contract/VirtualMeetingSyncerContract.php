<?php

namespace Jagfx\RisingPatterns\Structural\Facade\Contract;

interface VirtualMeetingSyncerContract
{
    public function create(VirtualMeetingContract $virtualMeeting): void;

    public function update(VirtualMeetingContract $virtualMeeting): void;

    public function delete(VirtualMeetingContract $virtualMeeting): void;
}
