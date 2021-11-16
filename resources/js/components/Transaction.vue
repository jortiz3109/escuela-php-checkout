<template>
    <div class="flex flex-col h-full items-center justify-between w-full">
        <div class="flex h-5/6 items-center justify-items-center mt-12">
            <PayerData v-if="inStep(1)" class="mt-20"/>
            <SuspenseComponent v-if="inStep(2)">
                <PaymentMethods @select-payment-method="selectPaymentMethod"/>
            </SuspenseComponent>
        </div>
        <Footer class="h-1/6"/>
    </div>
</template>

<script>
import { ref } from 'vue'
import PayerData from './PayerData'
import PaymentMethods from './PaymentMethods'
import SuspenseComponent from './SuspenseComponent'
import Footer from './Footer'
import useStep from '../use/useStep'

export default {
    name: 'Transaction',

    components: {
        PayerData,
        PaymentMethods,
        SuspenseComponent,
        Footer,
    },

    setup() {
        const { step, stepForward, inStep } = useStep()

        const paymentMethods = ref({})

        function selectPaymentMethod(values) {
            paymentMethods.value = values
            stepForward()
        }

        return {
            step,
            inStep,
            selectPaymentMethod,
        }
    },
}
</script>
