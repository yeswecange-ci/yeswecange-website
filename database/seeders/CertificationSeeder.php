<?php

namespace Database\Seeders;

use App\Models\Certification;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class CertificationSeeder extends Seeder
{
    /**
     * Reprend tel quel le contenu précédemment codé en dur dans resources/views/pages/certifications.blade.php.
     * Les logos vivaient jusqu'ici dans public/images/certifications (assets statiques) ; on les copie
     * vers le disque "public" (storage/app/public) pour que les nouveaux logos ajoutés depuis l'admin
     * cohabitent avec eux via la même convention (asset('storage/...')).
     */
    public function run(): void
    {
        foreach (['FB.jpg', 'GP.png', 'tiktok.png', 'FDFP.jpeg'] as $file) {
            if (! Storage::disk('public')->exists("certifications/{$file}")) {
                Storage::disk('public')->put(
                    "certifications/{$file}",
                    file_get_contents(public_path("images/certifications/{$file}"))
                );
            }
        }

        $rows = [
            [
                'name_en' => 'Facebook Marketing Partner Certification',
                'name_fr' => 'Certification Facebook Marketing Partner',
                'issuer_en' => 'Issuing body',
                'issuer_fr' => 'Organisme émetteur',
                'logo' => 'certifications/FB.jpg',
            ],
            [
                'name_en' => 'Google Partner Premier Certification',
                'name_fr' => 'Certification Google Partner Premier',
                'issuer_en' => 'Issuing body',
                'issuer_fr' => 'Organisme émetteur',
                'logo' => 'certifications/GP.png',
            ],
            [
                'name_en' => 'TikTok Marketing Certification',
                'name_fr' => 'Certification TikTok Marketing',
                'issuer_en' => 'Issuing body',
                'issuer_fr' => 'Organisme émetteur',
                'logo' => 'certifications/tiktok.png',
            ],
            [
                'name_en' => 'FDFP Certification',
                'name_fr' => 'Certification FDFP',
                'issuer_en' => 'Issuing body',
                'issuer_fr' => 'Organisme émetteur',
                'logo' => 'certifications/FDFP.jpeg',
            ],
        ];

        foreach ($rows as $i => $row) {
            Certification::updateOrCreate(
                ['name_fr' => $row['name_fr']],
                array_merge($row, ['order_column' => $i + 1])
            );
        }
    }
}
