<?php

namespace Evotic\SolusSDK\Interfaces\Servers\Backups;

interface ISolusServerAdditionalDisks {

    public function setName(string $name): self;
    public function setSize(int $size): self;
    public function setOfferId(int $offer_id): self;
    public function setDelayed(?bool $delayed): self;
    public function toArray(): array;

}

class SolusServerAdditionalDisks implements ISolusServerAdditionalDisks {

    private array $options = [];

    private function setOption(string $key, $value): self {
        if ($value !== null)
            $this->options[$key] = $value;

        return $this;
    }

    public function setName(string $name): self {
        return $this->setOption('name', $name);
    }

    public function setSize(int $size): self {
        return $this->setOption('size', $size);
    }

    public function setOfferId(int $offer_id): self {
        return $this->setOption('offer_id', $offer_id);
    }

    public function setDelayed(?bool $delayed): self {
        return $this->setOption('delayed', $delayed);
    }

    public function toArray(): array {
        return $this->options;
    }

}