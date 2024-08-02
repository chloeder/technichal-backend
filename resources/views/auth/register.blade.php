@extends('layouts.auth')
@section('content')
    <div class="flex justify-center items-center min-h-screen">
        <div class="border-2 p-4 m-auto rounded-lg shadow-xl w-[500px]">
            <h1 class="text-2xl font-bold text-center">Register</h1>
            <p class="text-center text-gray-400">Already have an account? <a href="{{ route('loginView') }}"
                    class="text-blue-500">Login</a>
            </p>
            <form action="{{ route('register') }}" method="post" class="flex flex-col gap-5 w-full mt-5">
                @csrf
                <div class="flex flex-col">
                    <label for="name">Full Name</label>
                    <input id="name" type="text" placeholder="Full Name" name="name" value="{{ old('name') }}"
                        class="p-2 rounded-md @error('name') border-red-500 text-red-900 placeholder-red-700 @enderror">
                    @error('name')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="flex flex-col">
                    <label for="username">Username</label>
                    <input id="username" type="text" placeholder="Username" name="username"
                        value="{{ old('username') }}"
                        class="p-2 rounded-md @error('username') border-red-500 text-red-900 placeholder-red-700 @enderror">
                    @error('username')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="flex flex-col">
                    <label for="email">Email Address</label>
                    <input id="email" type="email" placeholder="Email Address" name="email"
                        value="{{ old('email') }}"
                        class="p-2 rounded-md @error('email') border-red-500 text-red-900 placeholder-red-700 @enderror">
                    @error('email')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="flex flex-col">
                    <label for="password">Password</label>
                    <input type="password" placeholder="Password" name="password"
                        class="p-2 rounded-md @error('password') border-red-500 text-red-900 placeholder-red-700 @enderror">
                    @error('password')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="flex flex-col">
                    <label for="confirm-password">Confirm Password</label>
                    <input type="password" placeholder="Confirm Password" name="password_confirmation"
                        class="p-2 rounded-md @error('password_confirmation') border-red-500 text-red-900 placeholder-red-700 @enderror">
                    @error('password_confirmation')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <button type="submit" class="bg-blue-500 text-white p-2 rounded-md">Login</button>
            </form>
        </div>
    </div>
@endsection
