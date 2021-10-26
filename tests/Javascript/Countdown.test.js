import Countdown from '../../resources/js/components/Countdown';
import { mount } from '@vue/test-utils';
import { DateTime } from 'luxon';
import useState from '../../resources/js/functions/useState';

describe('countdown', () => {
  let wrapper, clock;

  const { expired } = useState();

  beforeEach(() => {
    clock = jest.useFakeTimers();
    wrapper = mount(Countdown, {
      props: {
        expiration: DateTime.now().plus({minutes: 15}).toISO()
      }
    });
  });

  afterEach(() =>  {
    jest.useRealTimers();
    expired.value = false;
  });

  it('renders a countdown timer', () => {
    see('00:15:00');
  });

  it('reduces the countdown every second', () => {
    see('00:15:00');

    clock.advanceTimersByTime(1000);

    wrapper.vm.$nextTick(() => {
      see('00:14:59');
    });
  });

  it('stops countdown when gets to zero', () => {
    see('00:15:00');

    clock.advanceTimersByTime(900000); // 15 minutes

    wrapper.vm.$nextTick(() => {
      see('00:00:00');
      expect(wrapper.vm.intervalHandle).toBeUndefined();
    });
  });

  it('shows zero if session is expired', () => {
    wrapper = mount(Countdown, {
      props: {
        expiration: DateTime.now().plus({minutes: -15}).toISO()
      }
    });

    see('00:00:00');
  });

  it('update global state as expired', () => {
    const { expired } = useState();
    expect(expired.value).toBeFalsy();

    see('00:15:00');

    clock.advanceTimersByTime(900000); // 15 minutes

    jest.useRealTimers();

    wrapper.vm.$nextTick(() => {
      expect(expired.value).toBeTruthy();
    });
  });

  // Helper functions
  let see = (text, selector) => {
    let wrap = selector ? wrapper.find(selector) : wrapper;

    expect(wrap.html()).toContain(text);
  };
});
