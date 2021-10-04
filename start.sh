#!/bin/bash

echo 'usowam wszystko co bylo wczesniej'
php artisan migrate:reset

echo 'tworze tabele - wywołuje migrację'
php artisan migrate

echo 'uzpełniam Kategorie i podkategorie ogłoszęń drobnych danymi'
php artisan db:seed --class SmallAdsCategoriesSeeds

echo 'uzupelniam dane ogłoszen drobnych - przyklady';
php artisan db:seed --class SmallAdsContentsSeeds

echo 'uzupełniam wpisy o zdjęciach przy ogłoszeniach dronych'
php artisan db:seed --class SmallAdsPhotoSeeds

echo 'uzupełniam Marki i modele danymi'
php artisan db:seed --class AutoBrandModelSeeds

echo 'uzupełniam dane w tabeli nadwozia'
php artisan db:seed --class CarsBodySeeds

echo 'uzupełniam dane w tabeli nadwozia'
php artisan db:seed --class CarsContentSeeds

echo 'uzupelniam dane uzytkownikow - ';
php artisan db:seed --class UsersSeeds

echo 'uzupelniam zdjęcia przy uzytkownikach- ';

echo 'uzupelniam kategogie przy nieruchomosciach';
php artisan db:seed --class EstatesCategoriesSeeds

echo 'uzupelniam dane nieruchomosc - przyklady';
php artisan db:seed --class EstatesContentsSeeds

echo 'uzupelniam dane nieruchomosc - zdjecia';
php artisan db:seed --class EstatesPhotoSeeds

echo 'dodaje kilka kategori do dzialu uslug';
php artisan db:seed --class ServicesCategoriesSeeds

echo 'dodaje ceny do cennika'
php artisan db:seed --class PricesSeeds

echo 'dodaje sekcje'
php artisan db:seed --class SectionSeeds
