<template>
  <div class="flex items-center relative w-full">
    <div class="container">
      <ul class="progressbar">
        <li
          v-for="(description, index) in descriptions"
          :key="index"
          class="step-group"
        >
          <div
            class="step"
            :class="step >= index ? 'active' : ''"
          >
            <div class="step-circle">
              {{ index }}
            </div>
            <div class="text-center">
              {{ description }}
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
import useStep from '../functions/useStep';

export default {
  name: 'Stepper',

  setup() {
    const {step} = useStep();

    const descriptions = {
      1: 'Fill in payer data',
      2: 'Select payment method',
      3: 'Insert card data',
    };

    return {step, descriptions};
  }
};
</script>

<style scoped>
.container {
    @apply w-full absolute z-20;
}

.progressbar {
    @apply flex justify-evenly;
}

.progressbar li {
    @apply flex w-full;
}

.step {
    @apply flex flex-col relative w-full items-center justify-items-center;
}

.step-circle {
    @apply flex w-10 h-10 bg-white border-gray-300 border-4 rounded-full items-center justify-center;
    transition: border-color 0.5s ease-in-out 0.1s;
}

.active .step-circle {
    @apply border-blue-900;
}

.active.step:before{
    @apply bg-blue-900;
}

.step:before {
    @apply w-full absolute h-1 bg-gray-300 top-5;
    content: '';
    z-index: -1;
    transition: background 0.5s ease-in-out;
}

.step-group:first-child .step:before {
    @apply w-1/2 self-end;
}

.step-group:last-child .step:before {
    @apply w-1/2 self-start;
}
</style>
