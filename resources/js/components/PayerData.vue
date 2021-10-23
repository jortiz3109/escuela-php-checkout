<template>
  <div
    class="grid grid-cols-2 grid-rows-4 gap-x-6 gap-y-8"
  >
    <div class="field-group">
      <label class="field-label">Name</label>
      <input
        id="name"
        v-model="name"
        class="field-input"
        type="text"
        name="name"
        :class="errors.name ? 'border-red-500' : '' "
      >
      <p
        v-show="errors.name"
        class="error-message"
      >
        {{ errors.name }}
      </p>
    </div>
    <div class="field-group">
      <label class="field-label">Surname</label>
      <input
        id="surname"
        v-model="surname"
        class="field-input"
        type="text"
        name="surname"
        :class="errors.surname ? 'border-red-500' : '' "
      >
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
        <select
          id="documentType"
          v-model="documentType"
          class="field-label field-input"
          :class="errors.documentType ? 'border-red-500' : '' "
        >
          <option
            v-for="documentType in documentTypes"
            :key="documentType"
            :value="documentType"
          >
            {{ documentType }}
          </option>
        </select>
        <input
          id="document"
          v-model="document"
          class="field-input"
          type="text"
          name="document"
          :class="errors.document ? 'border-red-500' : '' "
        >
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
      <input
        id="email"
        v-model="email"
        class="field-input"
        type="email"
        name="email"
        :class="errors.email ? 'border-red-500' : '' "
      >
      <p
        v-show="errors.email"
        class="error-message"
      >
        {{ errors.email }}
      </p>
    </div>
    <div class="field-group col-start-1 col-end-2">
      <label class="field-label">Mobile</label>
      <input
        id="mobile"
        v-model="mobile"
        class="field-input"
        type="text"
        name="mobile"
        :class="errors.mobile ? 'border-red-500' : '' "
      >
      <p
        v-show="errors.mobile"
        class="error-message"
      >
        {{ errors.mobile }}
      </p>
    </div>
    <div class="flex col-span-2 justify-self-end self-start">
      <button
        class="border px-8 py-3 bg-gray-500 rounded-lg hover:bg-gray-700 text-white"
        @click="onSubmit"
      >
        Next
      </button>
    </div>
  </div>
</template>

<script>
import { useForm, useField } from 'vee-validate';
import '../functions/validators';

export default {
	name: 'PayerData',

	props: {
		payer: {
			type: Object,
			default: () => {}
		}
	},

	emits: ['save-payer'],

	setup(props, { emit }) {
		const documentTypes = [ 'CC', 'CE', 'NIT', 'PPN', 'TI', 'RUT' ];

		const { handleSubmit, errors } = useForm({
			validationSchema: {
				name: 'required|min:1|max:80',
				surname: 'required|min:1|max:80',
				documentType: `required|one_of:${documentTypes}`,
				document: 'required|alpha_num',
				email: 'required|email',
				mobile: 'required|numeric'
			},
			initialValues: props.payer
		});

		const { value: name } = useField('name');
		const { value: surname } = useField('surname');
		const { value: documentType } = useField('documentType');
		const { value: document } = useField('document');
		const { value: email } = useField('email');
		const { value: mobile } = useField('mobile');

		const onSubmit = handleSubmit(values => {
			emit('save-payer', values);
		});

		return {
			documentTypes,
			name,
			surname,
			documentType,
			document,
			email,
			mobile,
			errors,
			onSubmit,
		};
	}
};
</script>
