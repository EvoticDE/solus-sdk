<?php

namespace Evotic\SolusSDK\Interfaces\Servers;
use Evotic\SolusSDK\Interfaces\Servers\Backups\ISolusServerBackupSettings;

interface ISolusServerUpdateOptions {

    public function setName(?string $name): self;
    public function setBootMode(?string $boot_mode): self;
    public function setProjectId(?int $project_id): self;
    public function setUserId(?string $user_id): self;
    public function setDescription(?string $description): self;
    public function setUserData(?string $user_data): self;
    public function setFQDNs(?array $fqdns): self;
    public function setBackupSettings(?ISolusServerBackupSettings $backup_settings): self;
    public function setIsoImageId(?int $iso_image_id): self;
    public function toArray(): array;

}

class SolusServerUpdateOptions implements ISolusServerUpdateOptions {

    private array $options = [];

    private function setOption(string $key, $value): self {
        if ($value !== null)
            $this->options[$key] = $value;

        return $this;
    }

    public function setName(?string $name): self {
        return $this->setOption('name', $name);
    }

    public function setBootMode(?string $boot_mode): self {
        return $this->setOption('boot_mode', $boot_mode);
    }

    public function setProjectId(?int $project_id): self {
        return $this->setOption('_id', $project_id);
    }

    public function setUserId(?string $user_id): self {
        return $this->setOption('user_id', $user_id);
    }

    public function setDescription(?string $description): self {
        return $this->setOption('description', $description);
    }

    public function setUserData(?string $user_data): self {
        return $this->setOption('user_data', $user_data);
    }

    public function setFQDNs(?array $fqdns): self {
        return $this->setOption('fqdns', $fqdns);
    }

    public function setBackupSettings(?ISolusServerBackupSettings $backup_settings): self {
        return $this->setOption('backup_settings', $backup_settings->toArray());
    }

    public function setIsoImageId(?int $iso_image_id): self {
        return $this->setOption('iso_image_id', $iso_image_id);
    }

    public function toArray(): array {
        return $this->options;
    }

}