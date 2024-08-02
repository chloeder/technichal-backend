@extends('layouts.auth')
@section('content')
    <div class="flex justify-center items-center min-h-screen">
        <div class="border-2 p-4 m-auto rounded-lg shadow-xl w-[500px]">
            <h1 class="text-2xl font-bold text-center">Login</h1>
            <p class="text-center text-gray-400">Don't have an account? <a href="{{ route('registerView') }}"
                    class="text-blue-500">Register</a>
            </p>
            <form action="{{ route('login') }}" method="post" class="flex flex-col gap-5 w-full mt-5">
                @csrf
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
                    <label for="password">Password</label>
                    <input type="password" placeholder="Password" name="password"
                        class="p-2 rounded-md @error('password') border-red-500 text-red-900 placeholder-red-700 @enderror">
                    @error('password')
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
