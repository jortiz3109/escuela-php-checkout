<template>
  <Form
    v-slot="{ errors }"
    :validation-schema="schema"
    class="grid grid-cols-2 grid-rows-4 gap-x-6 gap-y-8"
    :initial-values="payer"
    @submit="onSubmit"
  >
    <div class="field-group">
      <label class="field-label">Name</label>
      <Field
        id="name"
        class="field-input"
        type="text"
        name="name"
        :class="errors.name ? 'border-red-500' : '' "
      />
      <p
        v-show="errors.name"
        class="error-message"
      >
        {{ errors.name }}
      </p>
    </div>
    <div class="field-group">
      <label class="field-label">Surname</label>
      <Field
        id="surname"
        class="field-input"
        type="text"
        name="surname"
        :class="errors.surname ? 'border-red-500' : '' "
      />
      <p
        v-show="errors.surname"
        class="error-message"
      >
        {{ errors.surname }}
      </p>
    </div>
    <div class="field-group">
      <label class="field-label">Document</label>
      <div class="flex gap-4">
        <Field
          id="documentType"
          as="select"
          class="field-label field-input"
          name="documentType"
          :class="errors.documentType ? 'border-red-500' : '' "
        >
          <option
            v-for="documentType in documentTypes"
            :key="documentType"
            :value="documentType"
          >
            {{ documentType }}
          </option>
        </Field>
        <Field
          id="document"
          class="field-input"
          type="text"
          name="document"
          :class="errors.document ? 'border-red-500' : '' "
        />
      </div>
      <div class="field-group">
        <p
          v-show="errors.documentType"
          class="error-message"
        >
          {{ errors.documentType }}
        </p>
        <p
          v-show="errors.document"
          class="error-message"
        >
          {{ errors.document }}
        </p>
      </div>
    </div>
    <div class="field-group">
      <label class="field-label">Email</label>
      <Field
        id="email"
        class="field-input"
        type="email"
        name="email"
        :class="errors.email ? 'border-red-500' : '' "
      />
      <p
        v-show="errors.email"
        class="error-message"
      >
        {{ errors.email }}
      </p>
    </div>
    <div class="field-group col-start-1 col-end-2">
      <label class="field-label">Mobile</label>
      <Field
        id="mobile"
        class="field-input"
        type="text"
        name="mobile"
        :class="errors.mobile ? 'border-red-500' : '' "
      />
      <p
        v-show="errors.mobile"
        class="error-message"
      >
        {{ errors.mobile }}
      </p>
    </div>
    <div class="flex col-span-2 justify-self-end self-start">
      <button
        type="submit"
        class="border px-8 py-3 bg-gray-500 rounded-lg hover:bg-gray-700 text-white"
      >
        Next
      </button>
    </div>
  </Form>
</template>

<script>
import {Form, Field} from 'vee-validate';
import '../functions/validators';

export default {
	name: 'PayerData',

	components: { Form, Field},

	props: {
		payer: {
			type: Object,
			default: () => {}
		}
	},

	emits: ['save-payer'],

	setup(props, { emit }) {
		const documentTypes = [ 'CC', 'CE', 'NIT', 'PPN', 'TI', 'RUT' ];

		const schema = {
			name: 'required|min:1|max:80',
			surname: 'required|min:1|max:80',
			documentType: `required|one_of:${documentTypes}`,
			document: 'required|alpha_num',
			email: 'required|email',
			mobile: 'required|numeric'
		};

		function onSubmit(values) {
			emit('save-payer', values);
		}

		return {
			schema,
			documentTypes,
			onSubmit,
		};
	}
};
</script>

<style scoped>
    .field-group {
        @apply flex flex-col;
    }

    .field-label {
        @apply text-gray-700;
    }

    .field-input {
        @apply border-gray-400 rounded-lg;
    }

    .error-message {
        @apply text-red-500 pt-1;
    }
</style>
