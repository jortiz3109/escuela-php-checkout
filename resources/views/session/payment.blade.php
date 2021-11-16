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

    <main class="flex justify-center py-8 px-16">
        <div class="flex w-full max-w-7xl rounded-3xl overflow-hidden shadow-lg">
            <section class="flex items-center w-full bg-gray-200">
                <Transaction></Transaction>
            </section>
            <section class="bg-blue-700 text-white">
                <div class="flex flex-col justify-center gap-12 w-full">
                    <div class="">
                        <p class="text-2xl">{{ $session->currency->alphabetic_code }}</p>
                        <p class="text-4xl text-bold text-center">
                            {{ \App\Helpers\MoneyHelper::formattedAmountFromInteger($session->total_amount, $session->currency) }}
                        </p>
                    </div>
                    <div class="flex flex-col gap-8">
                        <div class="flex justify-between items-baseline">
                            <p class="text-semibold text-xl">@lang('Reference')</p>
                            <p class="text-base pr-4">{{ $session->reference }}</p>
                        </div>
                        <div class="">
                            <p class="text-semibold text-xl pb-2">@lang('Description')</p>
                            <p class="text-justify">
                                {{ $session->description }}
                            </p>
                        </div>
                    </div>
                </div>
                <Countdown expiration="{{ $session->expiration->toDateTimeLocalString() }}"></Countdown>
            </section>
        </div>
    </main>
    @push('meta-data')
        <meta name="token" content="{{ $token ?? null }}">
        <meta name="session" content="{{ $session->uuid ?? null }}">
    @endpush
</x-app-layout>
