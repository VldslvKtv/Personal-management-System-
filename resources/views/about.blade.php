<x-app-layout>
    <style>
    ol {
        list-style-type: decimal;
    }
    .bias
    {
        margin-left: 15px;
    }
    </style>
    

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Панель сотрудника') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        {{ __('Руководители:') }}
                    </h1>
                    @foreach ($users_admin as $us)
                    <div class="alert alert-warning">
                        <h3>{{ $us->name }}</h3>
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
                    <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        {{ __('Ваши задачи:') }}
                    </h1><br>
                    <ol>
                    <div class="bias">
                    @foreach ($tasks_current_user as $t)
                            <li>{{ $t->task }}</li>
                    @endforeach
                    </div>
                    </ol>
            </div>
        </div>
    </div>
</div>
        
    <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h1 style="margin-left: 12px;" class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                            {{ __('Загрузка отчета') }}
                        </h1><br>
                        <form action="/dashboard/uploadFile" method="post" enctype="multipart/form-data">
                            @csrf
                            @if(Session::has('error'))
                                <div class="alert alert-danger">
                                    {{ Session::get('error') }}
                                </div>
                            @endif <br>
                            <div style="margin-left: 12px;">
                                <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="fio">
                                    ФИО руководителя
                                    </label>
                                    <input style="width: 500px;" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" id="fio" type="text" name="fio" placeholder="Введите ФИО через пробелы">
                            </div><br>
                            <div style="margin-left: 12px;">
                                <input type="file" name="file"><br>
                            </div>
                            <div style="margin-top: 20px;">
                                <x-primary-button class="ms-3">
                                    {{ __('Загрузить файл') }}
                                </x-primary-button>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
                   
    
</x-app-layout>