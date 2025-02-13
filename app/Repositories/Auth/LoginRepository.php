<?php 

namespace App\Repositories\Auth;

use App\Interfaces\Auth\LoginRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginRepository implements LoginRepositoryInterface
{
    /** 
     * @var User
     */
    protected $user;

    /** 
     * LoginRepository constructor.
     * 
     * @param User $post 
     */

    function __construct(User $user)
    {
        $this->user = $user;
    }
    
    public function login($request): bool
    {
        return Auth::attempt(['email' => $request->email, 'password' => $request->password]);
    }

}