<?php

declare(strict_types=1);

namespace App\Domain\ValueObjects;

enum AvailabilityOption: string
{
    case DEMO_ONLINE = 'demo-online';
    case VIDEO = 'video';
    case DOCS = 'docs';
    case API_ACCESS = 'api-access';
    case VR_DEMO = 'vr-demo';

    public static function fromString(string $value): self
    {
        return match ($value) {
            self::DEMO_ONLINE->value => self::DEMO_ONLINE,
            self::VIDEO->value => self::VIDEO,
            self::DOCS->value => self::DOCS,
            self::API_ACCESS->value => self::API_ACCESS,
            self::VR_DEMO->value => self::VR_DEMO,
            default => throw new \InvalidArgumentException("Invalid availability option: {$value}"),
        };
    }
}
