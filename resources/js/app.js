import { createApp, h } from 'vue'
import { createInertiaApp, Link } from '@inertiajs/inertia-vue3'
import { InertiaProgress } from '@inertiajs/progress'
import Default from './Layouts/Default.vue'
import '@tabler/core/src/js/tabler'
import jquery from 'jquery'
import 'select2'
import axios from 'axios'

window.$ = window.jquery = jquery


createInertiaApp({
  resolve: name => {
    let page = require(`./Pages/${name}`).default

    page.layout = page.layout || Default;

    return page
  },
  setup({ el, App, props, plugin }) {
    const app = createApp({ render: () => h(App, props) });

    // load plugins
    app.use(plugin);

    // register global components
    app.component('Link', Link);

    // register global directives
    app.directive('select2', select2Directive);
    app.directive('auth', authDirective);

    // configurations
    app.config.globalProperties.$http = axios;

    // mount the application
    app.mount(el);
  },
})

InertiaProgress.init()

const authDirective = {
  mounted: function (el, binding) {
    if (binding.instance.$page.props.auth == null) {
      el.setAttribute('data-bs-toggle', 'modal');
      el.setAttribute('data-bs-target', '#auth-required-modal');
    }
  }
}

const select2Directive = {
  beforeMount: function (el, binding, vnode) {
    $(el).select2().on('select2:select', (e) => {
      el.dispatchEvent(new Event('change', { target: e.target }));
    }).
    on('select2:unselect', (e) => {
      el.dispatchEvent(new Event('change', { target: e.target }));
    });
  },
    updated: function(el) {
    // update the selection if the value is changed externally
    $(el).trigger('change');
  }
};
