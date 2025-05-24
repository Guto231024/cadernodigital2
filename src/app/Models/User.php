<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_photo_path', // adiciona isso se ainda não estiver
    ];

    /**
     * The attributes that should be hidden for arrays.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the image URL to display in AdminLTE.
     */
    public function adminlte_image()
    {
        return $this->profile_photo_path
            ? asset('storage/' . $this->profile_photo_path)
            : asset('images/default-avatar.png'); // imagem padrão
    }

    /**
     * Get the description to display in AdminLTE user menu.
     */
    public function adminlte_desc()
    {
        return $this->email; // ou outra info como cargo
    }

    /**
     * Get the profile URL for the AdminLTE user menu.
     */
    public function adminlte_profile_url()
    {
        return route('profile.show'); // ajuste para a rota de perfil se diferente
    }
}
