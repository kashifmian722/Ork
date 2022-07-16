const { resolve, join } = require('path');

module.exports = ({ config }) => {
    return {
        resolve: {
            alias: {
                '@fullcalendar': resolve(join(__dirname, '../../', 'node_modules/@fullcalendar')),
                moment: resolve(join(__dirname, '../../', 'node_modules/moment')),
            },
        },
    };
}
