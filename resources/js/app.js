require('./bootstrap');

import { createApp } from 'vue';

import Countdown from './components/Countdown';
import Stepper from './components/Stepper';
import Transaction from './components/Transaction';

createApp({
	components: {
		Countdown,
		Stepper,
		Transaction
	}
}).mount('#app');
