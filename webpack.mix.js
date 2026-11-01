const mix = require('laravel-mix');

// Сборка JS и SCSS: результат помещается в public/
mix.js('resources/js/app.js', 'public/js')
   .sass('resources/scss/app.scss', 'public/css', {
       sassOptions: {
           quietDeps: true,
           silenceDeprecations: ['import', 'global-builtin', 'color-functions'],
       },
   })
   .version();