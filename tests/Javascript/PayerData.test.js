import PayerData from '../../resources/js/components/PayerData';
import { mount, flushPromises } from '@vue/test-utils';

const invalidMessageText = (field) => `The field ${field} is invalid`;

describe('payerData', () => {
  let wrapper;

  beforeEach(() => {
    jest.useFakeTimers();
    wrapper = mount(PayerData);
  });

  afterEach(() =>  jest.useRealTimers());

  it('can set a name', async () => {
    const input = wrapper.find('input[name=name]');

    await input.setValue('Julia');

    expect(input.element.value).toBe('Julia');
    dontSee(invalidMessageText('name'));
  });

  it('can validate name as required', async () => {
    dontSee(invalidMessageText('name'));

    const input = wrapper.find('input[name=name]');

    await input.setValue('');

    jest.runAllTimers();
    await flushPromises();

    see(invalidMessageText('name'));
  });

  it('can validate name is too long', async () => {
    dontSee(invalidMessageText('name'));

    const input = wrapper.find('input[name=name]');

    await input.setValue('a'.repeat(81));

    jest.runAllTimers();
    await flushPromises();

    see(invalidMessageText('name'));
  });

  it('can set a surname', async () => {
    const input = wrapper.find('input[name=surname]');

    await input.setValue('Costa');

    expect(input.element.value).toBe('Costa');
    dontSee(invalidMessageText('surname'));
  });

  it('can validate surname as required', async () => {
    dontSee(invalidMessageText('surname'));

    const input = wrapper.find('input[name=surname]');

    await input.setValue('');

    jest.runAllTimers();
    await flushPromises();

    see(invalidMessageText('surname'));
  });

  it('can validate surname is too long', async () => {
    dontSee(invalidMessageText('surname'));

    const input = wrapper.find('input[name=surname]');

    await input.setValue('a'.repeat(81));

    jest.runAllTimers();
    await flushPromises();

    see(invalidMessageText('surname'));
  });

  it('can select a document type', async () => {
    const select = wrapper.find('select');

    await select.setValue('CC');

    expect(select.element.value).toBe('CC');
  });

  it('can validate document type as required', async () => {
    await wrapper.find('button').trigger('click');

    jest.runAllTimers();
    await flushPromises();

    see(invalidMessageText('documentType'));
  });

  it('can set a document', async () => {
    const input = wrapper.find('input[name=document]');

    await input.setValue('FR725498');

    expect(input.element.value).toBe('FR725498');
    dontSee(invalidMessageText('document'));
  });

  it('can validate document as required', async () => {
    dontSee(invalidMessageText('document'));

    const input = wrapper.find('input[name=document]');

    await input.setValue('');

    jest.runAllTimers();
    await flushPromises();

    see(invalidMessageText('document'));
  });

  it('can validate document does not have special characters', async () => {
    dontSee(invalidMessageText('document'));

    const input = wrapper.find('input[name=document]');

    await input.setValue('+12a*');

    jest.runAllTimers();
    await flushPromises();

    see(invalidMessageText('document'));
  });

  it('can set a email', async () => {
    const input = wrapper.find('input[name=email]');

    await input.setValue('admin@gmail.com');

    expect(input.element.value).toBe('admin@gmail.com');
    dontSee(invalidMessageText('email'));
  });

  it('can validate email as required', async () => {
    dontSee(invalidMessageText('email'));

    const input = wrapper.find('input[name=email]');

    await input.setValue('');

    jest.runAllTimers();
    await flushPromises();

    see(invalidMessageText('email'));
  });

  it('can validate email as valid email', async () => {
    dontSee(invalidMessageText('email'));

    const input = wrapper.find('input[name=email]');

    await input.setValue('admin');

    jest.runAllTimers();
    await flushPromises();

    see(invalidMessageText('email'));
  });

  it('can set a mobile', async () => {
    const input = wrapper.find('input[name=mobile]');

    await input.setValue('3008923456');

    expect(input.element.value).toBe('3008923456');
    dontSee(invalidMessageText('mobile'));
  });

  it('can validate mobile as required', async () => {
    dontSee(invalidMessageText('mobile'));

    const input = wrapper.find('input[name=mobile]');

    await input.setValue('');

    jest.runAllTimers();
    await flushPromises();

    see(invalidMessageText('mobile'));
  });

  it('can validate mobile as numeric', async () => {
    dontSee(invalidMessageText('mobile'));

    const input = wrapper.find('input[name=mobile]');

    await input.setValue('ACBD');

    jest.runAllTimers();
    await flushPromises();

    see(invalidMessageText('mobile'));
  });

  it('broadcasts when submit correctly', async () => {
    await wrapper.find('input[name=name]').setValue('Julia');
    await wrapper.find('input[name=surname]').setValue('Costa');
    await wrapper.find('select').setValue('CC');
    await wrapper.find('input[name=document]').setValue('1092823456');
    await wrapper.find('input[name=email]').setValue('julia.costa@gmail.com');
    await wrapper.find('input[name=mobile]').setValue('3009283456');

    await wrapper.find('button').trigger('click');

    jest.runAllTimers();
    await flushPromises();

    expect(wrapper.emitted()).toHaveProperty('save-payer');
    expect(wrapper.emitted('save-payer')[0]).toEqual([{
      name: 'Julia',
      surname: 'Costa',
      documentType: 'CC',
      document: '1092823456',
      email: 'julia.costa@gmail.com',
      mobile: '3009283456',
    }]);
  });

  // Helper functions
  let see = (text, selector) => {
    let wrap = selector ? wrapper.find(selector) : wrapper;

    expect(wrap.html()).toContain(text);
  };

  let dontSee = (text, selector) => {
    let wrap = selector ? wrapper.find(selector) : wrapper;

    expect(wrap.html()).not.toContain(text);
  };
});
