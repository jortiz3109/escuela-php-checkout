<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-6">
            <img src="https://picsum.photos/id/1/400/400" alt="merchant-log" class="h-16 rounded-full shadow">
            <h1 class="text-bold text-gray-700 text-2xl tracking-wide">{{ $session->merchant->display_name }}</h1>
        </div>
        <div>
            stepper
        </div>
    </x-slot>

    <main class="px-16 py-10 bg-white flex flex-grow rounded-3xl flex">
        <section class="w-3/4 bg-gray-200 flex items-center justify-center rounded-l-3xl">
            <transaction></transaction>
        </section>
        <section
            class="w-1/4 bg-blue-900 text-white flex flex-col items-center justify-between rounded-r-3xl px-8 pt-24 pb-14">
            <div class="flex flex-col justify-center gap-12 w-full">
                <div class="">
                    <p class="text-2xl">{{ $session->currency->alphabetic_code }}</p>
                    <p class="text-4xl text-bold text-center">{{ $session->total_amount }}</p>
                </div>
                <div class="flex flex-col gap-8">
                    <div class="flex justify-between">
                        <p class="text-semibold text-xl">{{ __('Reference') }}</p>
                        <p class="text-base pr-4">{{ $session->reference }}</p>
                    </div>
                    <div class="">
                        <p class="text-semibold text-xl pb-2">{{ __('Description') }}</p>
                        <p class="text-base">
                            {{ $session->description }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="flex justify-center px-10">La sesion expirara en: 00:14:59</div>
        </section>
    </main>
</x-app-layout>
