<?php namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class UserController extends Controller
{
    // Register User
    public function register()
    {
        return view('users/register');
    }

    public function create()
    {
        $userModel = new UserModel();

        $data = [
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'password' => $this->request->getVar('password'),
        ];

        if ($userModel->insert($data)) {
            return redirect()->to('/user/login')->with('success', 'Registration successful. Please login.');
        } else {
            return redirect()->back()->with('error', 'Registration failed.');
        }
    }

    // User Login
    public function login()
    {
        return view('users/login');
    }

    public function authenticate()
    {
        $userModel = new UserModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
    
        // Fetch the user by username
        $user = $userModel->where('username', $username)->first();
    
        // Verify the password and proceed with login if valid
        if ($user && password_verify($password, $user['password'])) {
            // Set session data
            session()->set([
                'user_id'    => $user['id'],
                'username'   => $user['username'],
                'isLoggedIn' => true
            ]);
    
            // Redirect to user profile on successful login
            return redirect()->to('')->with('success', 'Logged in successfully.');
        } else {
            // Redirect back to the previous page with an error if login fails
            return redirect()->back()->with('error', 'Invalid login credentials.');
        }
    }
    

    // User Logout
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/user/login')->with('success', 'Logged out successfully.');
    }

    // Update User Profile
    public function updateProfile()
    {
        $userModel = new UserModel();
        $userId = session()->get('user_id');
    
        if (!$userId) {
            return redirect()->to('/user/login');
        }
    
        $user = $userModel->find($userId);
    
        if ($this->request->getMethod() == 'post') {
            $data = [
                'username' => $this->request->getVar('username'),
                'email' => $this->request->getVar('email')
            ];
    
            // Update the user record
            if ($userModel->update($userId, $data)) {
                return redirect()->back()->with('success', 'Profile updated successfully.');
            } else {
                return redirect()->back()->with('error', 'Profile update failed.');
            }
        }
    
        return view('users/profile', ['user' => $user]);
    }
    
}
?>