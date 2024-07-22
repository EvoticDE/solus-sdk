<?php

namespace Evotic\SolusSDK\Interfaces\Projects;

use Evotic\SolusSDK\Interfaces\Servers\Backups\ISolusServerBackupSettings;
use Evotic\SolusSDK\Interfaces\Servers\Backups\ISolusServerAdditionalDisks;

interface ISolusProjectServerCreateOptions {

    public function setApplicationId(?int $application_id): self;
    public function setApplicationData(?array $application_data): self;
    public function setPassword(?string $password): self;
    public function setSSHKeys(?array $ssh_keys): self;
    public function setUserData(?string $user_data): self;
    public function setFQDNs(?array $fqdns): self;
    public function setState(?string $state): self;
    public function setBackupSettings(?ISolusServerBackupSettings $backup_settings): self;
    public function setPrimaryDiskOffer(?int $primary_disk_offer): self;
    public function setAdditionalDisks(?array $additional_disks): self;
    public function setIPTypes(?array $ip_types);
    public function setVPCNetworkIds(?array $vpc_network_ids);
    public function toArray(): array;

}

class SolusProjectServerCreateOptions implements ISolusProjectServerCreateOptions {
 
    private array $options = [];

    private function setOption(string $key, $value): self {
        if ($value !== null)
            $this->options[$key] = $value;

        return $this;
    }

    public function setApplicationId(?int $application_id): self {
        return $this->setOption('application_id', $application_id);
    }

    public function setApplicationData(?array $application_data): self {
        return $this->setOption('application_data', $application_data);
    }

    public function setPassword(?string $password): self {
        return $this->setOption('password', $password);
    }

    public function setSSHKeys(?array $ssh_keys): self {
        return $this->setOption('ssh_keys', $ssh_keys);
    }

    public function setUserData(?string $user_data): self {
        return $this->setOption('user_data', $user_data);
    }

    public function setFQDNs(?array $fqdns): self {
        return $this->setOption('fqdns', $fqdns);
    }

    public function setState(?string $state): self {
        return $this->setOption('state', $state);
    }

    public function setBackupSettings(?ISolusServerBackupSettings $backup_settings): self {
        return $this->setOption('backup_settings', $backup_settings->toArray());
    }

    public function setPrimaryDiskOffer(?int $primary_disk_offer): self {
        return $this->setOption('primary_disk_offer', $primary_disk_offer);
    }

    public function setAdditionalDisks(?array $additional_disks): self {
        return $this->setOption('additional_disks', array_map(fn($disk) => $disk->toArray(), $additional_disks));
    }

    public function setIPTypes(?array $ip_types): self {
        return $this->setOption('ip_types', $ip_types);
    }

    public function setVPCNetworkIds(?array $vpc_network_ids): self {
        return $this->setOption('vpc_network_ids', $vpc_network_ids);
    }

    public function toArray(): array {
        return $this->options;
    }
    
}