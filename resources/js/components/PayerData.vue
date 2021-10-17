<template>
  <div class="grid grid-cols-2 grid-rows-4 gap-x-6 gap-y-8">
    <div class="flex flex-col">
      <label
        class="text-gray-700"
        for="name"
      >Name</label>
      <input
        id="name"
        class="border-gray-400 rounded-lg"
        type="text"
        name="name"
      >
    </div>
    <div class="flex flex-col">
      <label
        class="text-gray-700"
        for="surname"
      >Surname</label>
      <input
        id="surname"
        class="border-gray-400 rounded-lg"
        type="text"
        name="surname"
      >
    </div>
    <div class="flex flex-col">
      <label
        class="text-gray-700"
        for="document"
      >Document</label>
      <div class="flex gap-4">
        <select
          id="documentType"
          class="text-gray-700 border-gray-400 rounded-lg"
          name="documentType"
        >
          <option value="CC">
            CC
          </option>
          <option value="CE">
            CE
          </option>
        </select>
        <input
          id="document"
          class="border-gray-400 rounded-lg"
          type="text"
          name="document"
        >
      </div>
    </div>
    <div class="flex flex-col">
      <label
        class="text-gray-700"
        for="email"
      >Email</label>
      <input
        id="email"
        class="border-gray-400 rounded-lg"
        type="email"
        name="email"
      >
    </div>
    <div class="flex flex-col col-start-1 col-end-2">
      <label
        class="text-gray-700"
        for="mobile"
      >Mobile</label>
      <input
        id="mobile"
        class="border-gray-400 rounded-lg"
        type="text"
        name="mobile"
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
