<?php

namespace App\Actions\Fortify;

use App\Models\Customer;
use App\Models\Newsletter;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{

    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param array $input
     * @return \App\Models\User
     */
    public function create(array $input) {
        Validator::make($input, [
            'username'         => ['required', 'string', 'min:5','max:255', Rule::unique(User::class)],
            'email'            => ['required', 'string', 'email', 'max:255', Rule::unique(User::class)],
            'password'         => $this->passwordRules(),
            'first_name'       => ['required', 'string', 'max:255'],
            'last_name'        => ['required', 'string', 'max:255'],
            'address_line_one' => ['required', 'string', 'max:255'],
            'address_line_two' => ['nullable', 'string', 'max:255'],
            'country'          => ['required', 'string', 'max:255'],
            'city'             => ['required', 'string', 'max:255'],
            'zip_code'         => ['required', 'max:255'],
            'phone'            => ['required', 'max:255'],
            'referrer_id'      => ['nullable', 'max:255'],
            'newsletter'       => ['nullable'],
            'terms'            => ['required'],
        ])->validate();

        $user = User::create([
            'email'            => $input['email'],
            'username'         => $input['username'],
            'password'         => Hash::make($input['password']),
            'first_name'       => $input['first_name'],
            'last_name'        => $input['last_name'],
            'address_line_one' => $input['address_line_one'],
            'address_line_two' => $input['address_line_two'],
            'country'          => $input['country'],
            'city'             => $input['city'],
            'zip_code'         => $input['zip_code'],
            'phone'            => $input['phone'],
            'referrer_id'      => $input['referrer_id'],
            'newsletter'       => $input['newsletter'] ?? null,
            'terms'            => $input['terms'],
            'referral_id'      => Str::upper(Str::random(5) . $input['username'] . Str::random(5))
        ]);

        Customer::create([
            'user_id' => $user->id
        ]);

        if ($user->newsletter == 1) {
            Newsletter::create([
                'email' => $user->email
            ]);
        }

        return $user;
    }
}
