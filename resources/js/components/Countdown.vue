<template>
  <div class="2xl:flex-row flex flex-col justify-center px-10">
    <p class="2xl:text-right">
      Session expires in:
    </p>
    <p class="2xl:text-left px-1">
      {{ remaining.hours }}:{{ remaining.minutes }}:{{ remaining.seconds }}
    </p>
  </div>
</template>

<script>
import { DateTime, Duration } from 'luxon';
import { ref, computed, onBeforeMount, watch } from 'vue';
import useState from '../functions/useState';

export default {
  name: 'Countdown',

  props: {
    expiration: {
      type: String,
      default: ''
    }
  },

  setup(props) {
    let timer;
    const now = ref(new Date());
    const { expired, expireSession } = useState();

    const remaining = computed(() => {
      let duration = DateTime.fromISO(props.expiration)
        .diff(DateTime.fromJSDate(now.value), ['hours', 'minutes', 'seconds', 'milliseconds']);

      if (duration <= 0) {
        expireSession();
        if (duration < 0) {
          duration = Duration.fromObject({
            hours: 0,
            minutes: 0,
            seconds: 0
          });
        }
      }

      return {
        hours: duration.toObject().hours.toString().padStart(2, '0'),
        minutes: duration.toObject().minutes.toString().padStart(2, '0'),
        seconds: duration.toObject().seconds.toString().padStart(2, '0'),
      };
    });

    watch(() => expired.value, (newValue) => {
      if (newValue) {
        clearInterval(timer);
      }
    });

    onBeforeMount(() => {
      timer = setInterval(() => {
        now.value = new Date();
      }, 1000);
    });

    return {
      remaining,
    };
  },
};
</script>
