<?php

namespace App\Support;

use App\Models\Lead;
use Carbon\Carbon;
use Carbon\CarbonImmutable;

class AppointmentSlots
{
    /** Heures d'ouverture : Lundi (1) – Samedi (6), 9h – 17h (dernier créneau, fin à 18h). */
    private const OPEN_HOURS = [9, 10, 11, 12, 13, 14, 15, 16, 17];

    private const CLOSED_WEEKDAY = Carbon::SUNDAY;

    private const MIN_NOTICE_HOURS = 24;

    /**
     * @return list<CarbonImmutable> Créneaux encore disponibles pour la date donnée.
     */
    public static function availableFor(CarbonImmutable $date): array
    {
        if ($date->dayOfWeek === self::CLOSED_WEEKDAY) {
            return [];
        }

        $earliest = CarbonImmutable::now()->addHours(self::MIN_NOTICE_HOURS);

        $slots = array_map(
            fn (int $hour) => $date->setTime($hour, 0),
            self::OPEN_HOURS,
        );

        $slots = array_values(array_filter(
            $slots,
            fn (CarbonImmutable $slot) => $slot->greaterThanOrEqualTo($earliest),
        ));

        if ($slots === []) {
            return [];
        }

        $taken = Lead::query()
            ->whereNotNull('appointment_at')
            ->whereBetween('appointment_at', [$date->startOfDay(), $date->endOfDay()])
            ->pluck('appointment_at')
            ->map(fn ($dt) => Carbon::parse($dt)->format('Y-m-d H:i'))
            ->all();

        return array_values(array_filter(
            $slots,
            fn (CarbonImmutable $slot) => ! in_array($slot->format('Y-m-d H:i'), $taken, true),
        ));
    }

    public static function isAvailable(CarbonImmutable $slot): bool
    {
        foreach (self::availableFor($slot->startOfDay()) as $available) {
            if ($available->equalTo($slot)) {
                return true;
            }
        }

        return false;
    }
}
