# mmarena.sk — Učebný denník Laravelu

## Cieľ projektu

Postupne vytvoriť nový web mmarena.sk pomocou Laravelu, Blade a CSS. Učiť sa pritom PHP, HTML, CSS a Laravel prakticky, krok za krokom.

## Ako spolu pracujeme

- Postupujeme po malých krokoch.
- Každú novú vec vysvetlíme a používateľ si ju prakticky vyskúša.
- Pred pokračovaním skontrolujeme výsledok.
- Neopakujeme hotové lekcie bez dôvodu.
- Po každej lekcii aktualizujeme tento súbor.
- Zmeny v kóde pravidelne ukladáme do GitHubu.
- Zachovávame existujúci obsah webu a dôležité pôvodné URL.
- Google Kalendár bude slúžiť iba na čítanie udalostí. Voľné termíny nebudeme odvodzovať z neprítomnosti udalostí.
- Filament a administráciu pridáme až po zvládnutí základov.

## Technické prostredie

- Framework: Laravel 13.37.0
- PHP: 8.4.25
- Lokálne prostredie: Windows + Herd
- Projekt na domácom počítači: `C:\ProjectLaravel\mmarena`
- GitHub: https://github.com/cvincmrt/mmarena.git
- Vetva Git: `main`
- Databáza: SQLite
- Frontend: Blade a CSS
- Starter kit: nepoužitý

## Hotové lekcie

### 1. Základ projektu a GitHub

- [x] Vytvorenie Laravel projektu.
- [x] Prvý commit a nahratie projektu na GitHub.
- [x] Klonovanie projektu na druhý počítač.
- [x] Inštalácia PHP závislostí cez Composer.
- [x] Vytvorenie lokálneho `.env` a aplikačného kľúča.
- [x] Vytvorenie SQLite databázy a spustenie migrácií.
- [x] Úspešné spustenie lokálneho servera.

### 2. Routes

- [x] Domovská route `/` s názvom `home`.
- [x] Kontaktná route `/contact` s názvom `contact`.
- [x] Používanie pomenovaných rout.
- [x] Kontrola rout príkazom `php artisan route:list`.

### 3. Controllery

- [x] `HomeController@index` zobrazuje domovskú stránku.
- [x] `HomeController@contact` zobrazuje kontaktnú stránku.
- [x] Odovzdávanie premenných do view pomocou `compact()`.
- [x] Presunutie logiky kontaktnej stránky z route do controllera.

### 4. Blade a layout

- [x] Spoločný layout `resources/views/layouts/app.blade.php`.
- [x] Použitie `@yield('title')` a `@yield('content')`.
- [x] Použitie `@extends`, `@section` a `@endsection`.
- [x] Navigácia cez `route('home')` a `route('contact')`.

## Aktuálny stav projektu

Existujú tieto dôležité súbory:

- `routes/web.php`
- `app/Http/Controllers/HomeController.php`
- `resources/views/layouts/app.blade.php`
- `resources/views/home.blade.php`
- `resources/views/contact.blade.php`

V `HomeController` sú zatiaľ ukážkové údaje:

- Názov arény: MM Arena
- Mesto: Ostrava
- Počet klzísk: 1

Domovská aj kontaktná stránka sa lokálne zobrazujú správne.

## Najbližšia lekcia

### 5. PHP polia a Blade `@foreach`

Ciele:

- [ ] Pochopiť, čo je pole v PHP.
- [ ] Vytvoriť jednoduché pole s údajmi pre stránku.
- [ ] Odovzdať pole z controllera do Blade view.
- [ ] Zobraziť položky pomocou `@foreach`.
- [ ] Vyskúšať malú samostatnú úlohu.

Nebudeme znova vytvárať layout ani opakovať základy rout a controllerov.

## Ďalší plán

1. PHP polia, podmienky a cykly.
2. Blade komponenty a opakovane použiteľné časti stránky.
3. HTML a CSS, responzívny dizajn.
4. Návrh a postupná tvorba stránok mmarena.sk.
5. Databázové modely a migrácie podľa potrieb webu.
6. Administrácia cez Filament.
7. Čítanie udalostí z Google Kalendára.
8. Kontrola pôvodného obsahu, URL a presmerovaní.
9. Testovanie, bezpečnosť a nasadenie.

## Záznamy ďalších lekcií

Nové lekcie pridávame sem s dátumom, stručným popisom, výsledkom a úlohou na pokračovanie.
