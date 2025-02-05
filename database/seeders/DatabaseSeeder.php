<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Closure;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Collection;
use Symfony\Component\Console\Helper\ProgressBar;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // === LIMPIAMOS DATABASES =====
        User::query()->delete();
        $userTrashedRecords = User::onlyTrashed()->get();
        foreach ($userTrashedRecords as $record) {
            $record->forceDelete();
        }

        // === Admin ===
        $adminCount = 1;
        $this->command->warn(PHP_EOL . 'Creating Admin...');
        $progressBar = new ProgressBar($this->command->getOutput(), $adminCount);
        $progressBar->start();
        for ($i = 1; $i <= $adminCount; $i++) {
            User::create([
                'username' => config('app-custom.app_user_admin.username'),
                'email' => config('app-custom.app_user_admin.email'),
                'password' => Hash::make(config('app-custom.app_user_admin.password')),
                'name' => config('app-custom.app_user_admin.name'),
                'is_admin' => config('app-custom.app_user_admin.is_admin'),
                'is_active' => config('app-custom.app_user_admin.is_active'),
                'email_verified_at' => now(),
            ]);
            $progressBar->advance();
        }
        $progressBar->finish();
        $this->command->getOutput()->writeln('');
        $this->command->info('Token created.');

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }

    // Función para el progress Bar en consola
    protected function withProgressBar(int $amount, Closure $createCollectionOfOne): Collection
    {
        $progressBar = new ProgressBar($this->command->getOutput(), $amount);
        $progressBar->start();
        $items = new Collection();
        foreach (range(1, end: $amount) as $i) {
            $items = $items->merge(
                $createCollectionOfOne()
            );
            $progressBar->advance();
        }
        $progressBar->finish();
        $this->command->getOutput()->writeln('');
        return $items;
    }
}
