<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * Projects seed.
 */
class ProjectsSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run(): void
    {
        $data = [
            [
                'id' => 'e3111ca3-c99f-492a-8377-fed0f654fe11',
                'created' => '2021-02-10 11:54:14',
                'modified' => '2021-02-10 11:54:14',
                'name' => 'Default Project',
                'description' => 'Default project for orphaned tasks.',
            ],
        ];

        $table = $this->table('projects');
        $table->insert($data)->save();
    }
}
