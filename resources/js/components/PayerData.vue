<template>
  <Form @submit="onSubmit" :validation-schema="schema" v-slot="{ errors }" class="grid grid-cols-2 grid-rows-4 gap-x-6 gap-y-8">
    <div class="flex flex-col">
      <label class="text-gray-700">Name</label>
      <Field
        id="name"
        class="border-gray-400 rounded-lg focus:outline-none focus:ring-1 focus:border-gray-200"
        type="text"
        name="name"
        :class="errors.name ? 'border-red-500' : '' "
      />
        <p v-show="errors.name" class="text-red-500">{{ errors.name }}</p>
    </div>
    <div class="flex flex-col">
      <label
        class="text-gray-700"
      >Surname</label>
      <Field
        id="surname"
        class="border-gray-400 rounded-lg"
        type="text"
        name="surname"
        :class="errors.surname ? 'border-red-500' : '' "
      />
        <p v-show="errors.surname" class="text-red-500">{{ errors.surname }} </p>
    </div>
    <div class="flex flex-col">
      <label
        class="text-gray-700"
      >Document</label>
      <div class="flex gap-4">
        <Field as="select"
          id="documentType"
          class="text-gray-700 border-gray-400 rounded-lg"
          name="documentType"
           :class="errors.documentType ? 'border-red-500' : '' "

        >
          <option value="CC">
            CC
          </option>
          <option value="CE">
            CE
          </option>
        </Field>
        <Field
          id="document"
          class="border-gray-400 rounded-lg"
          type="text"
          name="document"
          :class="errors.document ? 'border-red-500' : '' "
        />
      </div>
        <p v-show="errors.document" class="text-red-500">{{ errors.document }}</p>
    </div>
    <div class="flex flex-col">
      <label
        class="text-gray-700"
      >Email</label>
      <Field
        id="email"
        class="border-gray-400 rounded-lg"
        type="email"
        name="email"
        :class="errors.email ? 'border-red-500' : '' "
      />
        <p v-show="errors.email" class="text-red-500">{{ errors.email }} </p>
    </div>
    <div class="flex flex-col col-start-1 col-end-2">
      <label
        class="text-gray-700"
      >Mobile</label>
      <Field
        id="mobile"
        class="border-gray-400 rounded-lg"
        type="text"
        name="mobile"
        :class="errors.mobile ? 'border-red-500' : '' "
      />
        <p v-show="errors.mobile" class="text-red-500">{{ errors.mobile }} </p>
    </div>
    <div class="flex col-span-2 justify-self-end self-start">
      <button type="submit" class="border px-8 py-3 bg-gray-300 rounded-lg">
        Next
      </button>
    </div>
  </Form>
</template>

<script>
import {Form, Field, ErrorMessage} from 'vee-validate'
import '../functions/validators';

export default {
	name: 'PayerData',

    components: { Form, Field, ErrorMessage},

    emits: ['save-payer'],

    setup(props, { emit }) {
        const schema = {
            name: 'required|min:1|max:80',
            surname: 'required|min:1|max:80',
            documentType: 'required',
            document: 'required',
            email: 'required|email',
            mobile: 'required'
        }

        function onSubmit(values) {
            emit('save-payer', values)
        }

        return {
            schema,
            onSubmit,
        }
    }
};
</script>

<style scoped>

</style>
