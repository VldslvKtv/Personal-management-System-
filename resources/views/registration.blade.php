@extends('base')

@section('title')
    Регистрация и вход
@endsection

@section('main_content')

     @if ($errors->any())
         <div  class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
         </div>
     @endif
     {{-- <div class="form-container">
    <form method="POST" action="/registration/check"> 
        @csrf
        <input type="email" name="email" id="email" placeholder="Введите email..." class="form-control"><br>
        <input type="text" name="text" id="text" placeholder="Введите text..." class="form-control"><br>
        <textarea name="message" id="message" class="form-control" ></textarea><br>
        <button type="submit" class="btn btn-success">Отправить</button>
    </form>
  </div> --}}
  <div class="form-container">
    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
        <!-- Session Status -->
   
<form method="POST" action="http://127.0.0.1:8000/login" >
<input type="hidden" name="_token" value="Kk0z9aGFWkgNveDFwZ2TNfjsdlyxNVv8m6TOyf1I" autocomplete="off">
<!-- Email Address -->
<div>
    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="email">
Email
</label>
    <input class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" id="email" type="email" name="email" required="required" autofocus="autofocus" autocomplete="username">
            </div>

<!-- Password -->
<div class="mt-4">
    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="password">
Password
</label>

    <input class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" id="password" type="password" name="password" required="required" autocomplete="current-password">

            </div>

<!-- Remember Me -->
<div class="block mt-4">
    <label for="remember_me" class="inline-flex items-center">
        <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
        <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">Remember me</span>
    </label>
</div>

<div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="http://127.0.0.1:8000/forgot-password">
            Forgot your password?
        </a>
    
    <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-3">
Log in
</button>
</div>
</form>
</div>
    </div>

    <h2>Что есть:</h2>
    @foreach ($records as $item)
        <div class="alert alert-warning">
            <h3>{{ $item->email }}</h3>
        </div>
    @endforeach
@endsection