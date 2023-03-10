import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import path from 'path';
import svgLoader from "vite-svg-loader";

export default defineConfig({
  plugins: [
    laravel({
      input: [
        'resources/js/app.js',
      ],
      refresh: true,
    }),
    vue({
      template: {
        transformAssetUrls: {
          base: null,
          includeAbsolute: false,
        },
      },
    }),
    svgLoader(),
  ],
  resolve: {
    alias: {
      '~fa': path.resolve(__dirname, 'node_modules/@fortawesome/fontawesome-free/scss'),
      ziggy: path.resolve('vendor/tightenco/ziggy/dist/vue.js'),
    },
  },
  css: {
    preprocessorOptions: {
      scss: {
        additionalData: `@import "resources/css/variables.scss";`
      }
    }
  },
});
