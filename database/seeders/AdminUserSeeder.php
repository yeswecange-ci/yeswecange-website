<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AdminUserSeeder extends Seeder
{
    /**
     * Crée (ou met à jour) le compte admin du back-office. Pas d'auto-inscription :
     * ADMIN_EMAIL/ADMIN_PASSWORD dans .env permettent de fixer les identifiants,
     * sinon un mot de passe aléatoire est généré et affiché une seule fois.
     */
    public function run(): void
    {
        $email = env('ADMIN_EMAIL', 'admin@yeswecange.com');
        $password = env('ADMIN_PASSWORD');
        $generated = false;

        if (! $password) {
            $password = Str::password(16);
            $generated = true;
        }

        User::updateOrCreate(
            ['email' => $email],
            [
                'name' => 'Admin YesWeCange',
                'password' => $password,
                'is_admin' => true,
            ]
        );

        if ($generated) {
            $this->command?->warn("Compte admin créé : {$email} / mot de passe : {$password}");
            $this->command?->warn('Notez-le maintenant, il ne sera plus jamais affiché — changez-le ensuite depuis /profile.');
        } else {
            $this->command?->info("Compte admin créé/mis à jour : {$email}");
        }
    }
}
