<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Organization;
use Illuminate\Support\Str;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $organizations = [
            ['name' => 'PSMEPUPTSU', 'email' => 'psmepuptsu@example.com', 'description' => 'PSME PUPTSU Organization'],
            ['name' => 'PASOA', 'email' => 'pasoa@example.com', 'description' => 'PASOA'],
            ['name' => 'MS', 'email' => 'ms@example.com', 'description' => 'Mentors Society'],
            ['name' => 'PAPSU', 'email' => 'papsu@example.com', 'description' => 'PAPSU'],
            ['name' => 'CS', 'email' => 'cs@example.com', 'description' => 'Computer Society'],
            ['name' => 'JPMAP', 'email' => 'jpmap@example.com', 'description' => 'JPMAP'],
            ['name' => 'JMA', 'email' => 'jma@example.com', 'description' => 'Junior Marketing Association'],
            ['name' => 'AECES', 'email' => 'aeces@example.com', 'description' => 'AECES'],
            ['name' => 'BYP', 'email' => 'byp@example.com', 'description' => 'BYP Organization'],
            ['name' => 'PUP-REC-TS', 'email' => 'pup-rec-ts@example.com', 'description' => 'PUP REC-TS'],
            ['name' => 'iROCK', 'email' => 'irock@example.com', 'description' => 'iROCK'],
            ['name' => 'ERG', 'email' => 'erg@example.com', 'description' => 'ERG'],
            ['name' => 'PUPUKAW', 'email' => 'pupukaw@example.com', 'description' => 'PUPUKAW Organization'],
        ];

        foreach ($organizations as $org) {
            Organization::updateOrCreate(
                ['slug' => Str::slug($org['name'])],
                [
                    'name' => $org['name'],
                    'email' => $org['email'],
                    'description' => $org['description'],
                    'category_id' => 1, 
                ]
            );
        }
    }
}
