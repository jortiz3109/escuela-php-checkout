<template>
  <div class="flex flex-col w-1/5 items-center">
    <div class="flex relative justify-between w-5/6 self-center">
      <div class="step-circle border-blue-900">
        1
      </div>

      <div
        class="step-circle"
        :class="step < 2 ? 'border-blue-100' : 'border-blue-900'"
      >
        2
      </div>

      <div
        class="step-circle"
        :class="step < 3 ? 'border-blue-100' : 'border-blue-900'"
      >
        3
      </div>

      <div class="absolute w-full self-center">
        <div class="bar bg-blue-100 w-full" />
        <div
          class="bar bg-blue-900 transition-bar"
          :class="barLength()"
        />
      </div>
    </div>
    <div class="flex relative justify-between w-full">
      <p class="step-text">
        Fill in payer data
      </p>
      <p class="step-text">
        Select payment method
      </p>
      <p class="step-text">
        Insert card data
      </p>
    </div>
  </div>
</template>

<script>
import useStep from '../functions/useStep';

export default {
	name: 'Stepper',

	setup() {
		const {step} = useStep();

		function barLength() {
			const lengths = {
				step1: 'w-1/4',
				step2: 'w-3/4',
				step3: 'w-full'
			};

			return lengths['step' + step.value];
		}

		return {step, barLength};
	}
};
</script>

<style scoped>
.step-circle {
    @apply flex bg-white border-4 h-10 w-10 rounded-full font-bold justify-center items-center shadow z-10;
    transition: border-color 0.5s ease-in-out 0.1s;
}

.step-text {
    @apply text-center text-sm;
}

.bar {
    @apply absolute self-center h-1.5 rounded-full z-0 shadow;
}

.transition-bar {
    transition: width 0.5s ease-out;
}
</style>
