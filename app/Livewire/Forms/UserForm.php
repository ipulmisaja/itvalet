<?php

declare(strict_types=1);

namespace App\Livewire\Forms;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Validate;
use Livewire\Form;

class UserForm extends Form
{
    #[Validate('required|min:5', onUpdate: false)]
    public ?string $name;

    #[Validate('required', onUpdate: false)]
    public ?string $role;

    #[Validate('required|email:rfc', onUpdate: false)]
    public ?string $email;

    #[Validate('required|numeric:min:9', onUpdate: false)]
    public $bps_id;

    #[Validate('required|numeric|min:18', onUpdate: false)]
    public $employee_id;

    #[Validate('required', onUpdate: false)]
    public $type;

    public $image;

    public function save(): string
    {
        try {
            DB::beginTransaction();

            $user = User::create([
                'name'        => $this->name,
                'email'       => $this->email ?? null,
                'username'    => explode("@", $this->email)[0] ?? null,
                'password'    => $this->type != 'Ruangan' ? bcrypt('itvalet7600') : null,
                'bps_id'      => $this->bps_id ?? null,
                'employee_id' => $this->employee_id ?? null,
                'type'        => $this->type,
                // 'photo'
            ]);

            $user->assignRole($this->role);

            DB::commit();

            $message = "Informasi pengguna telah disimpan.";
        } catch (Exception $error) {
            DB::rollBack();

            Log::error($error->getMessage());

            $message = "Informasi pengguna gagal disimpan.";
        }

        return $message;
    }

    public function update(User $user): string
    {
        try {
            DB::beginTransaction();

            $user->update([
                'name'        => $this->name,
                'email'       => $this->email ?? null,
                'username'    => explode("@", $this->email)[0] ?? null,
                'bps_id'      => $this->bps_id ?? null,
                'employee_id' => $this->employee_id ?? null,
                'type'        => $this->type,
                // 'photo'
            ]);

            $user->syncRoles($this->role);

            DB::commit();

            $message = "Informasi pengguna telah diperbaharui.";
        } catch (Exception $error) {
            DB::rollBack();

            Log::error($error->getMessage());

            $message = "Informasi pengguna gagal diperbaharui.";
        }

        return $message;
    }

    public static function changePassword(User $user, string $password): array
    {
        try {
            DB::beginTransaction();

            $user->update([
                'password' => bcrypt($password),
                'change_password' => true
            ]);

            DB::commit();

            $message = ["Kata sandi baru telah disimpan.", $user->change_password];
        } catch (Exception $error) {
            DB::rollBack();

            Log::error($error->getMessage());

            $message = ["Kata sandi gagal disimpan.", $user->change_password];
        }

        return $message;
    }
}
