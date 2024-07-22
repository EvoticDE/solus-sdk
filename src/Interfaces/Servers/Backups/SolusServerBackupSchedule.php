<?php

namespace Evotic\SolusSDK\Interfaces\Servers\Backups;

interface ISolusServerBackupSchedule {

    public function setScheduleType(string $type): self; // "monthly", "weekly", "daily"
    public function setTime(int $hour, int $minute): self;
    public function setDays(array $days); // each value between 1 and 31 depending on when it should be executed
    public function toArray(): array;

}

class SolusServerBackupSchedule implements ISolusServerBackupSchedule {

    private array $options = [];

    private function setOption(string $key, $value): self {
        if ($value !== null)
            $this->options[$key] = $value;

        return $this;
    }

    public function setScheduleType(string $type): self {
        return $this->setOption('schedule_type', $type);
    }

    public function setTime(int $hour, int $minute): self {
        return $this->setOption('time', $hour . ':' . $minute);
    }

    public function setDays(array $days) {
        return $this->setOption('days', $days);
    }

    public function toArray(): array {
        return $this->options;
    }

}