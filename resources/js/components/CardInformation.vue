<template>
    <div class="flex justify-center w-full">
        <div class="flex flex-col gap-2">
            <div class="flex gap-2 items-center">
                <CardIcon fill="#4B5563" :type="category"/>
                <h1 class="font-black text-gray-600 text-xl">{{ title }}</h1>
            </div>
            <div>
                <custom-input id="cardNumber" placeholder="0000 0000 0000 0000"/>
            </div>
            <div class="flex gap-2">
                <custom-input id="date" placeholder="MM/YY" />
                <custom-input id="cvv" placeholder="CVV" />
            </div>
        </div>
    </div>
</template>

<script>
import CustomInput from './CustomInput'
import CardIcon from './assets/CardIcon'
import { useHelpers } from '../use'
export default {
    name: 'CardInformation',
    components: { CustomInput, CardIcon },
    setup() {
        const { state } = useHelpers()
        let title
        const category = state.paymentMethod.category
        if (category === 'DEBIT') title = 'Debit Card'
        else title = 'Credit Card'
        return { title, category }
    }
}
</script>
