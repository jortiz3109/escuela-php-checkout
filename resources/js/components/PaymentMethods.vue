<template>
  <div class="grid gap-8 lg:grid-cols-2">
    <div
      v-for="paymentMethod in paymentMethods"
      :key="paymentMethod.id"
      class="bg-white p-6 flex gap-5 justify-between items-center rounded-lg shadow cursor-pointer"
      @click="select(paymentMethod.id)"
    >
      <img
        :src="paymentMethod.logo"
        alt="logo"
        class="h-16 my-6 mx-4"
      >
      <h1 class="pr-8">
        {{ paymentMethod.name }}
      </h1>
    </div>
  </div>
</template>

<script>
import useApi from "../functions/useApi";

export default {
	name: 'PaymentMethods',

	emits: ['select-payment-method'],

	async setup(props, { emit }) {
        const { getPaymentMethods } = useApi();

        const paymentMethods = await getPaymentMethods();

		function select(paymentMethod) {
			emit('select-payment-method', paymentMethod);
		}

		return {
			paymentMethods,
			select,
		};
	}
};
</script>
