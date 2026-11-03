<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // USERS
        $users = array (
  0 => 
  array (
    'id' => 1,
    'name' => 'Admin Tothemoon',
    'email' => 'tothemoon@gmail.com',
    'email_verified_at' => NULL,
    'password' => '$2y$12$GUD0ffc.oSrM1YTaRKWLl.B4DWXxvvj9jMo.Gb7xoN70PWYo5Ivcm',
    'remember_token' => NULL,
    'created_at' => '2026-10-31 16:47:08',
    'updated_at' => '2026-10-31 16:47:08',
  ),
);
        foreach ($users as $u) {
            DB::table('users')->updateOrInsert(['email' => $u['email']], $u);
        }

        // CATEGORIES
        $categories = array (
  0 => 
  array (
    'id' => 1,
    'name' => 'T-Shirt',
    'slug' => 't-shirt',
    'created_at' => '2026-10-31 16:44:21',
    'updated_at' => '2026-10-31 16:44:21',
  ),
  1 => 
  array (
    'id' => 2,
    'name' => 'Hoodie',
    'slug' => 'hoodie',
    'created_at' => '2026-10-31 16:44:21',
    'updated_at' => '2026-10-31 16:44:21',
  ),
  2 => 
  array (
    'id' => 3,
    'name' => 'Pants',
    'slug' => 'pants',
    'created_at' => '2026-10-31 16:44:21',
    'updated_at' => '2026-10-31 16:44:21',
  ),
);
        foreach ($categories as $c) {
            DB::table('categories')->updateOrInsert(['id' => $c['id']], $c);
        }

        // PRODUCTS
        $products = array (
  0 => 
  array (
    'id' => 9,
    'category_id' => 1,
    'name' => 'TOTHEMOON - T Shirt 16s Oversized Semi Boxy Heavy Cotton Black CAS K',
    'slug' => 'tothemoon-t-shirt-16s-oversized-semi-boxy-heavy-cotton-black-cas-k-gsbal',
    'price' => 234991,
    'discount_price' => NULL,
    'sizes' => '["S","M","L","XL","XXL"]',
    'description' => 'Dibuat dari bahan kain 16s yang berkarakteristik berat dan tebal juga memiliki tekstur lebih kasar namun memeliki daya serap yang sangat baik dan nyaman setelah di cuci. Kain ini lebih unggul dibandingkan dengan bahan kain lainnya, Dikarenakan daya tahan tinggi, masa pakai lebih lama, dan tidak cepat pudar ataupun menyusut.',
    'details' => '{"bahan":"Katun","motif":"Polos","material":"100% Heavyweight Cotton Combed 16s","cutting":"Oversize Semi Boxy"}',
    'shopee_link' => 'https://id.shp.ee/PrKiMDTP',
    'main_image' => 'products/CJXeSNfd6vzRwSOevV4auzWBLpOLm9O1KnAUgKPp.jpg',
    'created_at' => '2026-10-31 17:13:29',
    'updated_at' => '2026-10-31 17:13:29',
    'status' => 'aktif',
    'gallery_images' => '{"image_2":"products\\/gallery\\/DX0OM0O4qGK0cMzT2DTqvyiR52B5pa3gqbowQ8yE.jpg","image_3":"products\\/gallery\\/pU3DrLnkXrLzaQ1DtQSBRsqHXWCqg9mNkBJmPCvD.jpg"}',
  ),
  1 => 
  array (
    'id' => 10,
    'category_id' => 2,
    'name' => 'TOTHEMOON - Hoodie Boxy 330GSM Shooting The Moon Dark Grey Abu Tua',
    'slug' => 'tothemoon-hoodie-boxy-330gsm-shooting-the-moon-dark-grey-abu-tua-2kqFW',
    'price' => 469000,
    'discount_price' => NULL,
    'sizes' => '["S","M","L","XL"]',
    'description' => 'Size Tolerance 1-2 CM*',
    'details' => '{"bahan":"Katun","motif":"Print","material":"Cotton Fleece 330GSM & Heavyweight","cutting":"Boxy"}',
    'shopee_link' => 'https://id.shp.ee/AbSAasHv',
    'main_image' => 'products/pTpQywD7MpGn57PmRdFEKmNCr1DRhPbMiZ1jy8RW.jpg',
    'created_at' => '2026-10-31 17:17:50',
    'updated_at' => '2026-10-31 17:17:50',
    'status' => 'aktif',
    'gallery_images' => '{"image_2":"products\\/gallery\\/uqqdpe47jDONGFBaysHxNq5P5v7SpeW0Dd8SX5JR.jpg","image_3":"products\\/gallery\\/SAV3xY27QWwU5Waom83SpPdSQzxG7qExxgNEHu0c.jpg"}',
  ),
  2 => 
  array (
    'id' => 11,
    'category_id' => 3,
    'name' => 'Tothemoon - Sweatpants Baggy Threestar Hitam',
    'slug' => 'tothemoon-sweatpants-baggy-threestar-hitam-g7CHJ',
    'price' => 339000,
    'discount_price' => NULL,
    'sizes' => '["M","L"]',
    'description' => 'SIZE CHART di slide terakhir 

NOTES: toleransi selisih 1-2cm kemungkinan terjadi dikarnakan pengembangan produksi

KETERANGAN

warna pada produk kemungkinan memiliki sedikit perbedaan dengan produk fisik dikarenakan setiap layar HP atau komputer memiliki kemampuan yang berbeda beda dalam menangkap dan menampilkan warna pada foto produk',
    'details' => '{"bahan":"Katun","motif":"Polos","material":"100% Cotton Fleece 330gsm","cutting":"baggy fit"}',
    'shopee_link' => 'https://id.shp.ee/Pn4wBAgH',
    'main_image' => 'products/l7oy7TADFFdAKGaWiYzRQtnChjckt1jOBZSwJBKi.jpg',
    'created_at' => '2026-10-31 17:25:54',
    'updated_at' => '2026-10-31 17:45:37',
    'status' => 'aktif',
    'gallery_images' => '{"image_2":"products\\/gallery\\/4oZWe8S2A0obYlOoVUUtl6uLU7yKDaHNZ03BC8Jf.jpg","image_3":"products\\/gallery\\/lWEz804hWtRHnDo3uFFG0mEF7TKXysZsssImMXNg.jpg"}',
  ),
  3 => 
  array (
    'id' => 12,
    'category_id' => 1,
    'name' => 'Tothemoon - Tshirt Boxy Pretty Girl Dark Grey',
    'slug' => 'tothemoon-tshirt-boxy-pretty-girl-dark-grey-XJiGM',
    'price' => 219961,
    'discount_price' => NULL,
    'sizes' => '["S","M","L"]',
    'description' => 'Dibuat dari bahan kain 16s yang berkarakteristik berat dan tebal juga memiliki tekstur lebih kasar namun memeliki daya serap yang sangat baik dan nyaman setelah di cuci. Kain ini lebih unggul dibandingkan dengan bahan kain lainnya, Dikarenakan daya tahan tinggi, masa pakai lebih lama, dan tidak cepat pudar ataupun menyusut.',
    'details' => '{"bahan":"Katun","motif":"Sablon plastisol","material":"100% Cotton Combed 24s","cutting":"Boxy Fit"}',
    'shopee_link' => 'https://shopee.co.id/Tothemoon-Tshirt-Boxy-Pretty-Girl-Dark-Grey-i.925488424.29379908745?extraParams=%7B%22display_model_id%22%3A178788662188%2C%22model_selection_logic%22%3A3%7D&image_ids=id-11134207-7rbk4-m7gl1ki85jh264',
    'main_image' => 'products/8sSx6oAUVM2S30GJXjw3LgYs9OBxyH91mqBlcEqi.jpg',
    'created_at' => '2026-11-01 07:45:49',
    'updated_at' => '2026-11-01 07:52:42',
    'status' => 'aktif',
    'gallery_images' => '{"image_2":"products\\/gallery\\/8UsqDJnHfnz9ZwXjLWyW3wg4gaGv9RG3in56q3yq.jpg","image_3":"products\\/gallery\\/5BJpZAanMFuydDjmCunqAOFassRSK8dgX7ejr3K3.jpg"}',
  ),
  4 => 
  array (
    'id' => 13,
    'category_id' => 1,
    'name' => 'TOTHEMOON - T Shirt 16s Oversized Semi Boxy Heavy Cotton Black White',
    'slug' => 'tothemoon-t-shirt-16s-oversized-semi-boxy-heavy-cotton-black-white-IHegZ',
    'price' => 229500,
    'discount_price' => NULL,
    'sizes' => '["S","M","L"]',
    'description' => 'Dibuat dari bahan kain 16s yang berkarakteristik berat dan tebal juga memiliki tekstur lebih kasar namun memeliki daya serap yang sangat baik dan nyaman setelah di cuci. Kain ini lebih unggul dibandingkan dengan bahan kain lainnya, Dikarenakan daya tahan tinggi, masa pakai lebih lama, dan tidak cepat pudar ataupun menyusut.',
    'details' => '{"bahan":"Katun","motif":"Polos","material":"100% Heavyweight Cotton Combed 16s","cutting":"Oversize Semi Boxy"}',
    'shopee_link' => 'https://shopee.co.id/TOTHEMOON-T-Shirt-16s-Oversized-Semi-Boxy-Heavy-Cotton-Black-White-i.925488424.46805181187?extraParams=%7B%22display_model_id%22%3A365474364745%2C%22model_selection_logic%22%3A3%7D&image_ids=id-11134207-82250-mjtkkhweez9h05',
    'main_image' => 'products/nycp0flDTcJkaNV5Xakf27X4BOnckw4VxzWdjJYz.jpg',
    'created_at' => '2026-11-01 08:21:52',
    'updated_at' => '2026-11-01 08:21:52',
    'status' => 'aktif',
    'gallery_images' => '{"image_2":"products\\/gallery\\/YZx5i6C4pzriDfUdvMNbrLrUHqZIshJAlqwTFruj.jpg","image_3":"products\\/gallery\\/jvSErFBC2MJmYOTk4JlBPJy6cqfSoGKp4cZd8mOA.jpg"}',
  ),
  5 => 
  array (
    'id' => 14,
    'category_id' => 1,
    'name' => 'TOTHEMOON - T Shirt 16s Oversized Semi Boxy Heavy Cotton Black White',
    'slug' => 'tothemoon-t-shirt-16s-oversized-semi-boxy-heavy-cotton-black-white-j6l3Z',
    'price' => 229500,
    'discount_price' => NULL,
    'sizes' => '["S","M","L"]',
    'description' => 'Dibuat dari bahan kain 16s yang berkarakteristik berat dan tebal juga memiliki tekstur lebih kasar namun memeliki daya serap yang sangat baik dan nyaman setelah di cuci. Kain ini lebih unggul dibandingkan dengan bahan kain lainnya, Dikarenakan daya tahan tinggi, masa pakai lebih lama, dan tidak cepat pudar ataupun menyusut.',
    'details' => '{"bahan":"Katun","motif":"Polos","material":"100% Heavyweight Cotton Combed 16s","cutting":"Oversize Semi Boxy"}',
    'shopee_link' => 'https://shopee.co.id/TOTHEMOON-T-Shirt-16s-Oversized-Semi-Boxy-Heavy-Cotton-Black-White-i.925488424.46805181187?extraParams=%7B%22display_model_id%22%3A365474364745%2C%22model_selection_logic%22%3A3%7D&image_ids=id-11134207-82250-mjtkkhweez9h05&is_from_login=true',
    'main_image' => 'products/5tertqsdWmTOmchnuknJBHu22nyDeJ4T1UY6JxqJ.jpg',
    'created_at' => '2026-11-01 08:24:38',
    'updated_at' => '2026-11-01 08:24:38',
    'status' => 'aktif',
    'gallery_images' => '{"image_2":"products\\/gallery\\/WGPPXaq8UmdsIviz2QirRAwPshs4Rm5zK2vsGgBF.jpg","image_3":"products\\/gallery\\/ve5lzEuowtluC0YJfajDMOv1WZnHrVf6D2VjXspK.jpg"}',
  ),
  6 => 
  array (
    'id' => 22,
    'category_id' => 2,
    'name' => 'TOTHEMOON - Hoodie Boxy 330GSM CAS K. Dark Grey Abu tua',
    'slug' => 'tothemoon-hoodie-boxy-330gsm-cas-k-dark-grey-abu-tua-jgWiY',
    'price' => 439000,
    'discount_price' => NULL,
    'sizes' => '["S","M","L"]',
    'description' => 'Size Tolerance 1-2 CM*',
    'details' => '{"bahan":"Katun","motif":"Polos","material":"Cotton Fleece 330GSM & Heavyweight","cutting":"Boxy"}',
    'shopee_link' => 'https://shopee.co.id/TOTHEMOON-Hoodie-Boxy-330GSM-CAS-K.-Dark-Grey-Abu-tua-i.925488424.24767594306?extraParams=%7B%22display_model_id%22%3A240573149887%2C%22model_selection_logic%22%3A3%7D&image_ids=id-11134207-82250-mjjnpckphjwn1b',
    'main_image' => 'products/7tXNdQPt8bvXEkrWmLmiNEaNB0FXJ0tlbVseWYvB.jpg',
    'created_at' => '2026-11-01 08:50:43',
    'updated_at' => '2026-11-01 08:50:43',
    'status' => 'aktif',
    'gallery_images' => '{"image_2":"products\\/gallery\\/JvEiOB2wGZBE1hrj4PkwXtIhHJ7zvK4gcykCwivo.jpg","image_3":"products\\/gallery\\/UHI7N8lKTA1nKzgk6tNkGpGC77mNChhWlmtvXgb7.jpg"}',
  ),
  7 => 
  array (
    'id' => 23,
    'category_id' => 2,
    'name' => 'TOTHEMOON - Hoodie Boxy 330GSM CAS K. Broken White',
    'slug' => 'tothemoon-hoodie-boxy-330gsm-cas-k-broken-white-86JeF',
    'price' => 469000,
    'discount_price' => NULL,
    'sizes' => '["S","M","L","XL"]',
    'description' => 'Size Tolerance 1-2 CM*',
    'details' => '{"bahan":"Katun","motif":"Polos","material":"Cotton Fleece 330GSM & Heavyweight","cutting":"Boxy"}',
    'shopee_link' => 'https://shopee.co.id/TOTHEMOON-Hoodie-Boxy-330GSM-CAS-K.-Broken-White-i.925488424.23290589537?extraParams=%7B%22display_model_id%22%3A109379637244%2C%22model_selection_logic%22%3A3%7D&image_ids=id-11134207-8224p-mjjvvorlo9oh12',
    'main_image' => 'products/i5QUC4kBHxfHwgKp0hYHn8nRpoEYP9TWAt7K8Om1.jpg',
    'created_at' => '2026-11-01 08:52:44',
    'updated_at' => '2026-11-01 08:52:44',
    'status' => 'aktif',
    'gallery_images' => '{"image_2":"products\\/gallery\\/mmjeICSTPJdQFBTKQoJuxyW2aRrpqj86zwHvOUbz.jpg","image_3":"products\\/gallery\\/FbKUnz75pol4JC7NNy5b5i0pZS8k88Kk5IxUGV6c.jpg"}',
  ),
  8 => 
  array (
    'id' => 16,
    'category_id' => 1,
    'name' => 'TOTHEMOON - T Shirt 16s Oversized Semi Boxy Heavy Cotton Tothemoon Logo White',
    'slug' => 'tothemoon-t-shirt-16s-oversized-semi-boxy-heavy-cotton-tothemoon-logo-white-Exyd7',
    'price' => 230432,
    'discount_price' => NULL,
    'sizes' => '["S","M","L"]',
    'description' => 'Dibuat dari bahan kain 16s yang berkarakteristik berat dan tebal juga memiliki tekstur lebih kasar namun memeliki daya serap yang sangat baik dan nyaman setelah di cuci. Kain ini lebih unggul dibandingkan dengan bahan kain lainnya, Dikarenakan daya tahan tinggi, masa pakai lebih lama, dan tidak cepat pudar ataupun menyusut.',
    'details' => '{"bahan":"Katun","motif":"Digital Printing","material":"100% Heavyweight Cotton Combed 16s","cutting":"Oversize Semi Boxy"}',
    'shopee_link' => 'https://shopee.co.id/TOTHEMOON-T-Shirt-16s-Oversized-Semi-Boxy-Heavy-Cotton-Black-White-i.925488424.46805181187?extraParams=%7B%22display_model_id%22%3A365474364745%2C%22model_selection_logic%22%3A3%7D&image_ids=id-11134207-82250-mjtkkhweez9h05&is_from_login=true',
    'main_image' => 'products/sLwyAvmmi4sMXZSn6GtmdlhllAVXT8GZp1ESpeP1.jpg',
    'created_at' => '2026-11-01 08:29:11',
    'updated_at' => '2026-11-01 08:29:11',
    'status' => 'aktif',
    'gallery_images' => '{"image_2":"products\\/gallery\\/032Knj9ITLbcqlyKIdVNjJhut9cxRdUBf3o5EvqE.jpg","image_3":"products\\/gallery\\/TU85miYQkaQe8prQK6Yvp9w6jkF3FCU8bhbfKJ9U.jpg"}',
  ),
  9 => 
  array (
    'id' => 15,
    'category_id' => 1,
    'name' => 'TOTHEMOON - T Shirt 16s Oversized Semi Boxy Heavy Cotton Tothemoon Logo Black',
    'slug' => 'tothemoon-t-shirt-16s-oversized-semi-boxy-heavy-cotton-tothemoon-logo-black-8ObRW',
    'price' => 230493,
    'discount_price' => NULL,
    'sizes' => '["S","M","L","XL"]',
    'description' => 'Dibuat dari bahan kain 16s yang berkarakteristik berat dan tebal juga memiliki tekstur lebih kasar namun memeliki daya serap yang sangat baik dan nyaman setelah di cuci. Kain ini lebih unggul dibandingkan dengan bahan kain lainnya, Dikarenakan daya tahan tinggi, masa pakai lebih lama, dan tidak cepat pudar ataupun menyusut.',
    'details' => '{"bahan":"Katun","motif":"Digital Printing","material":"100% Heavyweight Cotton Combed 16s","cutting":"Oversize Semi Boxy"}',
    'shopee_link' => 'https://shopee.co.id/TOTHEMOON-T-Shirt-16s-Oversized-Semi-Boxy-Heavy-Cotton-Threestar-Black-i.925488424.28629922482?extraParams=%7B%22display_model_id%22%3A223955872369%2C%22model_selection_logic%22%3A3%7D&image_ids=id-11134207-8224y-mjjvowxzjg9261',
    'main_image' => 'products/NRFcv9E6Rh1lI5Q2CiaZjE7sOg0s1jly1F4LXthQ.jpg',
    'created_at' => '2026-11-01 08:26:54',
    'updated_at' => '2026-11-01 08:29:28',
    'status' => 'aktif',
    'gallery_images' => '{"image_2":"products\\/gallery\\/PZuVB9JdcsfqHWbf0lg6ytNBwrmbGQC2hPhoCYFO.jpg","image_3":"products\\/gallery\\/feMIC4jDYpKP9KidNJx3XvG6yfBvkKBwvFHkhaAp.jpg"}',
  ),
  10 => 
  array (
    'id' => 17,
    'category_id' => 1,
    'name' => 'TOTHEMOON - T Shirt 16s Oversized Semi Boxy Heavy Cotton Black White Desert Hitam',
    'slug' => 'tothemoon-t-shirt-16s-oversized-semi-boxy-heavy-cotton-black-white-desert-hitam-PEtSd',
    'price' => 230,
    'discount_price' => NULL,
    'sizes' => '["S","M","L","XL"]',
    'description' => 'Dibuat dari bahan kain 16s yang berkarakteristik berat dan tebal juga memiliki tekstur lebih kasar namun memeliki daya serap yang sangat baik dan nyaman setelah di cuci. Kain ini lebih unggul dibandingkan dengan bahan kain lainnya, Dikarenakan daya tahan tinggi, masa pakai lebih lama, dan tidak cepat pudar ataupun menyusut.',
    'details' => '{"bahan":"Katun","motif":"Digital Printing","material":"100% Heavyweight Cotton Combed 16s","cutting":"Oversize Semi Boxy"}',
    'shopee_link' => 'https://shopee.co.id/TOTHEMOON-T-Shirt-16s-Oversized-Semi-Boxy-Heavy-Cotton-Black-White-Desert-Hitam-i.925488424.28479918594?extraParams=%7B%22display_model_id%22%3A252915497261%2C%22model_selection_logic%22%3A3%7D&image_ids=id-11134207-8224v-mjjntu4ededj6d',
    'main_image' => 'products/TtmHXRCNUE947BJQ8MG9uJ0UfAhg1hKzQN8q4svC.jpg',
    'created_at' => '2026-11-01 08:31:43',
    'updated_at' => '2026-11-01 08:32:13',
    'status' => 'aktif',
    'gallery_images' => '{"image_2":"products\\/gallery\\/e0Nqzn0p6JIRihe3eoKmxVlt2hEKZGd0cpyYzlB2.jpg","image_3":"products\\/gallery\\/nOD063VAl6QDbJMyISojX9lQLoQ90KlrA0sEIrfI.jpg"}',
  ),
  11 => 
  array (
    'id' => 18,
    'category_id' => 1,
    'name' => 'TOTHEMOON - T Shirt 16s Oversized Semi Boxy Heavy Cotton Black Love Again',
    'slug' => 'tothemoon-t-shirt-16s-oversized-semi-boxy-heavy-cotton-black-love-again-yeDHA',
    'price' => 235000,
    'discount_price' => NULL,
    'sizes' => '["S","M","L"]',
    'description' => 'Dibuat dari bahan kain 16s yang berkarakteristik berat dan tebal juga memiliki tekstur lebih kasar namun memeliki daya serap yang sangat baik dan nyaman setelah di cuci. Kain ini lebih unggul dibandingkan dengan bahan kain lainnya, Dikarenakan daya tahan tinggi, masa pakai lebih lama, dan tidak cepat pudar ataupun menyusut.',
    'details' => '{"bahan":"Katun","motif":"Digital Printing","material":"100% Heavyweight Cotton Combed 16s","cutting":"Oversize Semi Boxy"}',
    'shopee_link' => 'https://shopee.co.id/TOTHEMOON-T-Shirt-16s-Oversized-Semi-Boxy-Heavy-Cotton-Black-Love-Again-i.925488424.42278082659?extraParams=%7B%22display_model_id%22%3A355442398671%2C%22model_selection_logic%22%3A3%7D&image_ids=id-11134207-8224r-mjjo3977cemf54',
    'main_image' => 'products/vpTvlavwpAt9c5hFyNtfMv6MDVl1IVNBq3z7i6Rg.jpg',
    'created_at' => '2026-11-01 08:34:00',
    'updated_at' => '2026-11-01 08:34:00',
    'status' => 'aktif',
    'gallery_images' => '{"image_2":"products\\/gallery\\/vHfP66HCpQzt3x0v5TIP0CeSrGTiAtbrKFKwZG5P.jpg","image_3":"products\\/gallery\\/ZwNSVV0HQPgZJgrBugc6y4qFYXRzC1G05N9CebOU.jpg"}',
  ),
  12 => 
  array (
    'id' => 19,
    'category_id' => 1,
    'name' => 'Tothemoon - Tshirt Boxy Never Easy Dark Grey',
    'slug' => 'tothemoon-tshirt-boxy-never-easy-dark-grey-ftMVM',
    'price' => 235000,
    'discount_price' => NULL,
    'sizes' => '["S","M","L"]',
    'description' => 'Dibuat dari bahan kain 16s yang berkarakteristik berat dan tebal juga memiliki tekstur lebih kasar namun memeliki daya serap yang sangat baik dan nyaman setelah di cuci. Kain ini lebih unggul dibandingkan dengan bahan kain lainnya, Dikarenakan daya tahan tinggi, masa pakai lebih lama, dan tidak cepat pudar ataupun menyusut.',
    'details' => '{"bahan":"Katun","motif":"Digital Printing","material":"100% Heavyweight Cotton Combed 16s","cutting":"Oversize Semi Boxy"}',
    'shopee_link' => 'https://shopee.co.id/Tothemoon-Tshirt-Boxy-Never-Easy-Dark-Grey-i.925488424.26979922543?extraParams=%7B%22display_model_id%22%3A242915488207%2C%22model_selection_logic%22%3A3%7D&image_ids=id-11134207-7rbk1-m7gkz0yi4hj82b',
    'main_image' => 'products/IHg7zPYf2vQUvHOcwhrJfEMPDMPz9Xrsf2EgOXc4.jpg',
    'created_at' => '2026-11-01 08:37:23',
    'updated_at' => '2026-11-01 08:37:23',
    'status' => 'aktif',
    'gallery_images' => '{"image_2":"products\\/gallery\\/2oLZ3aZ1p779sIIIpB3F8hrDqDRB19Hi77Pm25Au.jpg","image_3":"products\\/gallery\\/f460qoFS8Wl2mKhtTDdkgkd3DUhbRzdf2EEpcLEv.jpg"}',
  ),
  13 => 
  array (
    'id' => 20,
    'category_id' => 2,
    'name' => 'TOTHEMOON - Hoodie Boxy 330GSM Shooting The Moon Black',
    'slug' => 'tothemoon-hoodie-boxy-330gsm-shooting-the-moon-black-RLolQ',
    'price' => 470991,
    'discount_price' => NULL,
    'sizes' => '["S","M","L","XL"]',
    'description' => 'Size Tolerance 1-2 CM*',
    'details' => '{"bahan":"Katun","motif":"Print","material":"Cotton Fleece 330GSM & Heavyweight","cutting":"Boxy"}',
    'shopee_link' => 'https://shopee.co.id/TOTHEMOON-Hoodie-Boxy-330GSM-Shooting-The-Moon-Black-i.925488424.48404798800?extraParams=%7B%22display_model_id%22%3A277339302034%2C%22model_selection_logic%22%3A3%7D&image_ids=id-11134207-8224u-mjjoa06z0y6cb3',
    'main_image' => 'products/EFm0To07VFTxbcDl4F9TlzIgkl8MAZuNTm9TzHTP.jpg',
    'created_at' => '2026-11-01 08:44:00',
    'updated_at' => '2026-11-01 08:44:00',
    'status' => 'aktif',
    'gallery_images' => '{"image_2":"products\\/gallery\\/VDhkEbka1jPLNqlpQ94ap00L3mBTpE9ShZdYNuEF.jpg","image_3":"products\\/gallery\\/IdrWmetx4WjL2ZM10307h6dQf9xQ5iBe63zoi6aT.jpg"}',
  ),
  14 => 
  array (
    'id' => 21,
    'category_id' => 2,
    'name' => 'TOTHEMOON - Hoodie Boxy 330GSM CAS K. Hitam',
    'slug' => 'tothemoon-hoodie-boxy-330gsm-cas-k-hitam-4tFjT',
    'price' => 468990,
    'discount_price' => NULL,
    'sizes' => '["S","M","L"]',
    'description' => 'Size Tolerance 1-2 CM*',
    'details' => '{"bahan":"Katun","motif":"Polos","material":"Cotton Fleece 330GSM & Heavyweight","cutting":"Boxy"}',
    'shopee_link' => 'https://shopee.co.id/TOTHEMOON-Hoodie-Boxy-330GSM-CAS-K.-Hitam-i.925488424.25072057306?extraParams=%7B%22display_model_id%22%3A185169616842%2C%22model_selection_logic%22%3A3%7D&image_ids=id-11134207-8224u-mjjnnmvszqbl7f',
    'main_image' => 'products/sOTbWk272J6dMiMIL9BgIMt7jxck71vAdnYTnAtZ.jpg',
    'created_at' => '2026-11-01 08:46:57',
    'updated_at' => '2026-11-01 08:46:57',
    'status' => 'aktif',
    'gallery_images' => '{"image_2":"products\\/gallery\\/SdNWp1L2PC1q2TcjexvpuzLs3onUAwE6iXtPLLpf.jpg","image_3":"products\\/gallery\\/MdYoWlHgmjg8cjuA0mA9mFl3jwnJXMobjqKSP2D7.jpg"}',
  ),
  15 => 
  array (
    'id' => 24,
    'category_id' => 2,
    'name' => 'TOTHEMOON - Hoodie Boxy 330GSM Love Forever Black And Broken White BW',
    'slug' => 'tothemoon-hoodie-boxy-330gsm-love-forever-black-and-broken-white-bw-prTMs',
    'price' => 471000,
    'discount_price' => NULL,
    'sizes' => '["S","M","L"]',
    'description' => 'Size Tolerance 1-2 CM*',
    'details' => '{"bahan":"Katun","motif":"Digital Printing","material":"Cotton Fleece 330GSM & Heavyweight","cutting":"Boxy"}',
    'shopee_link' => 'https://shopee.co.id/TOTHEMOON-Hoodie-Boxy-330GSM-Love-Forever-Black-And-Broken-White-BW-i.925488424.26572885227?extraParams=%7B%22display_model_id%22%3A242422503623%2C%22model_selection_logic%22%3A3%7D&image_ids=id-11134207-8224w-mjjnhah8o7id08',
    'main_image' => 'products/DRemJhcfUe87CDgyrs32MzzV3fFdDfdcz5jJU9Zt.jpg',
    'created_at' => '2026-11-01 08:56:07',
    'updated_at' => '2026-11-01 08:56:07',
    'status' => 'aktif',
    'gallery_images' => '{"image_2":"products\\/gallery\\/0W0NfG2KmlJ7i4KLUTwy54AQxB3rRG3GQhSsEM2a.jpg","image_3":"products\\/gallery\\/QMaxV9potjlA6DbYnOMCRHHogWCU6d44BgPyDrCQ.jpg"}',
  ),
  16 => 
  array (
    'id' => 25,
    'category_id' => 2,
    'name' => 'TOTHEMOON - Hoodie Boxy 330GSM Love Forever Black And Broken White BW',
    'slug' => 'tothemoon-hoodie-boxy-330gsm-love-forever-black-and-broken-white-bw-jQtIj',
    'price' => 471000,
    'discount_price' => NULL,
    'sizes' => '["S","M","L"]',
    'description' => 'Size Tolerance 1-2 CM*',
    'details' => '{"bahan":"Katun","motif":"Digital Printing","material":"Cotton Fleece 330GSM & Heavyweight","cutting":"Boxy"}',
    'shopee_link' => 'https://shopee.co.id/TOTHEMOON-Hoodie-Boxy-330GSM-Love-Forever-Black-And-Broken-White-BW-i.925488424.26572885227?extraParams=%7B%22display_model_id%22%3A242422503623%2C%22model_selection_logic%22%3A3%7D&image_ids=id-11134207-8224w-mjjnhah8o7id08',
    'main_image' => 'products/mFgpFgT2euAMWgu1lbcvUPTZmzKGOixBGMYRx8FM.jpg',
    'created_at' => '2026-11-01 08:57:48',
    'updated_at' => '2026-11-01 08:57:48',
    'status' => 'aktif',
    'gallery_images' => '{"image_2":"products\\/gallery\\/ebgLmORbsdaAhwXdXp0ctOlWkrJ6C6FzxndIInKQ.jpg","image_3":"products\\/gallery\\/LaepJGu9l6vXHLIN5r7Emj1XIrcfYb8FgWwpSm58.jpg"}',
  ),
  17 => 
  array (
    'id' => 26,
    'category_id' => 2,
    'name' => 'TOTHEMOON - Zipper YKK Hoodie Boxy 330GSM Basic Black Dark Grey Broken White Abu Tua Hitam Putih Tulang',
    'slug' => 'tothemoon-zipper-ykk-hoodie-boxy-330gsm-basic-black-dark-grey-broken-white-abu-tua-hitam-putih-tulang-ArCoN',
    'price' => 471000,
    'discount_price' => NULL,
    'sizes' => '["S","M","L"]',
    'description' => 'Size Tolerance 1-2 CM*',
    'details' => '{"bahan":"Katun","motif":"Zipper","material":"Cotton Fleece 330GSM & Zipper YKK Heavyweight","cutting":"Boxy"}',
    'shopee_link' => 'https://shopee.co.id/TOTHEMOON-Zipper-YKK-Hoodie-Boxy-330GSM-Basic-Black-Dark-Grey-Broken-White-Abu-Tua-Hitam-Putih-Tulang-i.925488424.47105180900?extraParams=%7B%22display_model_id%22%3A249151627416%2C%22model_selection_logic%22%3A3%7D&image_ids=id-11134207-8224s-mjtk10bdq2gx44',
    'main_image' => 'products/wgLO1vv61k4R15qY3l621U1yDjtJlIQ2WZ9znv9A.jpg',
    'created_at' => '2026-11-01 09:01:52',
    'updated_at' => '2026-11-01 09:01:52',
    'status' => 'aktif',
    'gallery_images' => '{"image_2":"products\\/gallery\\/z2KyEyKtGiPiTPYsamMN0qfTFyBUqxqzj60VZOz7.jpg","image_3":"products\\/gallery\\/O9UnKCm1B4pSYiH0vxWvbNuLMrtit7MPqJ67PqKT.jpg"}',
  ),
  18 => 
  array (
    'id' => 27,
    'category_id' => 2,
    'name' => 'TOTHEMOON - Zipper YKK Hoodie Boxy 330GSM Basic Black Dark Grey Broken White Abu Tua Hitam Putih Tulang',
    'slug' => 'tothemoon-zipper-ykk-hoodie-boxy-330gsm-basic-black-dark-grey-broken-white-abu-tua-hitam-putih-tulang-dUq7f',
    'price' => 471000,
    'discount_price' => NULL,
    'sizes' => '["S","M","L"]',
    'description' => 'Size Tolerance 1-2 CM*',
    'details' => '{"bahan":"Katun","motif":"Zipper","material":"Cotton Fleece 330GSM & Zipper YKK Heavyweight","cutting":"Boxy"}',
    'shopee_link' => 'https://shopee.co.id/TOTHEMOON-Zipper-YKK-Hoodie-Boxy-330GSM-Basic-Black-Dark-Grey-Broken-White-Abu-Tua-Hitam-Putih-Tulang-i.925488424.47105180900?extraParams=%7B%22display_model_id%22%3A249151627416%2C%22model_selection_logic%22%3A3%7D&image_ids=id-11134207-8224s-mjtk10bdq2gx44',
    'main_image' => 'products/MQyP1Nmbp06cAsyuBHmSTLW8HQU7Fxi1XVEf4x4J.jpg',
    'created_at' => '2026-11-01 09:03:25',
    'updated_at' => '2026-11-01 09:03:25',
    'status' => 'aktif',
    'gallery_images' => '{"image_2":"products\\/gallery\\/ldFL6aMI0QCyEGDBO2NiOFoOr0BLiqfHVXJvsMBa.jpg","image_3":"products\\/gallery\\/c5P7HmV3b5xN9HreTyCK2eHzpsu7ztdSODsn8IP6.jpg"}',
  ),
  19 => 
  array (
    'id' => 28,
    'category_id' => 2,
    'name' => 'TOTHEMOON - Zipper YKK Hoodie Boxy 330GSM Basic Black Dark Grey Broken White Abu Tua Hitam Putih Tulang',
    'slug' => 'tothemoon-zipper-ykk-hoodie-boxy-330gsm-basic-black-dark-grey-broken-white-abu-tua-hitam-putih-tulang-9tbhC',
    'price' => 471000,
    'discount_price' => NULL,
    'sizes' => '["S","M","L"]',
    'description' => 'Size Tolerance 1-2 CM*',
    'details' => '{"bahan":"Katun","motif":"Zipper","material":"Cotton Fleece 330GSM & Zipper YKK Heavyweight","cutting":"Boxy"}',
    'shopee_link' => 'https://shopee.co.id/TOTHEMOON-Zipper-YKK-Hoodie-Boxy-330GSM-Basic-Black-Dark-Grey-Broken-White-Abu-Tua-Hitam-Putih-Tulang-i.925488424.47105180900?extraParams=%7B%22display_model_id%22%3A249151627416%2C%22model_selection_logic%22%3A3%7D&image_ids=id-11134207-8224s-mjtk10bdq2gx44',
    'main_image' => 'products/GkUzZ2akYlCXRIkXZEm4RUSg7iejS2sn8DwFxzVW.jpg',
    'created_at' => '2026-11-01 09:06:51',
    'updated_at' => '2026-11-01 09:06:51',
    'status' => 'aktif',
    'gallery_images' => '{"image_2":"products\\/gallery\\/FvinKA9yVJlqFE8jWdUTMYKK9mQmkYV1cGitGERL.jpg","image_3":"products\\/gallery\\/IFLy3uaMHrdskYKAYNmlrufu54izS246xVe88I79.jpg"}',
  ),
  20 => 
  array (
    'id' => 29,
    'category_id' => 2,
    'name' => 'TOTHEMOON - Zipper YKK Hoodie Boxy 330GSM Basic Black Dark Grey Broken White Abu Tua Hitam Putih Tulang',
    'slug' => 'tothemoon-zipper-ykk-hoodie-boxy-330gsm-basic-black-dark-grey-broken-white-abu-tua-hitam-putih-tulang-7Jz8D',
    'price' => 471000,
    'discount_price' => NULL,
    'sizes' => '["S","M","L"]',
    'description' => 'Size Tolerance 1-2 CM*',
    'details' => '{"bahan":"Katun","motif":"Zipper","material":"Cotton Fleece 330GSM & Zipper YKK Heavyweight","cutting":"Boxy"}',
    'shopee_link' => 'https://shopee.co.id/TOTHEMOON-Zipper-YKK-Hoodie-Boxy-330GSM-Basic-Black-Dark-Grey-Broken-White-Abu-Tua-Hitam-Putih-Tulang-i.925488424.47105180900?extraParams=%7B%22display_model_id%22%3A249151627416%2C%22model_selection_logic%22%3A3%7D&image_ids=id-11134207-8224s-mjtk10bdq2gx44',
    'main_image' => 'products/E6ghD2mPFE36uSEdt08squf8ffxf3u4mZpANkbXK.jpg',
    'created_at' => '2026-11-01 09:07:35',
    'updated_at' => '2026-11-01 09:07:35',
    'status' => 'aktif',
    'gallery_images' => '{"image_2":"products\\/gallery\\/0xfwwtL4F9NoWUSmF4T89vRwyOxZw2EDhmfUPvnS.jpg","image_3":"products\\/gallery\\/SmpWhVy7tadHvCifc5u56yo52IxxdOmLLJLpjYBc.jpg"}',
  ),
  21 => 
  array (
    'id' => 30,
    'category_id' => 2,
    'name' => 'TOTHEMOON - Hoodie Boxy 330GSM Tothemoon Logo Broken White',
    'slug' => 'tothemoon-hoodie-boxy-330gsm-tothemoon-logo-broken-white-Bw0tq',
    'price' => 480000,
    'discount_price' => NULL,
    'sizes' => '["S","M","L"]',
    'description' => 'Size Tolerance 1-2 CM*',
    'details' => '{"bahan":"Katun","motif":"Digital Printing","material":"Cotton Fleece 330GSM & Heavyweight","cutting":"Boxy"}',
    'shopee_link' => 'https://shopee.co.id/TOTHEMOON-Hoodie-Boxy-330GSM-Tothemoon-Logo-Broken-White-i.925488424.41428077869?extraParams=%7B%22display_model_id%22%3A370442448300%2C%22model_selection_logic%22%3A3%7D&image_ids=id-11134207-8224p-mjjodko9dc7954',
    'main_image' => 'products/uhzYhL7pCb6X9z378UxncFhnf1oO3kFCsoyhD4RJ.jpg',
    'created_at' => '2026-11-01 09:09:59',
    'updated_at' => '2026-11-01 09:09:59',
    'status' => 'aktif',
    'gallery_images' => '{"image_2":"products\\/gallery\\/B6CXMzB3b4nf6OE9zAQWbuyR7pwKhGUczTdnu8mZ.jpg","image_3":"products\\/gallery\\/LNEEdW8DNTyNh99TlQcma9qveoIQAYscWEMpgHLp.jpg"}',
  ),
  22 => 
  array (
    'id' => 31,
    'category_id' => 2,
    'name' => 'Tothemoon - Hoodie Boxy Double Zipper Threestar Hitam',
    'slug' => 'tothemoon-hoodie-boxy-double-zipper-threestar-hitam-rchPd',
    'price' => 480000,
    'discount_price' => NULL,
    'sizes' => '["M","L","XL"]',
    'description' => 'Tothemoon - Hoodie Boxy Double Zipper Threestar Hitam',
    'details' => '{"bahan":"Katun","motif":"Digital Printing","material":"Cotton Fleece 330GSM & Heavyweight","cutting":"Boxy"}',
    'shopee_link' => 'https://shopee.co.id/Tothemoon-Hoodie-Boxy-Double-Zipper-Threestar-Hitam-i.925488424.27529912921?extraParams=%7B%22display_model_id%22%3A69534285073%2C%22model_selection_logic%22%3A3%7D&image_ids=id-11134207-7rbk9-m7ghkzzinzt2ba',
    'main_image' => 'products/b68qVZ20fS6cGSHD3glptOXjCWJlU5yX0zXI5qqc.webp',
    'created_at' => '2026-11-01 09:14:22',
    'updated_at' => '2026-11-01 09:14:22',
    'status' => 'aktif',
    'gallery_images' => '{"image_2":"products\\/gallery\\/RJLTXUy9LLJE2T6gF2nDe5uZPDGpxZqowDsBInno.webp","image_3":"products\\/gallery\\/6bKExbdRNXPohHvF6HXb67MLfLa57vOZ9d8QEiHF.webp"}',
  ),
  23 => 
  array (
    'id' => 32,
    'category_id' => 2,
    'name' => 'TOTHEMOON - Hoodie Boxy 330GSM Basic Hitam Abu Tua Misty Broken White Dark Grey Black',
    'slug' => 'tothemoon-hoodie-boxy-330gsm-basic-hitam-abu-tua-misty-broken-white-dark-grey-black-7iqIL',
    'price' => 450000,
    'discount_price' => NULL,
    'sizes' => '["M","L","XL"]',
    'description' => 'TOTHEMOON-Hoodie-Boxy-330GSM-Basic-Hitam-Abu-Tua-Misty-Broken-White-Dark-Grey-Black',
    'details' => '{"bahan":"Katun","motif":"Polos","material":"Cotton Fleece 330GSM & Heavyweight","cutting":"Boxy"}',
    'shopee_link' => 'https://shopee.co.id/TOTHEMOON-Hoodie-Boxy-330GSM-Basic-Hitam-Abu-Tua-Misty-Broken-White-Dark-Grey-Black-i.925488424.56205175141?extraParams=%7B%22display_model_id%22%3A282357818646%2C%22model_selection_logic%22%3A3%7D&image_ids=id-11134207-8224v-mir66n541vy94b',
    'main_image' => 'products/86ci9ypWDtRgHqPBenH13OlFmugtnoGT4EKDySyi.jpg',
    'created_at' => '2026-11-01 09:16:48',
    'updated_at' => '2026-11-01 09:16:48',
    'status' => 'aktif',
    'gallery_images' => '{"image_2":"products\\/gallery\\/bWm3vFbykfIBCuk3Gq2Rv5u4izKWBiRTSl3XrXwK.jpg","image_3":"products\\/gallery\\/mvILDWQkYoXTzorMhTf7GawiDDyKva1XI2Phjp1G.jpg"}',
  ),
  24 => 
  array (
    'id' => 33,
    'category_id' => 2,
    'name' => 'TOTHEMOON-Hoodie-Boxy-330GSM-Basic-Hitam-Abu-Tua-Misty-Broken-White-Dark-Grey-Black',
    'slug' => 'tothemoon-hoodie-boxy-330gsm-basic-hitam-abu-tua-misty-broken-white-dark-grey-black-LiUjw',
    'price' => 459980,
    'discount_price' => NULL,
    'sizes' => '["M","L","XL"]',
    'description' => 'TOTHEMOON-Hoodie-Boxy-330GSM-Basic-Hitam-Abu-Tua-Misty-Broken-White-Dark-Grey-Black',
    'details' => '{"bahan":"Katun","motif":"Polos","material":"Cotton Fleece 330GSM & Heavyweight","cutting":"Boxy"}',
    'shopee_link' => 'https://shopee.co.id/TOTHEMOON-Hoodie-Boxy-330GSM-Basic-Hitam-Abu-Tua-Misty-Broken-White-Dark-Grey-Black-i.925488424.56205175141?extraParams=%7B%22display_model_id%22%3A282357818646%2C%22model_selection_logic%22%3A3%7D&image_ids=id-11134207-8224v-mir66n541vy94b',
    'main_image' => 'products/C5i0PU4jz2Txo7QLclA4ImlYV80GGdVL7cjIu26N.jpg',
    'created_at' => '2026-11-01 09:19:19',
    'updated_at' => '2026-11-01 09:19:19',
    'status' => 'aktif',
    'gallery_images' => '{"image_2":"products\\/gallery\\/uHzPklCJk4kRiW57sJx9Ck2jrjkVeqfzlxfdRfSC.jpg","image_3":"products\\/gallery\\/Nl2z0ntYjTMkBlS2H25Yohw6RbA8P5gwF6CapcSG.jpg"}',
  ),
  25 => 
  array (
    'id' => 34,
    'category_id' => 2,
    'name' => 'Tothemoon - Hoodie Boxy Double Zipper Shine Dark Brown',
    'slug' => 'tothemoon-hoodie-boxy-double-zipper-shine-dark-brown-ExuKE',
    'price' => 480000,
    'discount_price' => NULL,
    'sizes' => '["M","L","XL"]',
    'description' => 'Tothemoon-Hoodie-Boxy-Double-Zipper-Shine-Dark-Brown',
    'details' => '{"bahan":"Katun","motif":"Digital Printing & Zipper","material":"Cotton Fleece 330GSM & Zipper YKK Heavyweight","cutting":"Boxy"}',
    'shopee_link' => 'https://shopee.co.id/Tothemoon-Hoodie-Boxy-Double-Zipper-Shine-Dark-Brown-i.925488424.25088475708?extraParams=%7B%22display_model_id%22%3A166806781331%2C%22model_selection_logic%22%3A3%7D&image_ids=id-11134207-7rasb-m52nkfv7t8g65f',
    'main_image' => 'products/zqpq8nckD49L8m3WfhWmDFmHs8ZjueIFBeXnb7rU.jpg',
    'created_at' => '2026-11-01 09:21:39',
    'updated_at' => '2026-11-01 09:21:39',
    'status' => 'aktif',
    'gallery_images' => '{"image_2":"products\\/gallery\\/N3eT1uoByU1ukjjOOdsh40nlQaSM7YyynuHW1Po0.jpg","image_3":"products\\/gallery\\/Q4Xe3xb0zfUIo5jvIMFdhNK9dYViaeTg6RDPY3HL.jpg"}',
  ),
  26 => 
  array (
    'id' => 35,
    'category_id' => 2,
    'name' => 'TOTHEMOON - Hoodie Boxy 330GSM Love Forever Black And Broken White BW',
    'slug' => 'tothemoon-hoodie-boxy-330gsm-love-forever-black-and-broken-white-bw-alAnv',
    'price' => 470000,
    'discount_price' => NULL,
    'sizes' => '["S","M","L"]',
    'description' => 'TOTHEMOON-Hoodie-Boxy-330GSM-Love-Forever-Black-And-Broken-White-BW',
    'details' => '{"bahan":"Katun","motif":"Digital Printing","material":"Cotton Fleece 330GSM & Heavyweight","cutting":"Boxy"}',
    'shopee_link' => 'https://shopee.co.id/TOTHEMOON-Hoodie-Boxy-330GSM-Love-Forever-Black-And-Broken-White-BW-i.925488424.26572885227?extraParams=%7B%22display_model_id%22%3A242422503623%2C%22model_selection_logic%22%3A3%7D&image_ids=id-11134207-8224w-mjjnhah8o7id08',
    'main_image' => 'products/Os0KmHdcBBVJYKYUab4gORUzfmcZElV9Xi4rtdh4.jpg',
    'created_at' => '2026-11-01 09:24:18',
    'updated_at' => '2026-11-01 09:24:18',
    'status' => 'aktif',
    'gallery_images' => '{"image_2":"products\\/gallery\\/fUkJgxHfuENR09Ro3kWqILKOB1N4RrKdJbBK7WkW.jpg","image_3":"products\\/gallery\\/dN8sOFfvWYfw9mWRmGYdp8GBb16WawkZsy2kZFVS.jpg"}',
  ),
  27 => 
  array (
    'id' => 36,
    'category_id' => 3,
    'name' => 'Tothemoon - Sweatpants Baggy Shine Dark Brown',
    'slug' => 'tothemoon-sweatpants-baggy-shine-dark-brown-lXmJF',
    'price' => 340000,
    'discount_price' => NULL,
    'sizes' => '["M","L","XL"]',
    'description' => 'Tothemoon - Sweatpants Baggy Shine Dark Brown',
    'details' => '{"bahan":"Katun","motif":"sablon fluorescent plastisol","material":"100% Cotton Fleece 300gsm","cutting":"baggy fit"}',
    'shopee_link' => 'https://shopee.co.id/Tothemoon-Sweatpants-Baggy-Shine-Dark-Brown-i.925488424.28379918195?extraParams=%7B%22display_model_id%22%3A149075596564%2C%22model_selection_logic%22%3A3%7D&image_ids=id-11134207-7rbk0-m7giar53vxee97',
    'main_image' => 'products/GDX5pxLKKn4hXUhf2xOWAalGnlAQtjma7U0zTQSL.jpg',
    'created_at' => '2026-11-01 09:35:57',
    'updated_at' => '2026-11-01 09:35:57',
    'status' => 'aktif',
    'gallery_images' => '{"image_2":"products\\/gallery\\/cMIeHWHB1HxkF2WRd17WORnr5wUe7nykNdIZV9qq.jpg","image_3":"products\\/gallery\\/TxhPKgboW6DSFyFQWqA366rZ4k6LagrbcloqUttT.jpg"}',
  ),
);
        foreach ($products as $p) {
            DB::table('products')->updateOrInsert(['id' => $p['id']], $p);
        }

        // WEB SETTINGS
        $webSettings = array (
  0 => 
  array (
    'id' => 1,
    'key' => 'about_quote',
    'value' => '“Not every journey needs a rocket.”',
    'created_at' => '2026-11-01 13:10:26',
    'updated_at' => '2026-11-01 13:10:26',
  ),
  1 => 
  array (
    'id' => 2,
    'key' => 'about_philosophy',
    'value' => 'We believe that reaching the moon isn\'t about having the fastest way to get there, but about having the courage to create your own way.

The moon represents our dreams, ambitions, and everything beyond our limits. Without a rocket represents the belief that there is no single way to achieve greatness.

No shortcuts. No limitations. Just your own way of reaching the moon.',
    'created_at' => '2026-11-01 13:10:26',
    'updated_at' => '2026-11-01 13:10:26',
  ),
  2 => 
  array (
    'id' => 4,
    'key' => 'about_mission',
    'value' => 'Menciptakan pakaian yang bukan hanya menjadi bagian dari penampilan, tetapi juga representasi karakter dan identitas diri.
Menghadirkan karya dengan desain yang autentik, berkarakter, dan memiliki makna.
Mendorong setiap individu untuk berani menjadi diri sendiri, berpikir bebas, dan mengejar apa yang mereka yakini.
Membangun komunitas yang percaya bahwa keterbatasan bukan alasan untuk berhenti bermimpi.',
    'created_at' => '2026-11-01 13:10:26',
    'updated_at' => '2026-11-01 13:10:26',
  ),
  3 => 
  array (
    'id' => 3,
    'key' => 'about_vision',
    'value' => 'Menjadi brand yang merepresentasikan kebebasan berekspresi, keberanian bermimpi, dan kepercayaan diri untuk melampaui batas. Kami percaya bahwa setiap orang punya jalannya sendiri untuk mencapai sesuatu yang besar, bahkan tanpa harus memiliki segalanya.',
    'created_at' => '2026-11-01 13:10:26',
    'updated_at' => '2026-11-01 13:26:58',
  ),
  4 => 
  array (
    'id' => 5,
    'key' => 'about_values',
    'value' => '[{"title":"AMBISI","desc":"Selalu berani bermimpi lebih besar, menetapkan tujuan yang lebih tinggi, dan percaya pada potensi diri sendiri."},{"title":"INDIVIDUALITAS","desc":"Menghargai keunikan setiap individu, berani tampil berbeda, dan tidak takut menjadi diri sendiri."},{"title":"KREATIVITAS","desc":"Berpikir di luar batas, berani mengeksplorasi ide baru, dan menciptakan jalan sendiri."},{"title":"KEBERANIAN","desc":"Berani mengambil langkah pertama, menghadapi ketidakpastian, dan mengejar sesuatu yang dianggap mustahil."},{"title":"AUTENTISITAS","desc":"Tetap jujur pada identitas diri, memiliki karakter yang kuat, dan tidak kehilangan jati diri hanya demi mengikuti tren."}]',
    'created_at' => '2026-11-01 13:10:26',
    'updated_at' => '2026-11-01 13:26:58',
  ),
  5 => 
  array (
    'id' => 8,
    'key' => 'contact_tiktok',
    'value' => 'tothemoon.id',
    'created_at' => '2026-11-01 13:54:14',
    'updated_at' => '2026-11-01 13:54:14',
  ),
  6 => 
  array (
    'id' => 9,
    'key' => 'contact_shopee_name',
    'value' => 'Tothemoon.war',
    'created_at' => '2026-11-01 13:54:14',
    'updated_at' => '2026-11-01 13:54:14',
  ),
  7 => 
  array (
    'id' => 10,
    'key' => 'contact_shopee_url',
    'value' => 'https://shopee.co.id',
    'created_at' => '2026-11-01 13:54:14',
    'updated_at' => '2026-11-01 13:54:14',
  ),
  8 => 
  array (
    'id' => 6,
    'key' => 'contact_email',
    'value' => 'tothemoon@gmail.com',
    'created_at' => '2026-11-01 13:54:14',
    'updated_at' => '2026-11-01 13:59:18',
  ),
  9 => 
  array (
    'id' => 7,
    'key' => 'contact_ig',
    'value' => 'tothemoon.war',
    'created_at' => '2026-11-01 13:54:14',
    'updated_at' => '2026-11-01 13:59:18',
  ),
);
        foreach ($webSettings as $w) {
            DB::table('web_settings')->updateOrInsert(['key' => $w['key']], $w);
        }

        // CONTACT MESSAGES
        $contactMessages = array (
  0 => 
  array (
    'id' => 1,
    'name' => 'Sukma Nabila',
    'email' => 'sukmanabila93@gmail.com',
    'message' => 'Apakah baju boxy polos warna putih ukuran M masih tersedia?',
    'is_read' => true,
    'created_at' => '2026-11-01 14:38:18',
    'updated_at' => '2026-11-01 14:38:44',
  ),
  1 => 
  array (
    'id' => 2,
    'name' => 'jaehyun',
    'email' => 'jeongjaehyun@gmail.com',
    'message' => 'heyyyyy',
    'is_read' => false,
    'created_at' => '2026-11-01 14:54:36',
    'updated_at' => '2026-11-01 14:54:36',
  ),
  2 => 
  array (
    'id' => 3,
    'name' => 'rixa',
    'email' => 'risanuraeni23@gmail.com',
    'message' => 'informasi pengiriman',
    'is_read' => true,
    'created_at' => '2026-11-01 14:55:35',
    'updated_at' => '2026-11-01 15:25:00',
  ),
);
        foreach ($contactMessages as $m) {
            DB::table('contact_messages')->updateOrInsert(['id' => $m['id']], $m);
        }

        // Sinkronisasi PostgreSQL sequence auto-increment ID
        if (DB::getDriverName() === 'pgsql') {
            $tables = ['users', 'categories', 'products', 'web_settings', 'contact_messages'];
            foreach ($tables as $table) {
                DB::statement("SELECT setval(pg_get_serial_sequence('{$table}', 'id'), coalesce(max(id), 1)) FROM {$table}");
            }
        }
    }
}
