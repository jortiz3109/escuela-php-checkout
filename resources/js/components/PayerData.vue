<template>
    <div class="gap-x-6 gap-y-8 grid grid-cols-2 grid-rows-4">
        <div class="field-group">
            <label class="field-label">Name</label>
            <input
                id="name"
                v-model="name"
                class="field-input"
                type="text"
                name="name"
                :class="errors.name ? 'border-red-500' : ''"
            />
            <p v-show="errors.name" class="error-message">
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
                :class="errors.surname ? 'border-red-500' : ''"
            />
            <p v-show="errors.surname" class="error-message">
                {{ errors.surname }}
            </p>
        </div>
        <div class="field-group">
            <label class="field-label">Document</label>
            <div class="flex gap-4">
                <select
                    id="documentType"
                    v-model="documentType"
                    class="field-input field-label"
                    :class="errors.documentType ? 'border-red-500' : ''"
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
                    :class="errors.document ? 'border-red-500' : ''"
                />
            </div>
            <div class="field-group">
                <p v-show="errors.documentType" class="error-message">
                    {{ errors.documentType }}
                </p>
                <p v-show="errors.document" class="error-message">
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
                :class="errors.email ? 'border-red-500' : ''"
            />
            <p v-show="errors.email" class="error-message">
                {{ errors.email }}
            </p>
        </div>
        <div class="col-end-2 col-start-1 field-group">
            <label class="field-label">Mobile</label>
            <input
                id="mobile"
                v-model="mobile"
                class="field-input"
                type="text"
                name="mobile"
                :class="errors.mobile ? 'border-red-500' : ''"
            />
            <p v-show="errors.mobile" class="error-message">
                {{ errors.mobile }}
            </p>
        </div>
        <div class="col-span-2 flex justify-self-end self-start">
            <button
                class="bg-gray-500
                    border
                    hover:bg-gray-700
                    px-8
                    py-3
                    rounded-lg
                    text-white"
                @click="onSubmit"
            >
                Next
            </button>
        </div>
    </div>
</template>

<script>
import { useForm, useField } from 'vee-validate'
import { useHelpers, useStep } from '../use'
import '../use/validators'

export default {
    name: 'PayerData',

    setup() {
        const documentTypes = ['CC', 'CE', 'NIT', 'PPN', 'TI', 'RUT']

        const { state } = useHelpers()
        const { stepForward } = useStep()

        const { handleSubmit, errors } = useForm({
            validationSchema: {
                name: 'required|min:1|max:80',
                surname: 'required|min:1|max:80',
                documentType: `required|one_of:${documentTypes}`,
                document: 'required|alpha_num',
                email: 'required|email',
                mobile: 'required|numeric',
            },
            initialValues: state.payer,
        })


        const { value: name } = useField('name')
        const { value: surname } = useField('surname')
        const { value: documentType } = useField('documentType')
        const { value: document } = useField('document')
        const { value: email } = useField('email')
        const { value: mobile } = useField('mobile')

        const onSubmit = handleSubmit((values) => {
            state.payer = values
            stepForward()
        })

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
        }
    },
}
</script>
