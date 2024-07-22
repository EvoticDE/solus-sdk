<?php

namespace Evotic\SolusSDK\Interfaces\Servers;

use Evotic\SolusSDK\Interfaces\Servers\Backups\ISolusServerBackupSettings;

interface ISolusServerResizeOptions {

    public function setPreserveDisk(?bool $preserve_disk): self;
    public function setPlanId(?int $plan_id): self;
    public function setBackupSettings(?ISolusServerBackupSettings $backup_settings): self;
    public function setCustomPlan(?ISolusServerCustomPlan $custom_plan): self;
    public function setDelayed(?bool $delayed): self;
    public function toArray(): array;

}

class SolusServerResizeOptions implements ISolusServerResizeOptions {

    private array $options = [];

    private function setOption(string $key, $value): self {
        if ($value !== null)
            $this->options[$key] = $value;

        return $this;
    }

    public function setPreserveDisk(?bool $preserve_disk): self {
        return $this->setOption('preserve_disk', $preserve_disk);
    }

    public function setPlanId(?int $plan_id): self {
        return $this->setOption('plan_id', $plan_id);
    }

    public function setBackupSettings(?ISolusServerBackupSettings $backup_settings): self {
        return $this->setOption('backup_settings', $backup_settings->toArray());
    }

    public function setCustomPlan(?ISolusServerCustomPlan $custom_plan): self {
        return $this->setOption('custom_plan', $custom_plan->toArray());
    }

    public function setDelayed(?bool $delayed): self {
        return $this->setOption('delayed', $delayed);
    }

    public function toArray(): array {
        return $this->options;
    }

}
