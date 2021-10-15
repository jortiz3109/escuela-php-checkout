<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased flex flex-col">
            <!-- Page Heading -->
        <header class=" bg-gray-100 shadow flex justify-between items-center py-3 px-4 sm:px-6 lg:px-12">
            <div class="flex items-center gap-6">
                <img src="https://picsum.photos/id/1/400/400" alt="merchant-log" class="h-16 rounded-full shadow">
                <h1 class="text-bold text-gray-700 text-2xl tracking-wide">Merchant Name</h1>
            </div>
            <div>
                stepper
            </div>
        </header>

    <!-- Page Content -->
        <main class="px-16 py-10 bg-white flex flex-grow">
            <div class="rounded-3xl flex">
                <section class="w-3/4 bg-gray-200 flex items-center justify-center rounded-l-3xl">
                    <transaction></transaction>
                </section>
                <section class="w-1/4 bg-blue-900 text-white flex flex-col items-center justify-between rounded-r-3xl px-8 pt-24 pb-14">
                    <div class="flex flex-col justify-center gap-12">
                        <div class="">
                            <p class="text-2xl">COP</p>
                            <p class="text-4xl text-bold text-center">$ 10.500.000,00</p>
                        </div>
                        <div class="flex flex-col gap-6">
                            <div class="flex justify-between">
                                <p class="text-semibold text-xl">Referencia</p>
                                <p class="text-base pr-4">1798327091-2</p>
                            </div>
                            <div class="">
                                <p class="text-semibold text-xl pb-2">Description</p>
                                <p class="text-base">
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-center px-10">La sesion expirara en: 00:14:59</div>
                </section>
            </div>
        </main>
    </body>
</html>
