<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Str;
use DB;

use App\Models\User;

use Spatie\Permission\Models\Role;
use Illuminate\Auth\Events\Registered;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Role::create(['name' => 'superadmin']);
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'partner']);
        Role::create(['name' => 'investor']);

        $admin = User::create([
            'name' => 'Admin Infish-App',
            'phone' => '083856116340',
            'email' => 'admin@infish.app',
            'email_verified_at' => now(),
            'password' => bcrypt('admin123'),
            'remember_token' => Str::random(60),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        event(new Registered($admin));
        $admin->assignRole('admin');

        $partner = User::create([
            'name' => 'Demo Mitra Infish-App',
            'phone' => '083856116340',
            'email' => 'demomitra@infish.app',
            'email_verified_at' => now(),
            'password' => bcrypt('mitra123'),
            'remember_token' => Str::random(60),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        event(new Registered($partner));
        $partner->assignRole('partner');

        $investor = User::create([
            'name' => 'Demo Investor Infish-App',
            'phone' => '083856116340',
            'email' => 'demoinvestor@infish.app',
            'email_verified_at' => now(),
            'password' => bcrypt('investor123'),
            'remember_token' => Str::random(60),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        event(new Registered($investor));
        $investor->assignRole('investor');

        DB::insert("INSERT INTO invest_statuses (id, name, created_at, updated_at) VALUES (1, 'Telah Diverifikasi', now(), now()), (2, 'Belum Diverifikasi', now(), now())");
        DB::insert("INSERT INTO partner_deposit_statuses (id, name, created_at, updated_at) VALUES (1, 'Telah Diverifikasi', now(), now()), (2, 'Belum Diverifikasi', now(), now())");
        DB::insert("INSERT INTO partner_statuses (id, name, created_at, updated_at) VALUES (1, 'Terverifikasi', now(), now()), (2, 'Belum Diverifikasi', now(), now()), (3, 'Blokir', now(), now()), (4, 'Menunggu Persetujuan', now(), now())");
        DB::insert("INSERT INTO payback_statuses (id, name, created_at, updated_at) VALUES (1, 'Telah Diverifikasi', now(), now()), (2, 'Belum Diverifikasi', now(), now())");
        DB::insert("INSERT INTO progress_statuses (id, name, created_at, updated_at) VALUES (1, 'Telah Diverifikasi', now(), now()), (2, 'Belum Diverifikasi', now(), now())");
        DB::insert("INSERT INTO submission_statuses (id, name, created_at, updated_at) VALUES (1, 'Disetujui', now(), now()), (2, 'Diproses', now(), now()), (3, 'Ditolak', now(), now())");
        DB::insert("INSERT INTO withdraw_statuses (id, name, created_at, updated_at) VALUES (1, 'Disetujui', now(), now()), (2, 'Diproses', now(), now()), (3, 'Ditolak', now(), now())");
        DB::insert("INSERT INTO fishes (id, name, harvest, created_at, updated_at, deleted_at) VALUES (1, 'Lele', 3, now(), now(), NULL), (2, 'Gurame', 4, now(), now(), NULL), (3, 'Nila', 3, now(), now(), NULL), (4, 'Mujair', 5, now(), now(), NULL), (5, 'Udang Kecil', 4, now(), now(), NULL)");
    }
}
