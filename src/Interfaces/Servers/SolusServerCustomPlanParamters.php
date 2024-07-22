<?php

namespace Evotic\SolusSDK\Interfaces\Servers;

interface ISolusServerCustomPlanParameters {

    public function setDiskSize(?int $disk_size): self;
    public function setMemory(?int $memory): self;
    public function setCPU(?int $cpu): self;
    public function setCPUUnits(?int $cpu_units): self;
    public function setCPULimit(?int $cpu_limit): self;
    public function setIOPriority(?int $io_priority): self;
    public function setSwap(?int $swap): self;
    public function toArray(): array;

}

class SolusServerCustomPlanParameters implements ISolusServerCustomPlanParameters {

    private array $options = [];

    private function setOption(string $key, $value): self {
        if ($value !== null)
            $this->options[$key] = $value;

        return $this;
    }

    public function setDiskSize(?int $disk_size): self {
        return $this->setOption('disk_size', $disk_size);
    }

    public function setMemory(?int $memory): self {
        return $this->setOption('memory', $memory);
    }

    public function setCPU(?int $cpu): self {
        return $this->setOption('cpu', $cpu);
    }

    public function setCPUUnits(?int $cpu_units): self {
        return $this->setOption('cpu_units', $cpu_units);
    }

    public function setCPULimit(?int $cpu_limit): self {
        return $this->setOption('cpu_limit', $cpu_limit);
    }

    public function setIOPriority(?int $io_priority): self {
        return $this->setOption('io_priority', $io_priority);
    }

    public function setSwap(?int $swap): self {
        return $this->setOption('swap', $swap);
    }

    public function toArray(): array {
        return $this->options;
    }

}
