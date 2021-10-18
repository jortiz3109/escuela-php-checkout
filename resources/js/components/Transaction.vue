<template>
  <payer-data v-if="step === 'payer'" @save-payer="savePayerData"/>
</template>

<script>
import PayerData from './PayerData';
import {reactive, ref} from 'vue';

export default {
	name: 'Transaction',

	components: {
		PayerData
	},

    setup() {
        const step = ref('payer');

        const payer = ref({})

        function savePayerData(values) {
            payer.value = values
            step.value = 'payment-methods'
        }

        return {
            payer, step, savePayerData
        }
    }
};
</script>

<style scoped>

</style>
