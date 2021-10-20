<template>
  <div class="flex flex-col h-full justify-between">
    <div class="flex items-center justify-items-center h-5/6 mt-32">
      <PayerData
        v-if="isStepEqual(1)"
        :payer="payer"
        @save-payer="savePayerData"
      />
      <SuspenseComponent>
        <PaymentMethods
          v-if="isStepEqual(2)"
          @select-payment-method="selectPaymentMethod"
        />
      </SuspenseComponent>
    </div>
    <Footer class="h-1/6" />
  </div>
</template>

<script>
import { ref } from 'vue';
import PayerData from './PayerData';
import PaymentMethods from './PaymentMethods';
import SuspenseComponent from './SuspenseComponent';
import Footer from './Footer';
import useStep from '../functions/useStep';

export default {
	name: 'Transaction',

	components: {
		PayerData,
		PaymentMethods,
		SuspenseComponent,
		Footer
	},

	setup() {
		const { step, stepBack, stepForward, isStepEqual } = useStep();

		const payer = ref({
			name: '',
			surname: '',
			documentType: '',
			document: '',
			email: '',
			mobile: ''
		});
		const paymentMethods = ref({});

		function savePayerData(values) {
			payer.value = values;
			stepForward();
		}

		function selectPaymentMethod(values) {
			paymentMethods.value = values;
			stepForward();
		}

		return {
			payer, step, stepBack, isStepEqual, savePayerData, selectPaymentMethod
		};
	}
};
</script>

<style scoped>

</style>
