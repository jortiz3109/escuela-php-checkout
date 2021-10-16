<template>
  <div class="flex flex-col justify-center px-10 2xl:flex-row">
    <p class="2xl:text-right">
      La sesion expirara en:
    </p>
    <p class="2xl:text-left px-1">
      {{ remaining.hours }}:{{ remaining.minutes }}:{{ remaining.seconds }}
    </p>
  </div>
</template>

<script>
import {DateTime} from 'luxon';
export default {
	name: 'Countdown',

	props: ['expiration'],

	computed: {
		remaining () {
			let remaining = DateTime.fromISO(this.expiration).diff(DateTime.now(), ['hours', 'minutes', 'seconds', 'milliseconds']).toObject();

			return {
				hours: remaining.hours.toString().padStart(2, '0'),
				minutes: remaining.minutes.toString().padStart(2, '0'),
				seconds: remaining.seconds.toString().padStart(2, '0'),
			};
		}
	}
};
</script>

<style scoped>

</style>
