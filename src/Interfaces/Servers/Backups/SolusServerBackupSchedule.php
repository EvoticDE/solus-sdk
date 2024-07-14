<?php

namespace Evotic\SolusSDK\Interfaces\Servers\Backups;

interface ISolusServerBackupSchedule {

    public function setScheduleType(string $type): self; // "monthly", "weekly", "daily"
    public function setTime(int $hour, int $minute): self;
    public function setDays(array $days); // each value between 1 and 31 depending on when it should be executed
    public function toArray(): array;

}
