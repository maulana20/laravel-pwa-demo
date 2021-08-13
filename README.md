# laravel-pwa-demo
membuat sinkronisasi data secara offline first pada laravel dengan memanfaatkan cache storage dan service worker browser

## Getting Started

### Instalasi

1.  `$ git clone https://github.com/maulana20/laravel-pwa-demo`
2.  `$ composer install`
3.  Buat **.env** dari file **.env.example**
4.  `$ php artisan key:generate`
5.  `$ php artisan migrate --seed`

##### home dashboard

running awal pada browser akan membuat tabel local storage pada IndexesDB dan menyimpan (cache) beberapa file (css dan js) dan page (dashboard, product) dengan Service Worker

![home_dashboard](https://github.com/maulana20/laravel-pwa-demo/blob/main/screens/home_dashboard.png)

##### not disconnect

tampil warning apabila tidak terhubung dengan koneksi internet

![home_disconnect](https://github.com/maulana20/laravel-pwa-demo/blob/main/screens/home_disconnect.png)

##### page offline

tetap tampil pada beberapa page walaupun tidak terhubung dengan server

![home_product](https://github.com/maulana20/laravel-pwa-demo/blob/main/screens/home_product.png)

##### simpan offline

tetap simpan walaupun dalam keadaan tidak terhubung dengan server (simpan pada tabel local storage)

![product_disconnect](https://github.com/maulana20/laravel-pwa-demo/blob/main/screens/product_disconnect.png)

##### sync online

melakukan sinkronisasi saat terhubung dengan server dari data offline (local storage) ke online (database server)

![product_connected](https://github.com/maulana20/laravel-pwa-demo/blob/main/screens/product_connected.png)
