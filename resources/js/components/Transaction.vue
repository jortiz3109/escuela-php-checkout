<template>
    <div class="flex flex-col h-full px-12 py-6 w-full">
        <TransactionHeader />
        <div class="flex flex-grow items-center">
            <PayerData v-if="inStep(1)" />
            <SuspenseComponent v-if="inStep(2)">
                <PaymentMethods />
            </SuspenseComponent>
            <CardInformation v-if="inStep(3)"/>
        </div>
        <TransactionFooter />
    </div>
</template>

<script>
import PayerData from './PayerData'
import PaymentMethods from './PaymentMethods'
import SuspenseComponent from './SuspenseComponent'
import CardInformation from './CardInformation'
import TransactionFooter from './TransactionFooter'
import useStep from '../use/useStep'
import TransactionHeader from './TransactionHeader'

export default {
    name: 'Transaction',

    components: {
        TransactionHeader,
        CardInformation,
        PayerData,
        PaymentMethods,
        SuspenseComponent,
        TransactionFooter,
    },

    setup() {
        const { inStep } = useStep()
        return { inStep }
    },
}
</script>
