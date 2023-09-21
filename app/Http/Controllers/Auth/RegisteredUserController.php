<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\EmailController;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use WireUi\Traits\Actions;

class RegisteredUserController extends Controller
{
    use Actions;
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        $user->assignRole('user');
        // to = pra quem vai ser enviado
        try {
            Mail::to("marciobastosn@gmail.com", "Solar-Project")->send(new EmailController([
                'fromName' => $request->name,
                'fromEmail' => $request->email,
                'subject' => "Novo Usuario registrado",
                'message' => "$request->name, se registrou na plataforma",
            ]));
        } catch (Exception $e) {
            $this->notification()->error(
                $title = "Error",
                $description = "Não foi possivel enviar o E-mail"
            );
        }

        Auth::login($user);

        return redirect()->route('cliente.home');
    }
}
