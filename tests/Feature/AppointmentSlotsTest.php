<?php

namespace Tests\Feature;

use App\Models\Lead;
use App\Support\AppointmentSlots;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Les créneaux interrogent la table `leads` : ce test a besoin de la base
 * (d'où RefreshDatabase et le placement dans Feature plutôt que Unit).
 */
class AppointmentSlotsTest extends TestCase
{
    use RefreshDatabase;

    protected function tearDown(): void
    {
        Carbon::setTestNow();
        parent::tearDown();
    }

    public function test_sunday_has_no_slots(): void
    {
        Carbon::setTestNow(CarbonImmutable::parse('2026-08-03 08:00:00')); // lundi
        $sunday = CarbonImmutable::now()->next(Carbon::SUNDAY)->startOfDay();

        $this->assertSame([], AppointmentSlots::availableFor($sunday));
    }

    public function test_all_slots_available_on_a_free_future_weekday(): void
    {
        Carbon::setTestNow(CarbonImmutable::parse('2026-08-03 08:00:00'));
        $date = $this->futureWeekday();

        // 9h → 17h = 9 créneaux, aucun réservé.
        $this->assertCount(9, AppointmentSlots::availableFor($date));
    }

    public function test_24h_notice_excludes_early_slots(): void
    {
        // Mardi 10:00 : le préavis de 24h place le premier créneau réservable à mercredi 10:00.
        Carbon::setTestNow(CarbonImmutable::parse('2026-08-04 10:00:00'));
        $wednesday = CarbonImmutable::parse('2026-08-05')->startOfDay();

        $labels = collect(AppointmentSlots::availableFor($wednesday))
            ->map(fn (CarbonImmutable $s) => $s->format('H:i'))
            ->all();

        $this->assertNotContains('09:00', $labels); // avant 10:00 → exclu
        $this->assertContains('10:00', $labels);
    }

    public function test_taken_slot_is_no_longer_available(): void
    {
        Carbon::setTestNow(CarbonImmutable::parse('2026-08-03 08:00:00'));
        $date = $this->futureWeekday();

        $slot = AppointmentSlots::availableFor($date)[0];

        Lead::create([
            'type' => Lead::TYPE_QUOTE,
            'name' => 'Client',
            'email' => 'client@example.com',
            'message' => 'RDV',
            'appointment_at' => $slot,
        ]);

        $this->assertFalse(AppointmentSlots::isAvailable($slot));
        $labels = collect(AppointmentSlots::availableFor($date))->map->format('H:i')->all();
        $this->assertNotContains($slot->format('H:i'), $labels);
    }

    private function futureWeekday(): CarbonImmutable
    {
        $date = CarbonImmutable::now()->addDays(3)->startOfDay();

        return $date->dayOfWeek === Carbon::SUNDAY ? $date->addDay() : $date;
    }
}
