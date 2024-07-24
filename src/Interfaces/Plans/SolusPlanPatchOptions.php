<?php

namespace Evotic\SolusSDK\Interfaces\Plans;

interface ISolusPlanPatchOptions {

    public function setIsIncrementalBackupEnabled(?bool $is_incremental_backup_enabled): self;
    public function setIncrementalBackupsLimit(?int $incremental_backups_limit): self;
    public function setIsDefault(?bool $is_default): self;
    public function setIsVisible(?bool $is_visible): self;
    public function setPosition(?int $position): self;
    public function toArray(): array;

}

class SolusPlanPatchOptions implements ISolusPlanPatchOptions {

    private array $options = [];

    private function setOption(string $key, $value): self {
        if ($value !== null)
            $this->options[$key] = $value;

        return $this;
    }

    public function setIsIncrementalBackupEnabled(?bool $is_incremental_backup_enabled): self {
        return $this->setOption('is_incremental_backup_enabled', $is_incremental_backup_enabled);
    }

    public function setIncrementalBackupsLimit(?int $incremental_backups_limit): self {
        return $this->setOption('incremental_backups_limit', $incremental_backups_limit);
    }

    public function setIsDefault(?bool $is_default): self {
        return $this->setOption('is_default', $is_default);
    }

    public function setIsVisible(?bool $is_visible): self {
        return $this->setOption('is_visible', $is_visible);
    }

    public function setPosition(?int $position): self {
        return $this->setOption('position', $position);
    }

    public function toArray(): array {
        return $this->options;
    }

}
