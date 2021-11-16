<template>
    <div class="px-12 py-6 w-full">
        <PayerData v-if="inStep(1)" />
        <SuspenseComponent v-if="inStep(2)">
            <PaymentMethods @select-payment-method="selectPaymentMethod"/>
        </SuspenseComponent>
        <CardData v-if="inStep(3)"/>
        <Footer class="mt-16"/>
    </div>
</template>

<script>
import { ref } from 'vue'
import PayerData from './PayerData'
import PaymentMethods from './PaymentMethods'
import SuspenseComponent from './SuspenseComponent'
import CardData from './CardData'
import Footer from './TransactionFooter'
import useStep from '../use/useStep'

export default {
    name: 'Transaction',

    components: {
        CardData,
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
