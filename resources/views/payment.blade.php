@extends('layouts.app')

@section('title', __('message.comfirmPayment'))
@csrf
@section('content')
    <payment-component>
        <template slot="ownerData">
            {{__('message.ownerData')}}
        </template>
        <template slot="paymentMethod">
            {{__('message.paymentMethod')}}
        </template>
        <template slot="payment">
            {{__('message.payment')}}
        </template>
        <template slot="result">
            {{__('message.result')}}
        </template>
        <template slot="totalToPay">
            {{__('message.totalToPay')}}
        </template>
        <template slot="reference">
            {{__('message.reference')}}
        </template>
        <template slot="description">
            {{__('message.description')}}
        </template>
        <template slot="date">
            {{__('message.date')}}
        </template>
        <template slot="email">
            {{__('message.email')}}
        </template>
        <template slot="documentType">
            {{__('message.documentType')}}
        </template>
        <template slot="identificationDocument">
            {{__('message.identificationDocument')}}
        </template>
        <template slot="names">
            {{__('message.names')}}
        </template>
        <template slot="lastName">
            {{__('message.lastName')}}
        </template>
        <template slot="phoneNumber">
            {{__('message.phoneNumber')}}
        </template>
        <template slot="continue">
            {{__('message.continue')}}
        </template>
    </payment-component>
@endsection