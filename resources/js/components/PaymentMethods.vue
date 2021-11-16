<template>
    <div class="gap-8 grid lg:grid-cols-2">
        <div
            v-for="paymentMethod in paymentMethods"
            :key="paymentMethod.id"
            class="bg-white
                cursor-pointer
                flex
                gap-5
                items-center
                justify-between
                p-6
                rounded-lg
                shadow"
            @click="select(paymentMethod.id)"
        >
            <img :src="paymentMethod.logo" alt="logo" class="h-16 mx-4 my-6" />
            <h1 class="pr-8">
                {{ paymentMethod.name }}
            </h1>
        </div>
    </div>
</template>

<script>
import useApi from '../use/useApi'

export default {
  name: 'PaymentMethods',

  emits: ['select-payment-method'],

  async setup(props, { emit }) {
    const { getPaymentMethods } = useApi()

    const paymentMethods = await getPaymentMethods()

    function select(paymentMethod) {
      emit('select-payment-method', paymentMethod)
    }

    return {
      paymentMethods,
      select,
    }
  },
}
</script>
