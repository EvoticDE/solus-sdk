<?php

namespace Evotic\SolusSDK\Interfaces\Servers\Backups;

interface ISolusServerBackupSettings {

    public function setBackupEnabled(?bool $enabled): self;
    public function setBackupSchedule(ISolusServerBackupSchedule $schedule): self;

}