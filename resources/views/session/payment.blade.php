@extends('layouts.app')

@section('content')
    <div class="h-full">
        <div class="bg-gray-100 p-4">
            <progress-bar></progress-bar>
            </div>
        </div>
        <div>
            <ul>
                @foreach($paymentMethods as $paymentMethod)
                    <li>{{ $paymentMethod->name }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
