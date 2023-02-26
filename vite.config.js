import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
  plugins: [
    laravel([
      "resources/css/rapid-custom-fields.css",
      "resources/js/rapid-custom-fields.js",
    ]),
  ],
});
