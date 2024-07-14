<?php

namespace Evotic\SolusSDK\Interfaces\Projects;

interface ISolusProjectServerCreateOptions {

    public function setApplicationId(?int $application_id): self;
    public function setApplicationData(?array $application_data): self;
    public function setPassword(?string $password): self;
    public function setSSHKeys(?array $ssh_keys): self;
    public function setUserData(?string $user_data): self;
    public function setFQDNs(?array $fqdns): self;
    public function setState(?string $state): self;
    // TODO: public function setBackupSettings(?ISolusServerBackupSettings $backup_settings): self;
    public function setPrimaryDiskOffer(?int $primary_disk_offer): self;
    // TODO: public function setAdditionalDisks(?IServerAdditionalDisks[] $additional_disks): self;
    public function setIPTypes(?array $ip_types);
    public function setVPCNetworkIds(?array $vpc_network_ids);
    public function toArray(): array;

}

class SolusProjectServerCreateOptions implements ISolusProjectServerCreateOptions {
 
    private array $options = [];

    

    public function toArray(): array {
        return $this->options;
    }
    
}