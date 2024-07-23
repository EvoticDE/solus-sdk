<?php

namespace Evotic\SolusSDK\Interfaces\Plans;

use Evotic\SolusSDK\Interfaces\Servers\Backups\ISolusServerBackupSettings;

interface ISolusPlanUpdateOptions {
    
    public function setIsIncrementalBackupEnabled(?bool $isIncrementalBackupEnabled): self;
    public function setIncrementalBackupLimit(?int $incrementalBackupLimit): self;
    public function setName(?string $name): self;
    public function setTokensPerHour(?int $tokensPerHour): self;
    public function setTokensPerMonth(?int $tokensPerMonth): self;
    public function setIsAdditionalIpsAvailable(?bool $isAdditionalIpsAvailable): self;
    public function setIpTokensPerHour(?int $ipTokensPerHour): self;
    public function setIpTokensPerMonth(?int $ipTokensPerMonth): self;
    public function setIsoImageTokensPerHour(?int $isoImageTokensPerHour): self;
    public function setIsoImageTokensPerMonth(?int $isoImageTokensPerMonth): self;
    public function setLimits(?array $limits): self;
    public function setIsSnaphotsEnabled(?bool $isSnaphotsEnabled): self;
    public function setIsVisible(?bool $isVisible): self;
    public function setIsBackupAvailable(?bool $isBackupAvailable): self;
    public function setBackupPrice(?int $backupPrice): self;
    public function setResetLimitPolicy(?string $resetLimitPolicy): self;
    public function setNetworkTrafficLimitType(?string $networkTrafficLimitType): self;
    public function setBackupSettings(?ISolusServerBackupSettings $backupSettings): self;
    public function setAvailableOsImageVersions(?array $availableOsImageVersions): self;
    public function setAvailableLocations(?array $availableLocations): self;
    public function setAvailableApplications(?array $availableApplications): self;
    public function toArray(): array;

}

class SolusPlanUpdateOptions implements ISolusPlanUpdateOptions {

    private array $options = [];

    private function setOption(string $key, $value): self {
        if ($value !== null)
            $this->options[$key] = $value;

        return $this;
    }

    public function setIsIncrementalBackupEnabled(?bool $isIncrementalBackupEnabled): self {
        return $this->setOption('is_incremental_backup_enabled', $isIncrementalBackupEnabled);
    }

    public function setIncrementalBackupLimit(?int $incrementalBackupLimit): self {
        return $this->setOption('incremental_backup_limit', $incrementalBackupLimit);
    }

    public function setName(?string $name): self {
        return $this->setOption('name', $name);
    }

    public function setTokensPerHour(?int $tokensPerHour): self {
        return $this->setOption('tokens_per_hour', $tokensPerHour);
    }

    public function setTokensPerMonth(?int $tokensPerMonth): self {
        return $this->setOption('tokens_per_month', $tokensPerMonth);
    }

    public function setIsAdditionalIpsAvailable(?bool $isAdditionalIpsAvailable): self {
        return $this->setOption('is_additional_ips_available', $isAdditionalIpsAvailable);
    }

    public function setIpTokensPerHour(?int $ipTokensPerHour): self {
        return $this->setOption('ip_tokens_per_hour', $ipTokensPerHour);
    }

    public function setIpTokensPerMonth(?int $ipTokensPerMonth): self {
        return $this->setOption('ip_tokens_per_month', $ipTokensPerMonth);
    }

    public function setIsoImageTokensPerHour(?int $isoImageTokensPerHour): self {
        return $this->setOption('iso_image_tokens_per_hour', $isoImageTokensPerHour);
    }

    public function setIsoImageTokensPerMonth(?int $isoImageTokensPerMonth): self {
        return $this->setOption('iso_image_tokens_per_month', $isoImageTokensPerMonth);
    }

    public function setLimits(?array $limits): self {
        return $this->setOption('limits', $limits);
    }

    public function setIsSnaphotsEnabled(?bool $isSnaphotsEnabled): self {
        return $this->setOption('is_snapshots_enabled', $isSnaphotsEnabled);
    }

    public function setIsVisible(?bool $isVisible): self {
        return $this->setOption('is_visible', $isVisible);
    }

    public function setIsBackupAvailable(?bool $isBackupAvailable): self {
        return $this->setOption('is_backup_available', $isBackupAvailable);
    }

    public function setBackupPrice(?int $backupPrice): self {
        return $this->setOption('backup_price', $backupPrice);
    }

    public function setResetLimitPolicy(?string $resetLimitPolicy): self {
        return $this->setOption('reset_limit_policy', $resetLimitPolicy);
    }

    public function setNetworkTrafficLimitType(?string $networkTrafficLimitType): self {
        return $this->setOption('network_traffic_limit_type', $networkTrafficLimitType);
    }

    public function setBackupSettings(?ISolusServerBackupSettings $backupSettings): self {
        return $this->setOption('backup_settings', $backupSettings->toArray());
    }

    public function setAvailableOsImageVersions(?array $availableOsImageVersions): self {
        return $this->setOption('available_os_image_versions', $availableOsImageVersions);
    }

    public function setAvailableLocations(?array $availableLocations): self {
        return $this->setOption('available_locations', $availableLocations);
    }

    public function setAvailableApplications(?array $availableApplications): self {
        return $this->setOption('available_applications', $availableApplications);
    }

    public function toArray(): array {
        return $this->options;
    }

}
