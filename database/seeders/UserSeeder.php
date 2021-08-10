<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Athlete;
use App\Models\Coach;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    private $password = 'password';
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $self = $this;
        User::factory(1)
            ->make([
                'name' => 'Geovane Krüger',
                'email' => 'admin@user.com',
            ])->each(function ($user) use ($self){
                Admin::createUser([
                    'user' => $self->userToArray($user)
                ]);
            });

        User::factory(1)
            ->make([
                'name' => 'Geovane Krüger',
                'email' => 'geovanek@gmail.com',
                'phone' => '00000000',
                'cpf' => '01234567890',
                'company_owner_id' => 1,
            ])->each(function ($user) use ($self){
                Coach::createUserAndAthlete([
                    'user' => $self->userToArray($user),
                    'company_id' => 1,
                    'role' => Coach::ROLE_HEAD_COACH,
                ]);
            });

        //\Tenant::setTenant(Company::find(1));
        User::factory(1)
            ->make([
                'email' => 'coach1@user.com',
            ])->each(function ($user) use ($self){
                Coach::createUserAndAthlete([
                    'user' => $self->userToArray($user),
                    'role' => Coach::ROLE_COACH,
                    'company_id' => 1,
                ]);
            });

        //\Tenant::setTenant(Company::find(2));
        User::factory(1)
            ->make([
                'email' => 'coach2@user.com',
                'company_owner_id' => 2,
            ])->each(function ($user) use ($self){
               Coach::createUserAndAthlete([
                    'user' => $self->userToArray($user),
                    'role' => Coach::ROLE_HEAD_COACH,
                    'company_id' => 2,
                ]);
            });

        User::factory(1)
            ->make([
                'email' => 'coach3@user.com',
                'company_owner_id' => 3,
            ])->each(function ($user) use ($self){
                Coach::createUserAndAthlete([
                    'user' => $self->userToArray($user),
                    'role' => Coach::ROLE_HEAD_COACH,
                    'company_id' => 3,
                ]);
            });

        User::factory(1)
            ->make([
                'email' => 'coach4@user.com',
                'company_owner_id' => 4,
            ])->each(function ($user) use ($self){
               Coach::createUserAndAthlete([
                    'user' => $self->userToArray($user),
                    'role' => Coach::ROLE_HEAD_COACH,
                    'company_id' => 4,
                ]);
            });
        
        User::factory(1)
            ->make([
                'email' => 'coach5@user.com',
                'company_owner_id' => 5,
            ])->each(function ($user) use ($self){
               Coach::createUserAndAthlete([
                    'user' => $self->userToArray($user),
                    'role' => Coach::ROLE_HEAD_COACH,
                    'company_id' => 5,
                ]);
            });

        User::factory(1)
            ->make([
                'email' => 'athlete1@user.com',
            ])->each(function ($user) use ($self){
                Athlete::createUser([
                    'user' => $self->userToArray($user),
                    'company_id' => 1,
                    'coach_id' => 1,
                ]);
            });

        //\Tenant::setTenant(Company::find(1));
        User::factory(1)
            ->make([
                'email' => 'athlete2@user.com',
            ])->each(function ($user) use ($self){
                Athlete::createUser([
                    'user' => $self->userToArray($user),
                    'company_id' => 1,
                    'coach_id' => 2,
                ]);
            });

        //\Tenant::setTenant(Company::find(2));
        User::factory(1)
            ->make([
                'email' => 'athlete3@user.com',
            ])->each(function ($user) use ($self){
                Athlete::createUser([
                    'user' => $self->userToArray($user),
                    'company_id' => 2,
                    'coach_id' => 3,
                ]);
            });

        User::factory(1)
            ->make([
                'email' => 'athlete4@user.com',
            ])->each(function ($user) use ($self){
               Athlete::createUser([
                    'user' => $self->userToArray($user),
                    'company_id' => 1,
                    'coach_id' => 1,
                ]);
            });
    }

    private function userToArray($user)
    {
        return $user->toArray() + ['password' => $this->password];
    }
}
