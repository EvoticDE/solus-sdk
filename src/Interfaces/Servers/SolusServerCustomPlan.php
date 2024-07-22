<?php

namespace Evotic\SolusSDK\Interfaces\Servers;

use Evotic\SolusSDK\Interfaces\Servers\Backups\ISolusServerBackupSettings;

interface ISolusServerCustomPlan {

    public function setStorageType(?string $type): self;
    public function setImageFormat(?string $format): self;
    public function setParameters(ISolusServerCustomPlanParameters $parameters): self;
    public function isAdditionalIpsAvailable(?bool $availability): self;
    public function setLimits(?array $limits): self;
    public function isSnapshotsEnabled(?bool $enabled): self;
    public function isBackupAvailable(?bool $available): self;
    public function setResetLimitPolicy(?string $policy): self;
    public function setNetworkTrafficLimitType(?string $type): self;
    public function setBackupSettings(?ISolusServerBackupSettings $settings): self;
    public function setVirtualizationType(?string $type): self;
    public function toArray(): array;

}

class SolusServerCustomPlan implements ISolusServerCustomPlan {

    private array $options = [];

    private function setOption(string $key, $value): self {
        if ($value !== null)
            $this->options[$key] = $value;

        return $this;
    }

    public function setStorageType(?string $type): self {
        return $this->setOption('storage_type', $type);
    }

    public function setImageFormat(?string $format): self {
        return $this->setOption('image_format', $format);
    }

    public function setParameters(ISolusServerCustomPlanParameters $parameters): self {
        return $this->setOption('params', $parameters->toArray());
    }

    public function isAdditionalIpsAvailable(?bool $availability): self {
        return $this->setOption('additional_ips_available', $availability);
    }

    public function setLimits(?array $limits): self {
        return $this->setOption('limits', $limits);
    }

    public function isSnapshotsEnabled(?bool $enabled): self {
        return $this->setOption('is_snapshots_enabled', $enabled);
    }

    public function isBackupAvailable(?bool $available): self {
        return $this->setOption('is_backup_available', $available);
    }

    public function setResetLimitPolicy(?string $policy): self {
        return $this->setOption('reset_limit_policy', $policy);
    }

    public function setNetworkTrafficLimitType(?string $type): self {
        return $this->setOption('network_traffic_limit_type', $type);
    }

    public function setBackupSettings(?ISolusServerBackupSettings $settings): self {
        return $this->setOption('backup_settings', $settings->toArray());
    }

    public function setVirtualizationType(?string $type): self {
        return $this->setOption('virtualization_type', $type);
    }

    public function toArray(): array {
        return $this->options;
    }

}
