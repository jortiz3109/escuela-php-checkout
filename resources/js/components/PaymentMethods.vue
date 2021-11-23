<template>
    <div class="flex gap-4 justify-center w-full">
        <button
            v-if="paymentMethods.DEBIT"
            class="bg-gray-200 border-2 border-gray-700 f focus:outline-none focus:ring-2 focus:ring-gray-700 focus:ring-offset-2 font-bold font-medium gap-2 hover:bg-gray-700 hover:text-white inline-flex items-center px-4 py-2 rounded-md shadow-sm text-sm"
            @click="selectCategory('DEBIT')"
            @mouseenter="hovers.debit = true"
            @mouseleave="hovers.debit = false"
        >
            <CardIcon
                fill="#374151"
                hover="#fff"
                :is-hover="hovers.debit"
                type="DEBIT"
            />
            Debit Card
        </button>
        <button
            v-if="paymentMethods.CREDIT"
            class="bg-gray-200 border-2 border-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-700 focus:ring-offset-2 font-bold font-medium gap-2 hover:bg-gray-700 hover:text-white inline-flex items-center px-4 py-2 rounded-md shadow-sm text-sm"
            @click="selectCategory('CREDIT')"
            @mouseenter="hovers.credit = true"
            @mouseleave="hovers.credit = false"
        >
            <CardIcon
                fill="#374151"
                hover="#fff"
                :is-hover="hovers.credit"
                type="CREDIT"
            />
            Credit Card
        </button>
    </div>
</template>

<script>
import useApi from '../use/useApi'
import { useHelpers, useStep } from '../use'
import CardIcon from './assets/CardIcon'
import { reactive } from 'vue'

export default {
    name: 'PaymentMethods',
    components: { CardIcon },

    async setup() {
        const { getPaymentMethods } = useApi()
        const { state } = useHelpers()
        const { stepForward } = useStep()

        const paymentMethodsData = await getPaymentMethods()

        let hovers = reactive({
            debit: false,
            credit: false,
        })

        const selectCategory = (category) => {
            state.paymentMethod.category = category
            stepForward()
        }

        return {
            hovers,
            selectCategory,
            paymentMethods: paymentMethodsData.data,
        }
    },
}
</script>
