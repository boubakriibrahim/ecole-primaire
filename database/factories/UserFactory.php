<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => 'إبراهيم',
            'prenom' => 'بوبكري',
            'email' => 'admin@gmail.com',
            'role' => 'superadmin',
            'password' => '$2y$10$B.57vztLRHAwIZ9jGa7MYOHmE1IAi6qBulQviP1nyg/B3nTTAIbW6', // password
            'remember_token' => 'XUJRpi9RcjUx8BdMXpLiecDZHwWXTpJCeU4mMxUhNYFku8SuwNBJfsMJBSN2',
            'date_naissance' => '1999-01-16',
            'adresse' => 'Compus Manouba, 2010',
            'phone' => '77441122',
            'profile_photo_path' => '1630274944-profile.jpeg',
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }

    /**
     * Indicate that the user should have a personal team.
     *
     * @return $this
     */
    public function withPersonalTeam()
    {
        if (! Features::hasTeamFeatures()) {
            return $this->state([]);
        }

        return $this->has(
            Team::factory()
                ->state(function (array $attributes, User $user) {
                    return ['name' => $user->name.'\'s Team', 'user_id' => $user->id, 'personal_team' => true];
                }),
            'ownedTeams'
        );
    }
}
