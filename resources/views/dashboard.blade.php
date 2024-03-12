<style>
    .form-container {
      position: relative;
      margin-top: 20px;
      top: 20%;
      left: 57.5%;
      transform: translate(-50%, -10%);
      padding: 20px;
      z-index: 1000; /* Больше, чем у overlay */
    }
    .j1
    {
        margin-top: 20px;  
    }
</style>
@if ($user_status == 1)
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Панель руководителя') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Сотруднки:") }}
                    @foreach ($employees as $emp)
                    <div class="alert alert-warning">
                        <h3>{{ $emp->name }}</h3>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Отчеты сотрудников:") }}<br>
                    @foreach($files as $file)
                        <li><a href="{{ asset($file->path) }}" download>{{ $file->name }}</a> ({{ $file->extension }}) - от: {{ $file->sender }}</li>
                    @endforeach
            </div>
        </div>
    </div>
    <div class="j1">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Список отправленных задач:") }}<br>
                    @foreach ($users_and_tasks as $user)
                    <h2>{{ $user->name }}</h2>
                        
                            @foreach ($user->tasks as $t)
                                <li>{{ $t->task }}</li>
                            @endforeach
                        
                    @endforeach
            </div>
        </div>
    </div>
</div>
</div>

                        <div class="form-container">
                            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                                <!-- Session Status -->
                           
                        <form method="post" action="/dashboard/add_task">
                            @csrf
                            @if(Session::has('error'))
                                <div class="alert alert-danger">
                                    {{ Session::get('error') }}
                                </div>
                            @endif <br>
                            {{-- @method('post') --}}
                            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                                {{ __('Добавить задачу') }}
                            </h2><br>
                        <div>
                            <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="fio">
                        ФИО получателя
                        </label>
                            <input class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" id="fio" type="text" name="fio" placeholder="Введите ФИО через пробелы">
                                    </div>
                        
                        <!-- задача -->
                        <div class="mt-4">
                            <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="text">
                        Задача
                        </label>
                        
                            <input class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" id="text" type="text" name="text" required="required">
                        
                                    </div>
                         <!-- дэдлайн -->
                        <div class="mt-4">
                            <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="datetime">
                        Дэдлайн
                            </label>
                                    
                            <input class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" id="datetime" type="datetime-local" name="datetime" required="required">
                                    
                                </div><br>
                            
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-3">
                        Отправить
                        </button>
                        </form>
                        </div>
                        </div>
    
</x-app-layout>
@else
    @include('about')
@endif
