<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Course;
use App\Models\Curriculum;
use App\Models\Lead;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
//        $user = new User();
//        $user->name = 'Super Admin';
//        $user->email = 'super@admin.com';
//        $user->password = bcrypt('password');
//        $user->save();
//
//        or

//        $user = User::create([
//            'name' => 'Super Admin',
//            'email' => 'super-admin@lms.test',
//            'password' => bcrypt('password')
//        ]);
//
//        $role = Role::create(['name'=>'Super Admin']);
//
//        $permission = Permission::create([
//           'name' => 'create-admin'
//        ]);
//
//        $role->givePermissionTo($permission);
//        $permission->assignRole($role);
//
//        $user->assignRole($role);


//        $communicationRole = Role::create(['name' => 'communication']);
//
//        $user = User::create([
//            'name' => 'Super Admin',
//            'email' => 'communication@lms.test',
//            'password' => bcrypt('password')
//        ]);
//        $user->assignRole($communicationRole);

//

        $this->create_role_with_user('Super Admin', 'Super Admin', 'super-admin@lms.test');
        $teacher = $this->create_role_with_user('Teacher', 'Teacher', 'teacher@lms.test');
        $this->create_role_with_user('Communication', 'Communication Team', 'communication@lms.test');

        // create leads
        Lead::factory()->count(100)->create();

        // create course
        $course = Course::create([
            'name' => 'Laravel',
            'description' => 'Laravel is a free and open-source PHP web framework, created by Taylor Otwell and intended for the development of web applications following the model–view–controller architectural pattern and based on Symfony.',
            'image' => 'https://source.unsplash.com/N5bT5RctFZ8',
            'user_id' => $teacher->id,
        ]);

        // create curriculum
//        $curriculum = Curriculum::factory()->count(5)->create([
//            'course_id' => $course->id
//        ]);
        Curriculum::factory()->count(10)->create();
    }

    private function create_role_with_user($type, $name, $email){
        $role = Role::create([
            'name' => $type
        ]);
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt('password')
        ]);
        if($type == 'Super Admin'){
            $permission = Permission::create([
                'name' => 'create-admin'
            ]);
            $role->givePermissionTo($permission);
        }
        $user->assignRole($role);
        return $user;
    }
}
