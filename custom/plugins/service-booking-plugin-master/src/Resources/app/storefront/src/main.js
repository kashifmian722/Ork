import ServiceBookingPlugin from './js/service-booking.plugin';

window.PluginManager.register(
    'ServiceBookingPlugin',
    ServiceBookingPlugin,
    '[data-service-booking="true"]'
);