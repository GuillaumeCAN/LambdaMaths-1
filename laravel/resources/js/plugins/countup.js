import { CountUp } from 'countup.js';
import { Tabs } from 'flowbite';

window.onload = function() {
  const options = {
    startVal: 0,
    duration: 3.5,
    enableScrollSpy: true,
    scrollSpyDelay: 500,
    scrollSpyOnce: true,
    useEasing: true,
  };
  const coursesHoursStats = new CountUp('coursesHoursStats', 300, options);
  const clientsCountStats = new CountUp('clientsCountStats', 30, options);
  const averagePointsStats = new CountUp('averagePointsStats', 3.5, { ...options, decimalPlaces: 1 });
  const satisfactionStats = new CountUp('satisfactionStats', 100, options);

  coursesHoursStats.start();
  clientsCountStats.start();
  averagePointsStats.start();
  satisfactionStats.start();
}
