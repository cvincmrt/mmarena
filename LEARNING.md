# Laravel Learning Plan – MMArena.sk

## 1. Cieľ projektu

Postupne vytvoriť webovú stránku pre MMArena.sk pomocou:

- Laravel – backend a aplikačná logika
- PHP – programovací jazyk
- SQLite / neskôr MySQL – databáza
- Blade – šablóny stránok
- Tailwind CSS – vzhľad a responzívny dizajn
- Laravel Breeze alebo vhodná alternatíva – autentifikácia
- Filament – administrácia

Cieľom nie je iba skopírovať kód. Dôležité je pochopiť, čo jednotlivé časti robia, vedieť ich upravovať a postupne si vytvoriť vlastný projekt.

## 2. Prostredie projektu

- Projekt: `mmarena`
- Priečinok: `C:\ProjectLaravel\mmarena`
- GitHub: https://github.com/cvincmrt/mmarena
- Laravel: 13.37.0
- PHP: 8.4.25
- Databáza: SQLite
- Frontend: Blade, Tailwind CSS 4 a Vite
- Vetva Git: `main`
- Lokálna adresa: http://127.0.0.1:8000

### Užitočné príkazy

Spustenie Laravel servera v Git Bash:

```bash
cmd.exe //c "cd /d C:\ProjectLaravel\mmarena && php artisan serve"
```

Spustenie Tinkeru:

```bash
cmd.exe //c "cd /d C:\ProjectLaravel\mmarena && php artisan tinker"
```

Spustenie Vite vývojového servera v samostatnom termináli:

```bash
npm run dev
```

Zobrazenie dostupných Artisan príkazov:

```bash
php artisan list
```

Ak sa príkaz `php` v Git Bash nenájde, použi uvedený zápis cez `cmd.exe`.

## 3. Doteraz zvládnuté témy

### 3.1 Základy projektu

- [x] Vytvorenie Laravel projektu
- [x] Konfigurácia `.env`
- [x] Aplikačný kľúč
- [x] Pripojenie SQLite databázy
- [x] Spustenie migrácií
- [x] Composer a npm
- [x] Vite a Tailwind CSS 4
- [x] Spustenie lokálnej stránky

### 3.2 Git a GitHub

- [x] Základy práce s Git
- [x] Projekt v súkromnom GitHub repozitári
- [x] Pracovná vetva `main`

Pred väčšou zmenou je vhodné uložiť funkčný stav pomocou commitu.

### 3.3 Routes a controllery

- [x] Základné Laravel routes
- [x] Named routes
- [x] `HomeController`
- [x] Metódy `index()` a `contact()`
- [x] Prepojenie route s controllerom
- [x] Odovzdávanie údajov z controllera do Blade

Aktuálne routes v `routes/web.php`:

```php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
```

### 3.4 Blade a spoločný layout

- [x] Blade šablóny
- [x] Spoločný layout `layouts/app.blade.php`
- [x] `@extends`, `@section` a `@yield`
- [x] `@forelse`, `@empty` a `@foreach`
- [x] Podmienky v Blade
- [x] Vypisovanie údajov z databázy
- [x] Základné escapovanie výstupu pomocou `{{ }}`

Dôležité pravidlo:

```blade
{{ $sluzba->name }}
```

Tento zápis escapuje HTML špeciálne znaky. Pri nedôveryhodných údajoch sa vyhýbame zápisu `{!! !!}`, pretože môže umožniť XSS útok.

### 3.5 Tailwind CSS a Vite

- [x] Tailwind CSS 4
- [x] Načítanie CSS a JavaScriptu cez `@vite`
- [x] Responzívny grid
- [x] Základné štýlovanie kariet služieb
- [x] Spoločná navigácia

### 3.6 Modely a migrácie

- [x] Vytvorenie modelu `Service`
- [x] Vytvorenie migrácie
- [x] Práca s tabuľkou `services`
- [x] Použitie Eloquent ORM
- [x] Práca s `$fillable`

Aktuálna štruktúra tabuľky `services`:

| Stĺpec | Typ / význam |
|---|---|
| `id` | Primárny kľúč |
| `name` | Názov služby |
| `description` | Voliteľný opis |
| `price` | Cena typu decimal |
| `is_active` | Aktívna alebo neaktívna služba |
| `created_at` | Čas vytvorenia |
| `updated_at` | Čas poslednej zmeny |

Model `app/Models/Service.php` má povolené polia:

```php
protected $fillable = [
    'name',
    'description',
    'price',
    'is_active',
];
```

### 3.7 Eloquent v Tinker-i

- [x] `Service::all()`
- [x] `Service::where(...)->get()`
- [x] `first()`
- [x] `count()`
- [x] `find($id)`
- [x] `findOrFail($id)`
- [x] Čítanie atribútov modelu
- [x] `isDirty()` a `getDirty()`
- [x] `refresh()`
- [x] Vytvorenie modelu pomocou `new Service()`
- [x] Uloženie cez `save()`
- [x] Vytvorenie cez `create()`
- [x] Úprava existujúceho záznamu
- [x] Mazanie cez `delete()`
- [x] Rozdiel medzi `true`, `'true'`, `1` a `'1'`
- [x] Filtrovanie aktívnych služieb
- [x] Výber stĺpcov pomocou `get(['name', 'price'])`
- [x] Výber hodnôt pomocou `pluck('name')`
- [x] Zoradenie pomocou `orderBy()` a `orderByDesc()`
- [x] Obmedzenie počtu výsledkov pomocou `limit()`

Príklad:

```php
Service::where('is_active', true)
    ->orderBy('price')
    ->limit(3)
    ->get();
```

Tento dotaz vyberie najviac tri aktívne služby a zoradí ich podľa ceny vzostupne.

### 3.8 Aktuálny controller

V `HomeController` sa aktívne služby načítavajú takto:

```php
$sluzby = Service::where('is_active', true)
    ->orderBy('price')
    ->limit(3)
    ->get();
```

Úvodná stránka tieto údaje zobrazuje pomocou Blade šablóny `resources/views/home.blade.php`.

### 3.9 Testovacie dáta

Počas učenia sme pridali testovacie služby:

- Verejné korčuľovanie – test
- Prenájom korčúľ – test
- Brúsenie korčúľ – test
- Individuálny tréning – test

Pôvodná služba zostala v databáze.

Testovacie údaje sú určené na učenie. Pred nasadením projektu treba rozhodnúť, ktoré služby majú zostať a ktoré sa majú odstrániť.

## 4. Aktuálny stav učenia

**Posledná dokončená úloha:** Overenie, že úvodná stránka zobrazuje najviac tri aktívne služby zoradené podľa ceny.

**Aktuálna téma:** Bezpečné zobrazovanie údajov v Blade šablóne.

Najbližšia úloha:

1. Otvoriť `resources/views/home.blade.php`.
2. Nájsť `{{ $sluzba->name }}`.
3. Pochopiť rozdiel medzi escapovaným výstupom `{{ }}` a neescapovaným `{!! !!}`.
4. Overiť, ako sa zobrazuje cena a opis služby.

## 5. Ďalší plán učenia

### Fáza 1 – Dokončenie základov Eloquent a Blade

- [ ] Bezpečné vypisovanie údajov
- [ ] Formátovanie cien na dve desatinné miesta
- [ ] Práca s opisom služby
- [ ] Podmienky pre aktívne a neaktívne služby
- [ ] Rozdelenie dlhšieho Blade kódu do komponentov
- [ ] Základná validácia údajov
- [ ] Správne zobrazovanie prázdneho zoznamu

### Fáza 2 – CRUD pre služby

CRUD znamená Create, Read, Update, Delete.

- [ ] Route pre zoznam služieb
- [ ] Route pre detail služby
- [ ] Formulár na vytvorenie služby
- [ ] Ukladanie pomocou `store()`
- [ ] Validácia cez `$request->validate()`
- [ ] Úprava služby cez `edit()` a `update()`
- [ ] Mazanie cez `destroy()`
- [ ] Ochrana formulárov pomocou CSRF
- [ ] Flash správy po úspešnej akcii
- [ ] Potvrdzovanie mazania
- [ ] Základné testovanie CRUD

### Fáza 3 – Autentifikácia a používateľské účty

- [ ] Overiť kompatibilitu Laravel Breeze alebo vhodného starter kitu s používanou verziou Laravelu
- [ ] Inštalovať podporované riešenie autentifikácie
- [ ] Registrácia a prihlasovanie
- [ ] Odhlásenie
- [ ] Reset hesla
- [ ] Middleware `auth`
- [ ] Rozlíšenie verejných a chránených stránok
- [ ] Autorizácia operácií používateľa

**Poznámka:** Autentifikácia zatiaľ nie je nainštalovaná ani dokončená.

### Fáza 4 – Administrácia cez Filament

- [ ] Overiť kompatibilitu Filamentu s verziou Laravelu
- [ ] Nainštalovať kompatibilnú verziu
- [ ] Vytvoriť administrátorský účet
- [ ] Resource pre `Service`
- [ ] Formuláre na správu služieb
- [ ] Tabuľka služieb s vyhľadávaním
- [ ] Filtre podľa aktívneho stavu
- [ ] Prístupové práva
- [ ] Oddelenie administrácie od verejného webu

### Fáza 5 – Obsah webu MMArena.sk

- [ ] Úvodná stránka
- [ ] Prehľad služieb a cenník
- [ ] Detail jednotlivých služieb
- [ ] Kontakt a otváracie hodiny
- [ ] Informácie o zimnom štadióne
- [ ] Aktuality
- [ ] Responzívny dizajn pre mobilné zariadenia
- [ ] SEO základy
- [ ] Prístupnosť
- [ ] Optimalizácia obrázkov

### Fáza 6 – Databáza a pokročilejšie funkcie

- [ ] Migrácie a rollback
- [ ] Seedery a factory
- [ ] Vzťahy medzi modelmi
- [ ] Stránkovanie
- [ ] Vyhľadávanie a filtre
- [ ] Nahrávanie obrázkov
- [ ] Správa súborov
- [ ] Automatizované testy
- [ ] Logovanie chýb
- [ ] Bezpečnostné základy

### Fáza 7 – Nasadenie

- [ ] Výber hostingu
- [ ] Produkčná databáza
- [ ] Nastavenie produkčného `.env`
- [ ] HTTPS
- [ ] Migrácie v produkcii
- [ ] Build frontendových assetov
- [ ] Zálohovanie databázy
- [ ] Kontrola logov a chýb
- [ ] Bezpečné spravovanie tajných údajov

## 6. Pravidlá nášho učenia

1. Postupujeme po malých krokoch.
2. Vysvetľujeme kód skôr, než ho začneme používať.
3. Po každej úlohe čakáme na potvrdenie „hotovo“.
4. Nemeníme veľa súborov naraz.
5. Keď sa objaví chyba, najprv ju pochopíme a až potom opravíme.
6. Existujúce funkčné časti projektu zbytočne neprepisujeme.
7. Testovacie údaje označujeme a pred produkciou ich skontrolujeme.
8. Pri nových balíkoch overujeme kompatibilitu s Laravelom 13.
9. Zmeny pravidelne ukladáme do Gitu.
10. Cieľom je porozumieť riešeniu, nie iba kopírovať príkazy.

## 7. Užitočné Eloquent príklady

```php
// Všetky služby
Service::all();

// Aktívne služby
Service::where('is_active', true)->get();

// Aktívne služby od najlacnejšej
Service::where('is_active', true)
    ->orderBy('price')
    ->get();

// Najviac tri aktívne služby
Service::where('is_active', true)
    ->orderBy('price')
    ->limit(3)
    ->get();

// Iba názvy služieb
Service::where('is_active', true)->pluck('name');

// Počet aktívnych služieb
Service::where('is_active', true)->count();

// Vyhľadanie podľa ID
Service::find(1);

// Vyhľadanie s výnimkou, ak záznam neexistuje
Service::findOrFail(1);
```

## 8. Poznámky k bezpečnosti

- Do verejného repozitára nikdy neukladať produkčné heslá ani tajné kľúče.
- `.env` musí zostať mimo verzovania.
- Používať validáciu vstupov.
- Pri vypisovaní používateľských údajov používať escapovaný Blade výstup.
- Chrániť administračné operácie autentifikáciou a autorizáciou.
- Pred nasadením odstrániť nepotrebné testovacie dáta.
- Pred rizikovými zmenami vytvoriť zálohu alebo Git commit.

---

**Aktuálny ďalší krok:** Pokračovať v `resources/views/home.blade.php` a pochopiť bezpečné vypisovanie údajov pomocou `{{ }}`.
