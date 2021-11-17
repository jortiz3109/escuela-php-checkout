<template>
    <div class="flex flex-col h-full px-12 py-6 w-full">
        <div class="flex flex-grow items-center">
            <PayerData v-if="inStep(1)" />
            <SuspenseComponent v-if="inStep(2)">
                <PaymentMethods @select-payment-method="selectPaymentMethod"/>
            </SuspenseComponent>
            <CardData v-if="inStep(3)"/>
        </div>
        <TransactionFooter />
    </div>
</template>

<script>
import { ref } from 'vue'
import PayerData from './PayerData'
import PaymentMethods from './PaymentMethods'
import SuspenseComponent from './SuspenseComponent'
import CardData from './CardData'
import TransactionFooter from './TransactionFooter'
import useStep from '../use/useStep'

export default {
    name: 'Transaction',

    components: {
        CardData,
        PayerData,
        PaymentMethods,
        SuspenseComponent,
        TransactionFooter,
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
