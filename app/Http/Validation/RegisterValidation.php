<?php
namespace App\Http\Validation;

class RegisterValidation{
    public function rules(){
        return [
            'name'=>['required', 'string', 'max:150', 'min:3'],
            'email'=>['required', 'string', 'email', 'max:150', 'min:3', 'unique:users'],
            'password'=>['required', 'string', 'min:8'],
            'confirm_password'=>['required', 'same:password']
        ];
    }
    public function messages(){
        return [
            'name.required'=>'Veuillez renseigner un pseudo',
            'name.min'=>'Le pseudo doit comporter au moins 3 charactères',
            'name.max'=>'Le pseudo est trop long, il doit comporter maximun 150 charactères',
            'email.required'=>'Veuillez renseigner un email',
            'email.unique'=>'Cet email est déjà utilisé',
            'email.email'=>'Veuillez rentrer un email valide',
            'password.min'=>'Votre mot de passe doit faire au minimum 8 caractères',
            'password.required'=>'Veuillez renseigner un mot de passe',
            'confirm_password.required'=>'La confirmation du mot de passe est nécessaire',
            'confirm_password.same'=>'Votre mot de passe et votre mot de passe de confirmation doivent être identique'
        ];
    }
}