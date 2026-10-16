# LEARNING.md — MMarena.sk

## 1. Cieľ projektu

Postupne sa naučiť Laravel a vytvoriť webovú stránku **mmarena.sk**.

Projekt budujeme tak, aby sme sa naučili nielen napísať funkčný kód, ale aj rozumeli tomu, prečo ho píšeme a ako jednotlivé časti spolupracujú.

Plánované časti projektu:
- Verejná webová stránka.
- Zobrazovanie služieb a cien z databázy.
- Formuláre na vytváranie a úpravu údajov.
- Prihlasovanie používateľov cez Laravel Breeze, ak overíme kompatibilitu s aktuálnou verziou Laravelu.
- Administrácia cez Filament.
- Ochrana administrácie pred neoprávneným prístupom.
- Neskôr práca s podujatiami a Google Kalendárom.
- Zachovanie existujúcich URL adries pri migrácii pôvodného webu.
- Testovanie, bezpečnosť a príprava na nasadenie.

---

## 2. Pravidlá učenia

1. Učíme sa postupne, po malých krokoch.
2. Vysvetľujeme si nové pojmy a dôvody, prečo ich používame.
3. HTML a CSS základy už poznám, preto sa sústredíme hlavne na Laravel, PHP, databázu a architektúru aplikácie.
4. Pri každej úlohe najskôr vysvetliť, čo ideme robiť.
5. Potom spraviť jednu konkrétnu úlohu.
6. Po dokončení počkať na moje potvrdenie „hotovo“ alebo „mám“.
7. Až potom pokračovať ďalším krokom.
8. Ak niečo nefunguje, najskôr problém pochopiť a opraviť, nie preskakovať na ďalšiu tému.
9. Kód má byť prehľadný a zrozumiteľný, nie zbytočne komplikovaný.
10. Priebežne aktualizovať tento súbor, aby sme vedeli, kde sme skončili.

---

## 3. Technické prostredie

### Projekt

- Názov: `mmarena`
- Cesta vo Windows: `C:\ProjectLaravel\mmarena`
- GitHub repozitár: `https://github.com/cvincmrt/mmarena.git`
- Vetva Git: `main`

### Používané technológie

- Laravel 13.37.0
- PHP 8.4.25
- Composer 2.10.2
- Node.js 24.22.0
- SQLite
- Blade
- Tailwind CSS 4
- Vite
- Git a GitHub

### Užitočné príkazy

Spustenie Laravel servera:

```bash
php artisan serve
```

Web bude dostupný na:

```text
http://127.0.0.1:8000
```

Spustenie Vite:

```bash
npm run dev
```

Zobrazenie dostupných ciest:

```bash
php artisan route:list
```

Spustenie migrácií:

```bash
php artisan migrate
```

Vytvorenie modelu a migrácie:

```bash
php artisan make:model Service -m
```

Vo Windows používame Laravel Herd a Git Bash. Ak príkaz `php artisan` v Git Bash nefunguje, môžeme použiť:

```bash
cmd.exe //c "cd /d C:\ProjectLaravel\mmarena && php artisan route:list"
```

---

## 4. Čo sme už prešli

### 4.1 Základy projektu a Git

- [x] Pripravenie Laravel projektu.
- [x] Základná orientácia v štruktúre projektu.
- [x] Súbor `.env`.
- [x] Aplikačný kľúč.
- [x] Základy práce s Gitom a GitHubom.
- [x] Rozdiel medzi vývojovým prostredím a samotnou aplikáciou.

### 4.2 Routes a controllery

- [x] Čo je route.
- [x] Čo je controller.
- [x] Ako route zavolá metódu controllera.
- [x] Pomenované routes.
- [x] Používanie `route('home')` a `route('contact')`.
- [x] Základný význam `Route::get()`.
- [x] Používanie `php artisan route:list`.

Aktuálne máme verejné stránky:

- `/` — domovská stránka.
- `/contact` — kontaktná stránka.

### 4.3 Blade a spoločný layout

- [x] Čo je Blade.
- [x] Používanie `@extends`.
- [x] Používanie `@section`.
- [x] Používanie `@yield`.
- [x] Spoločný layout `layouts/app.blade.php`.
- [x] Odkazy pomocou pomenovaných routes.
- [x] Zobrazovanie bezpečne escapovaného výstupu pomocou `{{ }}`.

### 4.4 PHP polia a cykly

- [x] Indexované polia.
- [x] Asociatívne polia.
- [x] Práca s kľúčmi a hodnotami.
- [x] Blade cyklus `@foreach`.
- [x] Blade cyklus `@forelse`.
- [x] Práca s prázdnym výsledkom pomocou `@empty`.

### 4.5 Podmienky

- [x] PHP podmienky.
- [x] Blade `@if`.
- [x] Blade `@elseif`.
- [x] Blade `@else`.
- [x] Blade `@endif`.
- [x] Praktické testovanie rôznych hodnôt.

### 4.6 Tailwind CSS a Vite

- [x] Inštalácia a spustenie frontendových závislostí.
- [x] Základné používanie Tailwind CSS.
- [x] Načítanie CSS a JavaScriptu cez Vite.
- [x] Responzívny grid.
- [x] Karty služieb.
- [x] Základné okraje, odsadenia, farby a tiene.

Používame Tailwind CSS 4.

Hlavný CSS súbor:

```text
resources/css/app.css
```

### 4.7 Databáza a migrácie

- [x] Nastavenie SQLite.
- [x] Vytvorenie databázového súboru.
- [x] Vykonanie migrácií.
- [x] Pochopenie účelu migrácie.
- [x] Vytvorenie tabuľky `services`.

Tabuľka `services` obsahuje:

| Stĺpec | Význam |
|---|---|
| `id` | Jedinečné ID záznamu |
| `name` | Názov služby |
| `description` | Popis služby, môže byť prázdny |
| `price` | Cena |
| `is_active` | Či sa má služba zobrazovať |
| `created_at` | Čas vytvorenia |
| `updated_at` | Čas poslednej úpravy |

### 4.8 Model Service a Eloquent

- [x] Vytvorenie modelu `Service`.
- [x] Pochopenie základného účelu modelu.
- [x] Základné použitie Eloquentu.
- [x] Použitie `Service::all()`.
- [x] Použitie `Service::where(...)->get()`.
- [x] Použitie `Service::first()`.
- [x] Základné pochopenie `count()`.
- [x] Pochopenie, že model predstavuje záznam v databáze.
- [x] Základné čítanie vlastností objektu, napríklad `$service->name`.
- [x] Import modelu cez `use App\Models\Service;`.

Aktuálny model:

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'is_active',
    ];
}
```

`$fillable` určuje, ktoré atribúty možno hromadne priradiť napríklad pri použití `Service::create()`.

### 4.9 Prepojenie databázy s webovou stránkou

- [x] Načítanie služieb v `HomeController`.
- [x] Filtrovanie aktívnych služieb.
- [x] Poslanie dát do Blade view.
- [x] Zobrazenie názvu a ceny služby.
- [x] Zobrazenie správy, ak nie sú dostupné žiadne služby.
- [x] Responzívne zobrazenie služieb.

Aktuálna logika v controllery používa približne tento princíp:

```php
$sluzby = Service::where('is_active', true)->get();
```

A v Blade sa následne zobrazujú jednotlivé služby.

---

## 5. Aktuálny stav projektu

Projekt funguje lokálne.

- [x] Laravel aplikácia sa spúšťa.
- [x] Domovská stránka existuje.
- [x] Kontaktná stránka existuje.
- [x] Spoločný layout funguje.
- [x] Tailwind CSS sa načítava.
- [x] Databáza SQLite funguje.
- [x] Tabuľka `services` existuje.
- [x] Model `Service` existuje.
- [x] Domovská stránka načítava aktívne služby z databázy.

V databáze máme testovaciu službu s názvom „Verejné korčuľovanie“. Jej aktuálne údaje sú len testovacie a neskôr ich upravíme podľa reálnych potrieb webu.

### Dôležité: zatiaľ nie je hotové

- [ ] Formuláre na správu služieb.
- [ ] Vytváranie, úprava a mazanie služieb cez web.
- [ ] Validácia formulárov.
- [ ] Laravel Breeze — prihlasovanie a prípadná registrácia.
- [ ] Ochrana administratívnych routes.
- [ ] Filament.
- [ ] Role a oprávnenia používateľov.
- [ ] Google Kalendár.
- [ ] Testy a nasadenie.

---

## 6. Plán ďalšieho učenia

Budeme postupovať v tomto poradí. Poradie môžeme upraviť, ak sa pri vývoji ukáže, že niečo potrebujeme skôr.

### Fáza 1 — Lepšie pochopiť Eloquent

- [ ] Rozdiel medzi modelom, objektom a kolekciou.
- [ ] Rozdiel medzi `all()`, `get()`, `first()` a `find()`.
- [ ] Filtrovanie záznamov cez `where()`.
- [ ] Čítanie a zmena vlastností objektu.
- [ ] Uloženie zmien pomocou `save()`.
- [ ] Vytvorenie záznamu cez objektový spôsob.
- [ ] Aktualizácia existujúceho záznamu.
- [ ] Bezpečné mazanie záznamu.
- [ ] Rozdiel medzi `create()` a postupným vytvorením objektu.

Cieľ: rozumieť tomu, ako Laravel pracuje s údajmi v databáze.

### Fáza 2 — Formuláre a validácia

- [ ] HTML formulár v Blade.
- [ ] Odoslanie formulára cez `POST`.
- [ ] Route na spracovanie formulára.
- [ ] Spracovanie údajov v controllery.
- [ ] Validácia vstupov.
- [ ] Zobrazovanie validačných chýb.
- [ ] Použitie starých hodnôt formulára.
- [ ] Ochrana pred neplatnými vstupmi.
- [ ] CSRF ochrana.
- [ ] Presmerovanie po úspešnom uložení.

### Fáza 3 — CRUD pre služby

CRUD znamená vytvorenie, zobrazenie, úpravu a mazanie záznamov.

- [ ] Zoznam služieb.
- [ ] Detail služby, ak ho budeme potrebovať.
- [ ] Vytvorenie služby.
- [ ] Úprava služby.
- [ ] Mazanie služby.
- [ ] Aktivovanie a deaktivovanie služby.
- [ ] Rozdelenie zodpovedností medzi routes, controller, model a view.
- [ ] Opakovane použiteľné Blade komponenty.

Cieľ: vedieť spravovať služby bez ručného vkladania dát cez Tinker.

### Fáza 4 — Laravel Breeze: prihlasovanie používateľov

**Breeze zatiaľ nie je nainštalovaný.** Pred inštaláciou overíme, aký postup a aká verzia starter kitu sú kompatibilné s naším Laravelom 13 a aktuálnym frontendovým stackom.

- [ ] Pochopiť, čo rieši autentifikácia.
- [ ] Pochopiť rozdiel medzi autentifikáciou a autorizáciou.
- [ ] Overiť kompatibilitu Breeze s Laravelom 13.
- [ ] Skontrolovať oficiálny a aktuálny postup inštalácie.
- [ ] Pripraviť Git commit alebo inú možnosť návratu pred väčšími zmenami.
- [ ] Nainštalovať vhodný starter kit, ak je kompatibilný.
- [ ] Skontrolovať migrácie a tabuľku používateľov.
- [ ] Nastaviť prihlasovanie a odhlasovanie.
- [ ] Rozhodnúť, či potrebujeme verejnú registráciu.
- [ ] Otestovať prihlasovanie a odhlasovanie.
- [ ] Otestovať, čo sa stane pri nesprávnom hesle.
- [ ] Pochopiť middleware `auth`.
- [ ] Chrániť vybrané routes pred neprihlásenými návštevníkmi.

Dôležité: úspešné prihlásenie samo osebe neznamená, že používateľ má právo spravovať web. Oprávnenia administrátora vyriešime samostatne.

Ak sa ukáže, že Breeze nie je vhodný pre našu konkrétnu verziu, vyberieme podporovaný postup namiesto toho, aby sme nasilu inštalovali nekompatibilné balíky.

### Fáza 5 — Filament: administrácia

Filament použijeme na vytvorenie pohodlnej administrácie, ak bude vhodný pre aktuálnu verziu Laravelu.

- [ ] Overiť kompatibilitu Filamentu s Laravelom 13.
- [ ] Pochopiť, čo Filament poskytuje.
- [ ] Nainštalovať kompatibilnú verziu.
- [ ] Vytvoriť administratívny panel.
- [ ] Vytvoriť správu služieb.
- [ ] Nastaviť formuláre a tabuľky.
- [ ] Nastaviť prístup iba pre oprávnených používateľov.
- [ ] Overiť ochranu administrácie.
- [ ] Otestovať prístup neprihláseného používateľa.
- [ ] Otestovať prístup bežného používateľa.
- [ ] Otestovať prístup administrátora.

Breeze a Filament majú rozdielne úlohy: Breeze rieši používateľskú autentifikáciu a Filament poskytuje administratívne rozhranie. Ich integráciu nastavíme vedome a otestujeme.

### Fáza 6 — Databázové vzťahy

- [ ] Pochopiť vzťah `hasMany`.
- [ ] Pochopiť vzťah `belongsTo`.
- [ ] Navrhnúť ďalšie modely podľa potrieb webu.
- [ ] Pochopiť migrácie pre cudzie kľúče.
- [ ] Načítať súvisiace údaje.
- [ ] Vyhnúť sa zbytočným databázovým dotazom.

### Fáza 7 — Skutočný obsah mmarena.sk

- [ ] Zmapovať existujúce stránky a URL.
- [ ] Navrhnúť štruktúru stránok.
- [ ] Doplniť reálny obsah.
- [ ] Doplniť služby a ceny.
- [ ] Doladiť responzívny dizajn.
- [ ] Skontrolovať navigáciu.
- [ ] Zachovať dôležité pôvodné URL alebo pripraviť presmerovania.
- [ ] Skontrolovať titulky, meta popisy a základné SEO.

### Fáza 8 — Podujatia a Google Kalendár

- [ ] Navrhnúť model podujatia.
- [ ] Zobraziť podujatia na webe.
- [ ] Vytvoriť administráciu podujatí.
- [ ] Preskúmať možnosti integrácie s Google Kalendárom.
- [ ] Rozhodnúť, či budeme udalosti iba zobrazovať alebo aj zapisovať.
- [ ] Bezpečne nastaviť potrebné prístupy a API údaje.
- [ ] Otestovať synchronizáciu.

### Fáza 9 — Testovanie, bezpečnosť a nasadenie

- [ ] Pochopiť základy Laravel testov.
- [ ] Otestovať dôležité routes.
- [ ] Otestovať validáciu formulárov.
- [ ] Otestovať oprávnenia.
- [ ] Skontrolovať bezpečnosť konfigurácie.
- [ ] Pripraviť produkčné prostredie.
- [ ] Nastaviť databázu a zálohovanie.
- [ ] Nasadiť aplikáciu.
- [ ] Otestovať produkčný web po nasadení.

---

## 7. Záznam z učenia

### Posledná dokončená téma

Prepojenie databázy SQLite s domovskou stránkou pomocou modelu `Service` a Eloquentu.

Naučili sme sa, že controller načíta údaje z databázy a pošle ich do Blade view, ktoré ich zobrazí.

### Kde pokračovať nabudúce

**Začať fázou 1 — Eloquent objekty a kolekcie.**

Prvá úloha:

1. Otvoriť Laravel Tinker.
2. Načítať existujúcu službu z databázy.
3. Vysvetliť si, čo obsahuje objekt.
4. Prečítať jeho vlastnosti.
5. Neskôr skúsiť zmeniť a uložiť jednu vlastnosť.

Nebudeme hneď vytvárať ďalšiu testovaciu službu, aby sme si zbytočne neduplikovali údaje.

### Pracovný štýl

Vždy jedna malá úloha. Po dokončení počkať na moje potvrdenie. Breeze a Filament zostávajú v pláne a pred inštaláciou overíme ich kompatibilitu s našou verziou Laravelu.
