<?php

namespace Evotic\SolusSDK\Interfaces\Servers\Backups;

interface ISolusServerBackupSettings {

    public function setBackupEnabled(?bool $enabled): self;
    public function setBackupSchedule(?ISolusServerBackupSchedule $schedule): self;
    public function toArray(): array;

}

class SolusServerBackupSettings implements ISolusServerBackupSettings {

    private array $options = [];

    private function setOption(string $key, $value): self {
        if ($value !== null)
            $this->options[$key] = $value;

        return $this;
    }

    public function setBackupEnabled(?bool $enabled): self {
        return $this->setOption('backup_enabled', $enabled);
    }

    public function setBackupSchedule(?ISolusServerBackupSchedule $schedule): self {
        return $this->setOption('backup_schedule', $schedule->toArray());
    }

    public function toArray(): array {
        return $this->options;
    }

}