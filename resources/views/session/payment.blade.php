@extends('layouts.app')

@section('content')
    <h1>Payments</h1>
    <steps-bar/>
    <ul>
        @foreach($paymentMethods as $paymentMethod)
            <li>{{ $paymentMethod->name }}</li>
        @endforeach
    </ul>
@endsection
