<template>
  <div class="grid grid-cols-2 grid-rows-4 gap-x-6 gap-y-8">
    <div class="flex flex-col">
      <label
        class="text-gray-700"
        for="name"
      >Name</label>
      <input
        class="border-gray-400 rounded-lg"
        type="text"
        name="name"
        id="name"
      >
    </div>
    <div class="flex flex-col">
      <label
        class="text-gray-700"
        for="surname"
      >Surname</label>
      <input
        class="border-gray-400 rounded-lg"
        type="text"
        name="surname"
        id="surname"
      >
    </div>
    <div class="flex flex-col">
      <label
        class="text-gray-700"
        for="document"
      >Document</label>
      <div class="flex gap-4">
        <select
          class="text-gray-700 border-gray-400 rounded-lg"
          name="documentType"
          id="documentType"
        >
          <option value="CC">
            CC
          </option>
          <option value="CE">
            CE
          </option>
        </select>
        <input
          class="border-gray-400 rounded-lg"
          type="text"
          name="document"
          id="document"
        >
      </div>
    </div>
    <div class="flex flex-col">
      <label
        class="text-gray-700"
        for="email"
      >Email</label>
      <input
        class="border-gray-400 rounded-lg"
        type="email"
        name="email"
        id="email"
      >
    </div>
    <div class="flex flex-col col-start-1 col-end-2">
      <label
        class="text-gray-700"
        for="mobile"
      >Mobile</label>
      <input
        class="border-gray-400 rounded-lg"
        type="text"
        name="mobile"
        id="mobile"
      >
    </div>
    <div class="flex col-span-2 justify-self-end self-start">
      <button class="border px-8 py-3 bg-gray-300 rounded-lg">
        Next
      </button>
    </div>
  </div>
</template>

<script>
export default {
	name: 'PayerData'
};
</script>

<style scoped>

</style>
