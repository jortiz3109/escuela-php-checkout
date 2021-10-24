<template>
  <div class="grid grid-cols-2 items-baseline w-5/6">
    <button
      v-if="step > firstStep"
      class="bg-gray-500 text-white shadow py-3 px-12 my-8 rounded-lg justify-self-start hover:bg-gray-700"
      @click="stepBack"
    >
      Back
    </button>
    <a
      v-if="step < lastStep"
      href="#"
      class="p-2 my-8 justify-self-end col-start-2 underline text-gray-500 hover:text-blue-900"
    >Do not want to continue</a>
  </div>
</template>

<script>
import  useStep  from '../functions/useStep';

export default {
	name: 'Footer',

	setup() {
		const { step, firstStep, lastStep, stepBack } = useStep();

		return { step, firstStep, lastStep, stepBack };
	}
};
</script>
