/**
 * _scripts/lib/sentry.js
 * Loads Sentry.js from cdn address
 *
 * @exports {Promise} default - a promise of the Sentry.js library
 */

import Script from 'scriptjs'

export default new Promise((resolve, reject) => {
    Script('https://browser.sentry-cdn.com/5.6.3/bundle.min.js', () => {
        console.log('Sentry.js loaded')
        return resolve(window.Sentry)
    })
})
