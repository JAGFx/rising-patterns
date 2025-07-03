<?php

namespace Jagfx\RisingPatterns\Structural\Adapter\Service;

use Jagfx\RisingPatterns\Structural\Adapter\Contract\VirtualMeetingContract;
use Jagfx\RisingPatterns\Structural\Adapter\Contract\VirtualMeetingSyncerContract;
use Jagfx\RisingPatterns\Structural\Adapter\Entity\CiscoWebexVirtualMeeting;
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
