<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-6">
            <img src="{{ $session->merchant->logo }}" alt="{{ $session->merchant->name }}" class="h-16 rounded-full shadow-lg border border-gray-300">
            <h1 class="text-bold text-gray-700 text-2xl tracking-wide">{{ $session->merchant->display_name }}</h1>
        </div>
        <div class="w-1/3">
            <Stepper></Stepper>
        </div>
    </x-slot>

    <main class="flex justify-center py-8 h-full max-h-192">
        <div class="flex w-full max-w-7xl rounded-3xl overflow-hidden shadow-lg">
            <section class="w-full bg-gray-200">
                <Transaction></Transaction>
            </section>
            <section class="flex flex-col gap-5 bg-blue-700 text-white p-6 min-w-96">
                <div>
                    <p class="text-xl">{{ $session->currency->alphabetic_code }}</p>
                    <p class="text-4xl text-bold text-center">
                        {{ \App\Helpers\MoneyHelper::formattedAmountFromInteger($session->total_amount, $session->currency) }}
                    </p>
                </div>
                <div class="flex justify-between items-center">
                    <p class="text-bold text-xl">@lang('Reference')</p>
                    <p>{{ $session->reference }}</p>
                </div>
                <div>
                    <p class="text-bold text-xl pb-1">@lang('Description')</p>
                    <p>
                        {{ $session->description }}
                    </p>
                </div>
                <Countdown @class('mt-auto') expiration="{{ $session->expiration->toDateTimeLocalString() }}"></Countdown>
            </section>
        </div>
    </main>
    @push('meta-data')
        <meta name="token" content="{{ $token ?? null }}">
        <meta name="session" content="{{ $session->uuid ?? null }}">
    @endpush
</x-app-layout>
