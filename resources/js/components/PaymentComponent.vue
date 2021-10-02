<template>
    <div >
        <step-progrees-bar-component :current-steps="currentSteps">
            <template v-slot:ownerData>
                <slot name="ownerData">Owner data</slot>
            </template>
            <template v-slot:paymentMethod>
                <slot name="paymentMethod">Payment method</slot>
            </template>
            <template v-slot:payment>
                <slot name="payment">Payment</slot>
            </template>
            <template v-slot:result>
                <slot name="result">Result</slot>
            </template>
        </step-progrees-bar-component>
        <first-form-payment-component
            @nextStep="nextStep" :current-step="currentStep"
            >
            <template v-slot:totalToPay>
                <slot name="totalToPay">Total to pay</slot>
            </template>
            <template v-slot:reference>
                <slot name="reference">Reference</slot>
            </template>
            <template v-slot:description>
                <slot name="description">Description</slot>
            </template>
            <template v-slot:date>
                <slot name="date">Date</slot>
            </template>
            <template slot="email">
                <slot name="email">Email</slot>
            </template>
            <template slot="documentType">
                <slot name="documentType">Document Type</slot>
            </template>
            <template slot="identificationDocument">
                <slot name="identificationDocument">Identification Document</slot>
            </template>
            <template slot="names">
                <slot name="names">Names</slot>
            </template>
            <template slot="lastName">
                <slot name="lastName">Last Name</slot>
            </template>
            <template slot="phoneNumber">
                <slot name="phoneNumber">Phone Number</slot>
            </template>
            <template slot="continue">
                <slot name="continue">Continue</slot>
            </template>
        </first-form-payment-component>
    </div>
</template>

<script>
import FirstFormPaymentComponent from "./FirstFormPaymentComponent";
import StepProgreesBarComponent from './StepProgreesBarComponent.vue';
export default {
    components: { StepProgreesBarComponent,FirstFormPaymentComponent },
    data()
    {
        return {
            steps:[
                "ownerData",
                "paymentMethod",
                "payment",
                "result",
            ],
            currentStep: 0,
            currentSteps: ["ownerData"]
        }
    },
    created()
    {

    },
    mounted() {
        
    },
    methods:
    {
        nextStep(step)
        {
            //console.log();
            if(step >= this.steps.length)
            {
                return false;
            }
            this.currentSteps.push(this.steps[step])
            this.currentStep = step;
            //console.log(this.currentStep)
        }
    }
}
</script>
