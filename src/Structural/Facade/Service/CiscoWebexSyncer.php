<?php

namespace Jagfx\RisingPatterns\Structural\Facade\Service;

use Jagfx\RisingPatterns\Structural\Facade\Contract\VirtualMeetingContract;
use Jagfx\RisingPatterns\Structural\Facade\Contract\VirtualMeetingSyncerContract;
use Jagfx\RisingPatterns\Structural\Facade\Entity\CiscoWebexVirtualMeeting;
use LogicException;

class CiscoWebexSyncer implements VirtualMeetingSyncerContract
{
    public function create(VirtualMeetingContract $virtualMeeting): void
    {
        if (!$virtualMeeting instanceof CiscoWebexVirtualMeeting) {
            throw new LogicException('The virtual meeting is not an CiscoWebexVirtualMeeting object.');
        }

        $virtualMeeting->setRoomUrl('https://cisco.com/room/this-is-an-id-cw');
        $virtualMeeting->setCiscoWebexId('this-is-an-id-cw');
    }

    public function update(VirtualMeetingContract $virtualMeeting): void
    {
        if (!$virtualMeeting instanceof CiscoWebexVirtualMeeting) {
            throw new LogicException('The virtual meeting is not an CiscoWebexVirtualMeeting object.');
        }

        $virtualMeeting->setRoomUrl('https://cisco.com/room/this-is-another-id-cw');
        $virtualMeeting->setCiscoWebexId('this-is-another-id-cw');
    }

    public function delete(VirtualMeetingContract $virtualMeeting): void
    {
        if (!$virtualMeeting instanceof CiscoWebexVirtualMeeting) {
            throw new LogicException('The virtual meeting is not an CiscoWebexVirtualMeeting object.');
        }

        $virtualMeeting->setRoomUrl(null);
        $virtualMeeting->setCiscoWebexId(null);
    }
}
