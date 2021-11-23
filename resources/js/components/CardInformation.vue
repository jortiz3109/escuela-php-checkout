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
                    label="Card number"
                    placeholder="0000 0000 0000 0000"
                    :cleave="cardNumberOptions"
                    @focusout="requestCardSettings"
                />
            </div>
            <div class="gap-2 grid grid-cols-2">
                <custom-input
                    id="date"
                    v-model="expiration"
                    label="Expiration"
                    placeholder="MM/YY"
                    :cleave="dateOptions"
                />
                <custom-input
                    v-if="settings.cardholderName"
                    id="cardholderName"
                    v-model="cardholderName"
                    label="Name on the card"
                    maxlength="120"
                />
                <custom-input
                    v-if="settings.cvv"
                    id="cvv"
                    v-model="cvv"
                    label="Security code"
                    placeholder="CVV"
                    :maxlength="settings.cvv.toString()"
                />
                <custom-input
                    v-if="settings.pin"
                    id="pin"
                    v-model="pin"
                    label="Pin"
                    placeholder="***"
                    :maxlength="settings.pin.toString()"
                />
            </div>
            <custom-button
                text="Pay"
                class="justify-center"
                :disabled="payDisabled"
                @click="pay"
            />
        </div>
    </div>
</template>

<script>
import { computed, ref } from 'vue'
import { useApi, useStore } from '../use'
import CardIcon from './assets/CardIcon'
import CustomInput from './custom_fields/inputs/CustomInput'
import CustomButton from './custom_fields/buttons/CustomButton'

export default {
    name: 'CardInformation',
    components: { CustomButton, CustomInput, CardIcon },
    setup() {
        let title
        const { state } = useStore()
        const { postValidateCardSettings } = useApi()
        const category = state.paymentMethod.category

        if (category === 'DEBIT') title = 'Debit Card'
        else title = 'Credit Card'

        const cardNumber = ref()
        const expiration = ref()
        const cardholderName = ref()
        const cvv = ref()
        const pin = ref()

        const defaultSettings = {
            expiration: true,
            cardholderName: false,
            cvv: false,
            pin: false,
        }

        const settings = ref(defaultSettings)

        const payDisabled = computed(() => {
            if (!cardNumber.value) return true
            if (settings.value.expiration && !expiration.value) return true
            if (settings.value.cardholderName && !cardholderName.value) return true
            if (settings.value.cvv && !cvv.value) return true
            return settings.value.pin && !pin.value
        })

        const pay = () => {
            console.log({
                payer: state.payer,
                cardInformation: {
                    cardNumber: cardNumber.value,
                    expiration: expiration.value,
                    cardholderName: cardholderName.value,
                    cvv: cvv.value,
                    pin: pin.value,
                }
            })
        }

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

        const requestCardSettings = async () => {
            const response = await postValidateCardSettings({ cardNumber: cardNumber.value })
            if (response['settings']) settings.value = response.settings
            else settings.value = defaultSettings
        }

        return {
            title,
            category,
            cardNumberOptions,
            dateOptions,
            cardNumber,
            cardholderName,
            expiration,
            cvv,
            pin,
            settings,
            payDisabled,
            pay,
            requestCardSettings,
        }
    },
}
</script>
