<template>
    <div >
        <step-progrees-bar-component></step-progrees-bar-component>
        <first-form-payment-component></first-form-payment-component>
    </div>
</template>

<script>
import FirstFormPaymentComponent from "./FirstFormPaymentComponent";
import StepProgreesBarComponent from './StepProgreesBarComponent.vue';
export default {
    components: { StepProgreesBarComponent,FirstFormPaymentComponent },
    data()
    {
        return {}
    },
    created()
    {

    },
    mounted() {
        console.log('Component mounted.')
    },
    methods:
    {
        
    }
}
</script>
