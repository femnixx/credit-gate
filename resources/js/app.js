import './bootstrap';
import { createInertiaApp } from '@inertiajs/vue3'
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers'; // Useful helper
import { createApp, h } from 'vue'

createInertiaApp({
  // Progress bar configuration
  progress: {
    color: '#4B5563', // Choose your favorite color
    showSpinner: true,
  },
  
  resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
  setup({ el, App, props, plugin }) {
    return createApp({ render: () => h(App, props) })
      .use(plugin)
      .mount(el)
  },
})