<template>
  <div class="flex flex-col justify-center px-10 2xl:flex-row">
    <p class="2xl:text-right">
      La sesion expirara en:
    </p>
    <p
      class="2xl:text-left px-1"
      @expired="stopClock"
    >
      {{ remaining.hours }}:{{ remaining.minutes }}:{{ remaining.seconds }}
    </p>
  </div>
</template>

<script>
import { DateTime, Duration } from 'luxon';
import {watch, reactive} from 'vue';
import { useCurrentTime } from '../functions/useCurrentTime';

export default {
	name: 'Countdown',

	props: ['expiration'],

	emits: ['expired'],

	setup(props, { emit }) {
		const { currentTime, intervalHandle } = useCurrentTime();

		function getDuration() {
			let duration = DateTime.fromISO(props.expiration).diff(DateTime.fromJSDate(currentTime.value), ['hours', 'minutes', 'seconds', 'milliseconds']);

			if (duration < 0) {
				return Duration.fromObject({
					hours: 0,
					minutes: 0,
					seconds: 0
				});
			}

			return duration;
		}

		const remaining = reactive({
			hours: getDuration().toObject().hours.toString().padStart(2, '0'),
			minutes: getDuration().toObject().minutes.toString().padStart(2, '0'),
			seconds: getDuration().toObject().seconds.toString().padStart(2, '0'),
		});

		watch(
			() => currentTime.value,
			() => {
				if (getDuration() <= 0) {
					emit('expired');
					clearInterval(intervalHandle);
				}

				remaining.hours = getDuration().toObject().hours.toString().padStart(2, '0');
				remaining.minutes = getDuration().toObject().minutes.toString().padStart(2, '0');
				remaining.seconds = getDuration().toObject().seconds.toString().padStart(2, '0');
			}
		);

		return {
			remaining,
		};
	},
};
</script>

<style scoped>

</style>
