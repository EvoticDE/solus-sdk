<?php

namespace Evotic\SolusSDK\Interfaces\Servers;

use Evotic\SolusSDK\Interfaces\Servers\Backups\ISolusServerBackupSettings;
use Evotic\SolusSDK\Interfaces\Servers\ISolusServerCustomPlan;

interface ISolusServerCreateOptions {

    public function setDescription(?string $description): self;
    public function setPassword(?string $password): self;
    public function setProject(?int $project_id): self;
    public function setApplication(?int $application_id): self;
    public function setApplicationData(?array $application_data): self;
    public function setPlan(?int $plan_id): self;
    public function setLocation(?int $location_id): self;
    public function setOperatingSystem(?int $operating_system_id): self;
    public function setSSHKeys(?array $ssh_keys): self;
    public function setUserData(?string $user_data): self;
    public function setFQDNs(?array $fqdns): self;
    public function setBackupSettings(?ISolusServerBackupSettings $backup_settings): self;
    public function setCustomPlan(?ISolusServerCustomPlan $custom_plan): self;
    public function setIPTypes(?array $ip_types): self;
    public function setPrimaryIP(?string $primary_ip): self;
    public function setAdditionalIPCount(?int $additional_ip_count): self;
    public function setAdditionalIPv6Count(?int $additional_ipv6_count): self;
    public function setPrimaryDiskOffer(?int $primary_disk_offer): self;
    public function setAdditionalDisks(?array $additional_disks): self;
    public function setVPCNetworks(?array $vpc_network_ids): self;
    public function setMACAdress(?string $mac_address): self;
    public function setFirmware(?string $firmware): self;
    public function toArray(): array;

}

class SolusServerCreateOptions implements ISolusServerCreateOptions {

    private array $options = [];

    private function setOption(string $key, $value): self {
        if ($value !== null)
            $this->options[$key] = $value;

        return $this;
    }

    public function setDescription(?string $description): self {
        return $this->setOption('description', $description);
    }

    public function setPassword(?string $password): self {
        return $this->setOption('password', $password);
    }

    public function setProject(?int $project_id): self {
        return $this->setOption('project', $project_id);
    }

    public function setApplication(?int $application_id): self {
        return $this->setOption('application', $application_id);
    }

    public function setApplicationData(?array $application_data): self {
        return $this->setOption('application_data', $application_data);
    }

    public function setPlan(?int $plan_id): self {
        return $this->setOption('plan', $plan_id);
    }

    public function setLocation(?int $location_id): self {
        return $this->setOption('location', $location_id);
    }

    public function setOperatingSystem(?int $operating_system_id): self {
        return $this->setOption('os', $operating_system_id);
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

    public function setBackupSettings(?ISolusServerBackupSettings $backup_settings): self {
        return $this->setOption('backup_settings', $backup_settings->toArray());
    }

    public function setCustomPlan(?ISolusServerCustomPlan $custom_plan): self {
        return $this->setOption('custom_plan', $custom_plan->toArray());
    }

    public function setIPTypes(?array $ip_types): self {
        return $this->setOption('ip_types', $ip_types);
    }

    public function setPrimaryIP(?string $primary_ip): self {
        return $this->setOption('primary_ip', $primary_ip);
    }

    public function setAdditionalIPCount(?int $additional_ip_count): self {
        return $this->setOption('additional_ip_count', $additional_ip_count);
    }

    public function setAdditionalIPv6Count(?int $additional_ipv6_count): self {
        return $this->setOption('additional_ipv6_count', $additional_ipv6_count);
    }

    public function setPrimaryDiskOffer(?int $primary_disk_offer): self {
        return $this->setOption('primary_disk_offer', $primary_disk_offer);
    }

    public function setAdditionalDisks(?array $additional_disks): self {
        return $this->setOption('additional_disks', array_map(fn($disk) => $disk->toArray(), $additional_disks));
    }

    public function setVPCNetworks(?array $vpc_network_ids): self {
        return $this->setOption('vpc_network_ids', $vpc_network_ids);
    }

    public function setMACAdress(?string $mac_address): self {
        return $this->setOption('mac_address', $mac_address);
    }

    public function setFirmware(?string $firmware): self {
        return $this->setOption('firmware', $firmware);
    }

    public function toArray(): array {
        return $this->options;
    }

}
