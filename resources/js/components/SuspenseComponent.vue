<template>
  <div v-if="suspenseError">
    {{ suspenseError }}
  </div>
  <Suspense v-else>
    <template #default>
      <slot />
    </template>
    <template #fallback>
      Loading..
    </template>
  </Suspense>
</template>

<script>

import { onErrorCaptured, ref } from 'vue';

export default {
	name: 'SuspenseComponent',

	setup() {
		const suspenseError = ref(null);

		onErrorCaptured(e => {
			suspenseError.vaSupenseComponentlue = e.message;
		});

		return { suspenseError };
	}
};
</script>

<style scoped>

</style>
