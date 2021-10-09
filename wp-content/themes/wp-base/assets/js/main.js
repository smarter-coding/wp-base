import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue3'

document.addEventListener("DOMContentLoaded", () => {

    createInertiaApp({
        resolve: name => require(`./Templates/${name}`),
        setup({ el, App, props, plugin }) {
            createApp({ render: () => h(App, props) })
                .use(plugin)
                .mount(el)
        },
    });

});
