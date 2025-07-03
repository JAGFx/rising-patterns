<?php

namespace Jagfx\RisingPatterns\Structural\Adapter\Service;

use Jagfx\RisingPatterns\Structural\Adapter\Contract\VirtualMeetingContract;
use Jagfx\RisingPatterns\Structural\Adapter\Contract\VirtualMeetingSyncerContract;
use Jagfx\RisingPatterns\Structural\Adapter\Entity\AdobeConnectVirtualMeeting;
use LogicException;

class AdobeConnectSyncer implements VirtualMeetingSyncerContract
{
    public function create(VirtualMeetingContract $virtualMeeting): void
    {
        if (!$virtualMeeting instanceof AdobeConnectVirtualMeeting) {
            throw new LogicException('The virtual meeting is not an AdobeConnectVirtualMeeting object.');
        }

        $virtualMeeting->setRoomUrl('https://adobe-connect.com/room/this-is-an-id-ac');
        $virtualMeeting->setAdobeConnectId('this-is-an-id-ac');
    }

    public function update(VirtualMeetingContract $virtualMeeting): void
    {
        if (!$virtualMeeting instanceof AdobeConnectVirtualMeeting) {
            throw new LogicException('The virtual meeting is not an AdobeConnectVirtualMeeting object.');
        }

        $virtualMeeting->setRoomUrl('https://adobe-connect.com/room/this-is-another-id-ac');
        $virtualMeeting->setAdobeConnectId('this-is-another-id-ac');
    }

    public function delete(VirtualMeetingContract $virtualMeeting): void
    {
        if (!$virtualMeeting instanceof AdobeConnectVirtualMeeting) {
            throw new LogicException('The virtual meeting is not an AdobeConnectVirtualMeeting object.');
        }

        $virtualMeeting->setRoomUrl(null);
        $virtualMeeting->setAdobeConnectId(null);
    }
}
