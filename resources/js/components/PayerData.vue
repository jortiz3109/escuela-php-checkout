<template>
    <div class="gap-2 grid grid-cols-2 w-full">
        <div>
            <custom-input
                id="name"
                v-model="name"
                class="w-full"
                label="Name"
                :error="errors.name"
            />
        </div>
        <div>
            <custom-input
                id="surname"
                v-model="surname"
                class="w-full"
                label="Surname"
                :error="errors.surname"
            />
        </div>
        <div class="flex gap-2 items-start">
            <custom-select
                id="documentType"
                v-model="documentType"
                label="Document"
                :error="errors.documentType"
            >
                <option
                    v-for="documentType in documentTypes"
                    :key="documentType"
                    :value="documentType"
                >
                    {{ documentType }}
                </option>
            </custom-select>
            <custom-input
                id="document"
                v-model="document"
                label="&nbsp;"
                class="w-full"
                :error="errors.document"
            />
        </div>
        <div>
            <custom-input
                id="email"
                v-model="email"
                label="Email"
                class="w-full"
                :error="errors.email"
            />
        </div>
        <div>
            <custom-input
                id="mobile"
                v-model="mobile"
                label="Mobile"
                class="w-full"
                :error="errors.mobile"
            />
        </div>
        <div class="flex justify-end">
            <div>
                <custom-button
                    text="Next"
                    icon="next"
                    class="mt-6 ring-offset-gray-200"
                    @click="onSubmit"
                />
            </div>
        </div>
    </div>
</template>

<script>
import { useForm, useField } from 'vee-validate'
import { useHelpers, useStep } from '../use'
import CustomButton from './CustomButton'
import '../use/validators'
import CustomInput from './CustomInput'
import CustomSelect from './CustomSelect'

export default {
    name: 'PayerData',
    components: { CustomSelect, CustomInput, CustomButton },
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
