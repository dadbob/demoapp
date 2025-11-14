<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DemoController extends Controller
{
    public function dashboard()
    {
        $features = [
            'Blade layouts & sections',
            'Components with props & slots',
            'Attribute bags & merging',
            'Custom directives (@admin)',
            'Loop metadata ($loop->first / last)',
            'Stacks (@push / @stack)',
        ];

        return view('demo.dashboard', compact('features'));
    }

    public function users()
    {
        $users = $this->fakeUsers();
        return view('demo.users', compact('users'));
    }

    public function userDetails($id)
    {
        $users = $this->fakeUsers();

        if (!isset($users[$id])) {
            return response()->json(['error' => 'User not found'], 404);
        }

        return response()->json($users[$id]);
    }

    public function modals()
    {
        return view('demo.modals');
    }

    private function fakeUsers()
    {
        return [
            1 => ['id' => 1, 'name' => 'Alice Johnson', 'email' => 'alice@example.com', 'is_admin' => true, 'bio' => 'Alice is an experienced PM...'],
            2 => ['id' => 2, 'name' => 'Bruno Silva', 'email' => 'bruno@example.com', 'is_admin' => false, 'bio' => 'Bruno works in sales...'],
            3 => ['id' => 3, 'name' => 'Carla Santos', 'email' => 'carla@example.com', 'is_admin' => false, 'bio' => 'Carla is a designer...'],
        ];
    }
}
