<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Kategori;
use App\Models\Member;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            'username'=>'sihab',
            'password'=>bcrypt(123),
            'level'=>'admin'
        ]);
        User::create([
            'username'=>'fathul',
            'password'=>bcrypt(123),
            'level'=>'admin'
        ]);
        $member = User::create([
            'username'=>'siswa',
            'password'=>bcrypt(123),
            'level'=>'member'
        ]);
        Member::create([
            'nama'=>'Putra Takallam',
            'iduser'=>$member->id
        ]);
        Kategori::create([
            'nmkategori'=>'pakaian',
        ]);
        Kategori::create([
            'nmkategori'=>'sepatu',
        ]);
        Kategori::create([
            'nmkategori'=>'makanan',
        ]);
    }
}
