import 'file-loader?name=vendor/console.js!uglify-loader!console-polyfill'
import 'file-loader?name=vendor/babel-polyfill.js!babel-polyfill/dist/polyfill.min'
import 'file-loader?name=vendor/document-register-element.js!document-register-element/build/document-register-element'
import 'file-loader?name=vendor/normalize.css!csso-loader!normalize.css/normalize.css'
import 'file-loader?name=vendor/lazysizes.js!uglify-loader!lazysizes'

window.lazySizesConfig = window.lazySizesConfig || {}
window.lazySizesConfig.preloadAfterLoad = true
