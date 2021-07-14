<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TasksFixture
 */
class TasksFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'precision' => null, 'null' => true, 'default' => null, 'comment' => ''],
        'modified' => ['type' => 'datetime', 'length' => null, 'precision' => null, 'null' => true, 'default' => null, 'comment' => ''],
        'project_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'name' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'description' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'completed' => ['type' => 'boolean', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_tasks_projects_idx' => ['type' => 'index', 'columns' => ['project_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_tasks_projects' => ['type' => 'foreign', 'columns' => ['project_id'], 'references' => ['projects', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // phpcs:enable
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => '304d382d-2402-485c-b116-0cda2c879e40',
                'created' => '2021-02-10 11:47:16',
                'modified' => '2021-02-10 11:47:16',
                'project_id' => '655a8956-bc93-4bf0-bc01-50e984476af5',
                'name' => 'Lorem ipsum dolor sit amet',
                'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'completed' => 1,
            ],
            [
                'id' => '4e137a95-75d4-40f9-b7ab-9fc8165ac333',
                'created' => '2021-02-10 11:47:16',
                'modified' => '2021-02-10 11:47:16',
                'project_id' => '655a8956-bc93-4bf0-bc01-50e984476af5',
                'name' => 'Aliqua consectetur ut in',
                'description' => 'Proident consectetur proident reprehenderit reprehenderit esse minim mollit mollit consectetur enim velit commodo incididunt ut anim dolore irure occaecat reprehenderit ad cupidatat. Incididunt cillum labore veniam ullamco in aute id do tempor sint do esse amet ea ea irure dolor laboris amet enim exercitation et consequat ex elit nostrud ea in esse.',
                'completed' => 0,
            ],
            [
                'id' => '0f958162-47e4-47c7-b528-f196dae908a3',
                'created' => '2021-02-10 11:47:16',
                'modified' => '2021-02-10 11:47:16',
                'project_id' => '655a8956-bc93-4bf0-bc01-50e984476af5',
                'name' => 'Anim est deserunt deserunt cupidatat',
                'description' => 'Elit excepteur officia ut dolore in eiusmod voluptate in consequat est qui eiusmod magna in sed pariatur et commodo do deserunt exercitation veniam.',
                'completed' => 0,
            ],
            [
                'id' => '5beae9fc-6eaa-43ec-a6fa-f12543fcd0f4',
                'created' => '2021-02-10 11:47:16',
                'modified' => '2021-02-10 11:47:16',
                'project_id' => '655a8956-bc93-4bf0-bc01-50e984476af5',
                'name' => 'Dolore laborum do',
                'description' => 'Proident ut anim dolore cupidatat sed laboris dolore dolor in sed quis fugiat do eu aliquip magna non ex consequat fugiat dolor est anim duis excepteur ut veniam aute sit est incididunt incididunt adipisicing cillum eiusmod aliqua et nisi labore deserunt excepteur velit sit adipisicing ut ullamco irure ea deserunt cillum nisi quis sunt mollit cillum commodo sunt qui duis fugiat ut et eu duis elit pariatur enim laboris minim id aliquip sint eiusmod tempor exercitation consequat magna incididunt quis amet duis anim velit duis reprehenderit aliqua aliquip duis nulla magna quis eu culpa deserunt sint ex nulla nostrud aliquip sint deserunt eiusmod aliqua fugiat esse elit aliquip nulla et duis laboris labore est reprehenderit pariatur amet dolor sunt enim sed ut occaecat sed adipisicing veniam aliqua sunt deserunt occaecat deserunt ullamco dolore ad ut ut sed dolore ut eiusmod velit anim officia adipisicing ad in sit ut velit ullamco eiusmod adipisicing consequat officia ut mollit ea fugiat sint nisi sit dolor elit aute aute ullamco consequat consectetur duis culpa dolore excepteur exercitation excepteur nisi ut incididunt officia exercitation mollit voluptate qui cupidatat sit laboris sit dolore reprehenderit mollit sit dolor do consequat aliqua deserunt consectetur culpa reprehenderit est cillum minim esse pariatur pariatur nulla excepteur elit anim reprehenderit ut est non id irure adipisicing enim fugiat aliqua pariatur dolor anim reprehenderit occaecat qui esse est deserunt in ad nostrud culpa occaecat dolor est duis reprehenderit dolore quis nisi dolor ut officia.',
                'completed' => 0,
            ],
            [
                'id' => '222cf946-430f-4416-a544-d2f35eab15dd',
                'created' => '2021-02-10 11:47:16',
                'modified' => '2021-02-10 11:47:16',
                'project_id' => '655a8956-bc93-4bf0-bc01-50e984476af5',
                'name' => 'Sed sit commodo',
                'description' => 'Et sint proident consequat reprehenderit cupidatat consectetur reprehenderit labore dolor cupidatat cillum fugiat sed magna nostrud voluptate pariatur amet esse exercitation ut id in enim deserunt esse nostrud sunt sit veniam exercitation consequat. Lorem ipsum do sunt commodo sit duis veniam ad amet aute duis fugiat velit cupidatat commodo cupidatat in enim ex non et culpa irure sed sint excepteur et cupidatat non elit sunt non deserunt laboris.',
                'completed' => 0,
            ],
        ];
        parent::init();
    }
}
