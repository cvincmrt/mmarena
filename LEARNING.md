# Laravel projekt – MM Arena

## 1. Cieľ projektu

Postupne vytvoriť nový web pre MM Arenu (`mmarena.sk`) pomocou Laravelu, Blade, HTML a CSS.

Cieľom je naučiť sa potrebné základy a pritom reálne vytvárať web. Každú novú tému si najprv vysvetlíme, potom ju prakticky vyskúšam a až následne budeme pokračovať.

## 2. Pravidlá učenia

- Postupovať po malých krokoch.
- Nové témy vysvetľovať jednoducho a na príkladoch.
- Kód píšem a upravujem ja.
- Po každej úlohe pošlem výsledok na kontrolu.
- Neopakovať zbytočne témy, ktoré už ovládam.
- Zachovať pôvodný obsah webu a jeho URL adresy. Ak bude potrebné adresy zmeniť, vyriešiť presmerovania.

## 3. Technické prostredie

- **Projekt:** MM Arena
- **GitHub:** https://github.com/cvincmrt/mmarena.git
- **Vetva:** `main`
- **Operačný systém:** Windows
- **Lokálne prostredie:** Laravel Herd
- **Laravel:** 13.37.0
- **PHP:** 8.4.25
- **Composer:** 2.10.2
- **Databáza:** SQLite
- **Šablóny:** Blade
- **Frontend:** HTML a CSS
- **Administrácia v budúcnosti:** Filament

Projekt nepoužíva starter kit.

## 4. Čo už mám hotové

### Prostredie a Git

- [x] Naklonovanie projektu z GitHubu.
- [x] Inštalácia závislostí cez Composer.
- [x] Vytvorenie lokálneho súboru `.env`.
- [x] Vygenerovanie aplikačného kľúča.
- [x] Vytvorenie SQLite databázy.
- [x] Spustenie databázových migrácií.
- [x] Spustenie Laravel servera.
- [x] Základná práca s Gitom: commit a push.

### Routes a controllery

- [x] Pochopiť základné routy v `routes/web.php`.
- [x] Vytvoriť pomenované routy `home` a `contact`.
- [x] Zobraziť zoznam rout pomocou `php artisan route:list`.
- [x] Vytvoriť `HomeController`.
- [x] Použiť metódy `index()` a `contact()`.
- [x] Odovzdať údaje z controllera do Blade pomocou `compact()`.

### Blade a spoločná šablóna

- [x] Vytvoriť spoločnú šablónu `layouts/app.blade.php`.
- [x] Pochopiť `@yield`, `@extends` a `@section`.
- [x] Vytvoriť stránky `home.blade.php` a `contact.blade.php`.
- [x] Použiť pomenované routy v navigácii pomocou `route()`.
- [x] Zobraziť dynamické údaje pomocou `{{ }}`.

### PHP polia a Blade cykly

- [x] Vytvoriť pole `$sluzby` v `HomeController`.
- [x] Odovzdať pole do view pomocou `compact()`.
- [x] Zobraziť položky poľa v `home.blade.php`.
- [x] Použiť `@forelse`, `@empty` a `@endforelse`.
- [x] Otestovať zoznam s položkami aj prázdne pole.
- [x] Použiť HTML zoznam s elementmi `<ul>` a `<li>`.

## 5. Aktuálny stav projektu

Funkčné stránky:

- `/` – domovská stránka
- `/contact` – kontaktná stránka

Pomenované routy:

- `home`
- `contact`

Domovská stránka zatiaľ používa skúšobné údaje:

- Názov: MM Arena
- Mesto: Ostrava
- Počet klzísk: 1
- Služby: verejné korčuľovanie, hokejový tréning, prenájom ľadu

Ide o testovacie údaje, ktoré neskôr nahradíme správnymi informáciami pre web.

## 6. Najbližšia lekcia

### Asociatívne polia v PHP

- [ ] Pochopiť rozdiel medzi obyčajným a asociatívnym poľom.
- [ ] Priradiť každej službe názov a cenu.
- [ ] Odovzdať nové údaje do Blade.
- [ ] Zobraziť názvy a ceny na stránke.
- [ ] Precvičiť si `@foreach`.

## 7. Ďalší plán

1. PHP polia, podmienky a cykly.
2. Blade komponenty a opakovane použiteľné časti stránky.
3. HTML a CSS – vzhľad a responzívny dizajn.
4. Postupná tvorba stránok mmarena.sk.
5. Databázové modely a migrácie podľa potrieb webu.
6. Administrácia cez Filament.
7. Čítanie udalostí z Google Kalendára.
8. Zachovanie pôvodného obsahu, URL adries a nastavenie presmerovaní.
9. Testovanie, bezpečnosť a nasadenie webu.

## 8. Záznamy ďalších lekcií

Po dokončení každej novej témy sem doplníme, čo som sa naučil, čo funguje a čo bude nasledovať.
