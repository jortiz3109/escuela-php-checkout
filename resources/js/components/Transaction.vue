<template>
  <div class="flex flex-col h-full justify-between">
    <div class="flex items-center justify-items-center h-5/6">
      <PayerData
        v-if="step === 1"
        :payer="payer"
        @save-payer="savePayerData"
      />
      <div v-if="suspenseError">
        {{ suspenseError }}
      </div>
      <Suspense v-else>
        <template #default>
          <PaymentMethods
            v-if="step === 2"
            @select-payment-method="selectPaymentMethod"
          />
        </template>
        <template #fallback>
          Loading..
        </template>
      </Suspense>
    </div>
    <div class="grid grid-cols-2 items-baseline h-1/6 w-full">
      <button
        v-if="step > 1"
        class="bg-gray-500 text-white shadow py-3 px-12 my-8 rounded-lg justify-self-start hover:bg-gray-700"
        @click="stepBack"
      >
        Back
      </button>
      <a
        v-if="step < 4"
        href="#"
        class="p-2 my-8 justify-self-end col-start-2 underline text-gray-500 hover:text-blue-900"
      >Do not want to continue</a>
    </div>
  </div>
</template>

<script>
import { ref, onErrorCaptured } from 'vue';
import PayerData from './PayerData';
import PaymentMethods from './PaymentMethods';

export default {
	name: 'Transaction',

	components: {
		PayerData,
		PaymentMethods,
	},

	setup() {
		const step = ref(1);

		const payer = ref({});
		const paymentMethods = ref({});

		const suspenseError = ref(null);

		onErrorCaptured(e => {
			suspenseError.value = e.message;
		});

		function savePayerData(values) {
			payer.value = values;
			stepForward();
		}

		function selectPaymentMethod(values) {
			paymentMethods.value = values;
			stepForward();
		}

		function stepBack() {
			if (step.value > 0) {
				step.value--;
			}
		}

		function stepForward() {
			if (step.value < 4) {
				step.value++;
			}
		}

		return {
			payer, step, suspenseError, stepBack, savePayerData, selectPaymentMethod
		};
	}
};
</script>

<style scoped>

</style>
