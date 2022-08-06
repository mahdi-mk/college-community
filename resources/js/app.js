import { createApp, h } from 'vue'
import { createInertiaApp, Link } from '@inertiajs/inertia-vue3'
import { InertiaProgress } from '@inertiajs/progress'
import Default from './Layouts/Default.vue'
import '@tabler/core/src/js/tabler'

createInertiaApp({
  resolve: name => {
    let page = require(`./Pages/${name}`).default

    page.layout = page.layout || Default;

    return page
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .component('Link', Link)
      .mount(el)
  },
})

InertiaProgress.init()
