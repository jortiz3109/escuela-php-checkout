<template>
    <div class="grid grid-cols-2 items-baseline w-5/6">
        <button
            v-if="step > firstStep"
            class="bg-gray-500
                hover:bg-gray-700
                justify-self-start
                my-8
                px-12
                py-3
                rounded-lg
                shadow
                text-white"
            @click="stepBack"
        >
            Back
        </button>
        <a
            v-if="step < lastStep"
            href="#"
            class="col-start-2
                hover:text-blue-900
                justify-self-end
                my-8
                p-2
                text-gray-500
                underline"
        >
            Do not want to continue
        </a>
    </div>
</template>

<script>
import useStep from '../functions/useStep'

export default {
  name: 'Footer',

  setup() {
    const { step, firstStep, lastStep, stepBack } = useStep()

    return { step, firstStep, lastStep, stepBack }
  },
}
</script>
