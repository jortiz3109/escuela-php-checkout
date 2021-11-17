<template>
    <div class="flex justify-center w-full">
        <div class="flex flex-col gap-2">
            <div class="flex gap-2 items-center">
                <CardIcon fill="#4B5563" :type="category"/>
                <h1 class="font-black text-gray-600 text-xl">{{ title }}</h1>
            </div>
            <div>
                <custom-input
                    id="cardNumber"
                    v-model="cardNumber"
                    placeholder="0000 0000 0000 0000"
                    :cleave="cardNumberOptions"
                />
            </div>
            <div class="flex gap-2">
                <custom-input
                    id="date"
                    v-model="cardDate"
                    placeholder="MM/YY"
                    :cleave="dateOptions"
                />
                <custom-input
                    id="cvv"
                    v-model="cardCvv"
                    placeholder="CVV"
                    maxlength="3"
                />
            </div>
            <custom-button text="Pay" class="justify-center" @click="processPayment"/>
        </div>
    </div>
</template>

<script>
import CustomInput from './CustomInput'
import CardIcon from './assets/CardIcon'
import { useApi, useHelpers } from '../use'
import { ref } from 'vue'
import CustomButton from './CustomButton'

export default {
    name: 'CardInformation',
    components: { CustomButton, CustomInput, CardIcon },
    setup() {
        let title
        const { state } = useHelpers()
        const { postValidateCardInformation } = useApi()
        const category = state.paymentMethod.category

        if (category === 'DEBIT') title = 'Debit Card'
        else title = 'Credit Card'

        const cardNumber = ref()
        const cardDate = ref()
        const cardCvv = ref()

        const cardNumberOptions = {
            creditCard: true,
            delimiter: ' ',
            onCreditCardTypeChanged: function (type) {
                console.log(type)
            },
        }
        const dateOptions = {
            date: true,
            datePattern: ['m', 'y'],
        }

        const processPayment = () => {
            const body = {
                category,
                cardNumber: cardNumber.value,
                month: cardDate.value.substr(0,2),
                year: cardDate.value.substr(2,2),
                cvv: cardCvv.value
            }

            postValidateCardInformation(body)
        }

        return { title, category, cardNumberOptions, dateOptions, cardNumber, cardDate, cardCvv, processPayment }
    },
}
</script>
