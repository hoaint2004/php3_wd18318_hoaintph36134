let mix = require('laravel-mix');
const path = require('path');
mix.setPublicPath('public')
    .options({
        postCss: [
            require('autoprefixer')({
                overrideBrowserslist: ['last 6 versions'],
                grid: true
            })
        ]
    });

let scss = [
    {
        from: "resources/scss/home.scss",
        to: "public/scss/home.css",
    },
    {
        from: "resources/scss/header.scss",
        to: "public/scss/header.css",
    },
    {
        from: "resources/scss/footer.scss",
        to: "public/scss/footer.css",
    },
    {
        from: "resources/scss/detail.scss",
        to: "public/scss/detail.css",
    }
];

scss.forEach(file => {
    mix.sass(file.from, file.to);
});


let js = [
    {
        from: "resources/js/index.js",
        to: "public/js/index.js",
    }
];


js.forEach(file => {
    mix.js(file.from, file.to);
});

// Biên dịch file SCSS
// mix.sass('resources/scss/home.scss', 'public/scss/home.css') // Biên dịch home.scss thành all.css
//    .scripts([
//        'resources/js/index.js',
//    ], 'public/js/home.js')

//    .styles([

//        'public/footer.css',
//        'public/header.css',
//        'public/login-register.css',
//        'public/notFound.css',
//        'public/search.css',
//    ], 'public/css/all.css')
//    .setPublicPath('public')
//    .options({
//        postCss: [
//            require('autoprefixer')({
//                overrideBrowserslist: ['last 6 versions'],
//                grid: true
//            })
//        ]
//    });

// Bật source maps khi không ở chế độ sản xuất
if (!mix.inProduction()) {
    mix.sourceMaps();
}

// Phiên bản hóa khi ở chế độ sản xuất
if (mix.inProduction()) {
    mix.version();
}

// Cấu hình BrowserSync
mix.browserSync('localhost:8000');

// Cấu hình Webpack
mix.webpackConfig({
    mode: mix.inProduction() ? 'production' : 'development',
    resolve: {
        alias: {
            '@': path.resolve(__dirname, 'resources/js'),
            'scss': path.resolve(__dirname, 'resources/scss'), // Thêm alias cho SCSS
        }
    }
});
