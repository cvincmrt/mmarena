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

Úvodná stránka tieto úd
