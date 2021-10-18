import PayerData from "../../resources/js/components/PayerData"
import { mount, flushPromises } from '@vue/test-utils';

describe('PayerData', () => {
    let wrapper;

    beforeEach(() => {
        jest.useFakeTimers()
        wrapper = mount(PayerData);
    })

    afterEach(() =>  jest.useRealTimers());

    test('it can set a name', async () => {
        const input = wrapper.find('input[name=name]');

        await input.setValue('Julia');

        expect(input.element.value).toBe('Julia')
        dontSee('The field name is invalid')
    })

    test('it can validate name as required', async () => {
        dontSee('The field name is invalid')

        const input = wrapper.find('input[name=name]');

        await input.setValue('');

        jest.runAllTimers();
        await flushPromises();

        see('The field name is invalid')
    })

    test('it can validate name is too long', async () => {
        dontSee('The field name is invalid')

        const input = wrapper.find('input[name=name]');

        await input.setValue('a'.repeat(81));

        jest.runAllTimers();
        await flushPromises();

        see('The field name is invalid')
    })

    test('it can set a surname', async () => {
        const input = wrapper.find('input[name=surname]');

        await input.setValue('Costa');

        expect(input.element.value).toBe('Costa')
        dontSee('The field surname is invalid')
    })

    test('it can validate surname as required', async () => {
        dontSee('The field surname is invalid')

        const input = wrapper.find('input[name=surname]');

        await input.setValue('');

        jest.runAllTimers();
        await flushPromises();

        see('The field surname is invalid')
    })

    test('it can validate surname is too long', async () => {
        dontSee('The field surname is invalid')

        const input = wrapper.find('input[name=surname]');

        await input.setValue('a'.repeat(81));

        jest.runAllTimers();
        await flushPromises();

        see('The field surname is invalid')
    })

    test('it can select a document type', async () => {
        const select = wrapper.find('select[name=documentType]');

        await select.setValue('CC');

        expect(select.element.value).toBe('CC')
    })

    test('it can validate document type as required', async () => {
        const select = wrapper.find('select[name=documentType]');

        expect(select.classes()).not.toContain('border-red-500')

        await select.setValue('');

        jest.runAllTimers();
        await flushPromises();

        expect(select.classes()).toContain('border-red-500')
    })

    test('it can set a document', async () => {
        const input = wrapper.find('input[name=document]');

        await input.setValue('FR725498');

        expect(input.element.value).toBe('FR725498')
        dontSee('The field document is invalid')
    })

    test('it can validate document as required', async () => {
        dontSee('The field document is invalid')

        const input = wrapper.find('input[name=document]');

        await input.setValue('');

        jest.runAllTimers();
        await flushPromises();

        see('The field document is invalid')
    })

    test('it can set a email', async () => {
        const input = wrapper.find('input[name=email]');

        await input.setValue('admin@gmail.com');

        expect(input.element.value).toBe('admin@gmail.com')
        dontSee('The field email is invalid')
    })

    test('it can validate email as required', async () => {
        dontSee('The field email is invalid')

        const input = wrapper.find('input[name=email]');

        await input.setValue('');

        jest.runAllTimers();
        await flushPromises();

        see('The field email is invalid')
    })

    test('it can validate email as valid email', async () => {
        dontSee('The field email is invalid')

        const input = wrapper.find('input[name=email]');

        await input.setValue('admin');

        jest.runAllTimers();
        await flushPromises();

        see('The field email is invalid')
    })

    test('it can set a mobile', async () => {
        const input = wrapper.find('input[name=mobile]');

        await input.setValue('3008923456');

        expect(input.element.value).toBe('3008923456')
        dontSee('The field mobile is invalid')
    })

    test('it can validate mobile as required', async () => {
        dontSee('The field mobile is invalid')

        const input = wrapper.find('input[name=mobile]');

        await input.setValue('');

        jest.runAllTimers();
        await flushPromises();

        see('The field mobile is invalid')
    })

    test.skip('it broadcasts when submit correctly', async () => {
        await wrapper.find('input[name=name]').setValue('Julia')
        await wrapper.find('input[name=surname]').setValue('Costa')
        await wrapper.find('select[name=documentType]').setValue('CC')
        await wrapper.find('input[name=document]').setValue('1092823456')
        await wrapper.find('input[name=email]').setValue('julia.costa@gmail.com')
        await wrapper.find('input[name=mobile]').setValue('3009283456')

        await wrapper.find('button[type=submit]').trigger('click')

        expect(wrapper.emitted()).toHaveProperty('save-payer')
        expect(wrapper.emitted('save-payer')[0]).toEqual({
            name: 'Julia',
            surname: 'Costa',
            documentType: 'CC',
            document: '1092823456',
            email: 'julia.costa@gmail.com',
            mobile: '3009283456',
        })
    })

    // Helper functions
    let see = (text, selector) => {
        let wrap = selector ? wrapper.find(selector) : wrapper;

        expect(wrap.html()).toContain(text);
    }

    let dontSee = (text, selector) => {
        let wrap = selector ? wrapper.find(selector) : wrapper;

        expect(wrap.html()).not.toContain(text);
    }
});
