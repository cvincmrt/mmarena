
# Laravel Learning Plan – MMArena.sk

**Aktualizované:** 19. 10. 2026

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

Laravel server:

```bash
cmd.exe //c "cd /d C:\ProjectLaravel\mmarena && php artisan serve"
```

Tinker:

```bash
cmd.exe //c "cd /d C:\ProjectLaravel\mmarena && php artisan tinker"
```

Vite:

```bash
npm run dev
```

Artisan:

```bash
php artisan list
```

Ak Git Bash nenájde PHP, použiť uvedený zápis cez cmd.exe.

## 3. Doteraz zvládnuté témy

### 3.1 Základy projektu

- [x] Vytvorenie Laravel projektu
- [x] Konfigurácia .env
- [x] Aplikačný kľúč
- [x] SQLite databáza
- [x] Spustenie migrácií
- [x] Composer a npm
- [x] Vite a Tailwind CSS 4
- [x] Spustenie lokálnej stránky

### 3.2 Git a GitHub

- [x] Základy Git
- [x] Súkromný GitHub repozitár
- [x] Pracovná vetva main

Pred väčšími zmenami vytvárať Git commit.

### 3.3 Routes a controllery

- [x] Základné routes
- [x] Named routes
- [x] HomeController
- [x] Metódy index() a contact()
- [x] Prepojenie route a controllera
- [x] Odovzdávanie údajov do Blade
- [x] GET a POST routes
- [x] ServiceController a metóda store()

Používané routes:

```php
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

Route::view('/services/create', 'services.create')
    ->name('services.create');

Route::post('/services', [ServiceController::class, 'store'])
    ->middleware('local.only')
    ->name('services.store');
```

V routes/web.php sú potrebné importy Route, HomeController a ServiceController.

### 3.4 Blade a layout

- [x] Blade šablóny
- [x] Spoločný layout layouts/app.blade.php
- [x] @extends, @section, @yield
- [x] @forelse, @empty, @foreach
- [x] @if, @else, @endif
- [x] Escapovanie cez dvojité zložené zátvorky
- [x] Práca s opisom pomocou ??
- [x] Formátovanie cien cez number_format()
- [x] Zobrazovanie prázdneho zoznamu
- [x] Vytvorenie vlastného Blade komponentu
- [x] Odovzdávanie parametrov do komponentu

Bezpečný výpis:

```blade
{{ $sluzba->name }}
```

Formátovanie ceny:

```blade
{{ number_format($sluzba->price, 2, ',', ' ') }} €
```

Náhradný opis:

```blade
{{ $sluzba->description ?? 'Opis nie je dostupný.' }}
```

### 3.5 Blade komponenty

- [x] Vytvorený priečinok resources/views/components
- [x] Vytvorený service-card.blade.php
- [x] Použitie @props(['sluzba'])
- [x] Presunutie HTML karty do komponentu
- [x] Zachovanie Tailwind CSS štýlov
- [x] Prepojenie s home.blade.php

Použitie:

```blade
@forelse ($sluzby as $sluzba)
    <x-service-card :sluzba="$sluzba" />
@empty
    <p>Momentálne nemáme žiadne služby.</p>
@endforelse
```

Dvojbodka pred sluzba znamená odovzdanie PHP výrazu.

### 3.6 Tailwind CSS a Vite

- [x] Tailwind CSS 4
- [x] Načítanie cez @vite
- [x] Responzívny grid
- [x] Štýlovanie kariet
- [x] Spoločná navigácia

### 3.7 Model Service a databáza

- [x] Model Service
- [x] Migrácia services
- [x] Eloquent ORM
- [x] Mass assignment
- [x] $fillable
- [x] Overenie štruktúry SQLite

Stĺpce:

| Stĺpec | Význam |
|---|---|
| id | Primárny kľúč |
| name | Povinný názov |
| description | Voliteľný opis |
| price | Cena služby |
| is_active | Aktívny stav |
| created_at | Dátum vytvorenia |
| updated_at | Dátum aktualizácie |

Model Service:

```php
protected $fillable = [
    'name',
    'description',
    'price',
    'is_active',
];
```

### 3.8 Eloquent v Tinkeri

- [x] Service::all()
- [x] where()->get()
- [x] first()
- [x] count()
- [x] find()
- [x] findOrFail()
- [x] isDirty() a getDirty()
- [x] refresh()
- [x] new Service()
- [x] save()
- [x] create()
- [x] update a delete
- [x] pluck()
- [x] orderBy()
- [x] orderByDesc()
- [x] limit()
- [x] Výber konkrétnych stĺpcov

Dotaz na úvodnej stránke:

```php
Service::where('is_active', true)
    ->orderBy('price')
    ->limit(3)
    ->get();
```

Zobrazuje najviac tri najlacnejšie aktívne služby.

### 3.9 Testovacie služby

Počas učenia boli používané:

- Verejné korčuľovanie – test
- Prenájom korčúľ – test
- Brúsenie korčúľ – test
- Individuálny tréning – test
- Laravel test – formulár
- Test Flash správy

Pred produkciou skontrolovať a odstrániť nepotrebné testovacie dáta.

### 3.10 Formulár na vytvorenie služby

- [x] GET /services/create
- [x] resources/views/services/create.blade.php
- [x] Polia name, description, price
- [x] POST metóda
- [x] @csrf
- [x] POST /services
- [x] ServiceController::store()
- [x] Validácia vstupov
- [x] Chybové správy @error
- [x] Zachovanie údajov cez old()
- [x] Odoslanie formulára
- [x] Testovanie pomocou dd()
- [x] Skutočné uloženie do SQLite

Validácia:

```php
$validated = $request->validate([
    'name' => 'required|string|max:255',
    'description' => 'nullable|string',
    'price' => 'required|numeric|min:0',
]);
```

Pravidlá:

- required – povinná hodnota
- string – text
- max:255 – najviac 255 znakov
- nullable – povolená prázdna hodnota
- numeric – číselná hodnota
- min:0 – minimálna hodnota 0

### 3.11 Zachovanie údajov a chyby

- [x] old('name')
- [x] old('description')
- [x] old('price')
- [x] @error('name')
- [x] @error('description')
- [x] @error('price')

Príklad:

```blade
@error('name')
    <p class="mt-1 text-sm text-red-600">
        {{ $message }}
    </p>
@enderror
```

### 3.12 Overenie SQLite

Použitý príkaz:

```php
DB::select('PRAGMA table_info(services)');
```

Potvrdené nastavenie stĺpca is_active:

```text
name: is_active
type: tinyint(1)
notnull: 1
dflt_value: "'1'"
```

Znamená to, že databáza automaticky nastaví novú službu ako aktívnu, pokiaľ nezadáme inú hodnotu.

Netreba duplicitu:

```php
$validated['is_active'] = true;
```

Rozdiel:

- notnull = 1: hodnota nesmie byť NULL
- notnull = 0: hodnota môže byť NULL
- dflt_value: predvolená databázová hodnota

### 3.13 Middleware LocalOnly

- [x] Vytvorený app/Http/Middleware/LocalOnly.php
- [x] Kontrola prostredia local
- [x] Použitie abort(403)
- [x] Registrácia aliasu local.only
- [x] Pripojenie middleware k POST route
- [x] Kontrola route:list -v

Middleware:

```php
public function handle(Request $request, Closure $next): Response
{
    if (!app()->environment('local')) {
        abort(403);
    }

    return $next($request);
}
```

Registrácia v bootstrap/app.php:

```php
$middleware->alias([
    'local.only' => \App\Http\Middleware\LocalOnly::class,
]);
```

DÔLEŽITÉ: LocalOnly nie je autentifikácia ani autorizácia. Neoveruje identitu používateľa alebo pôvod jeho požiadavky. Pred verejným nasadením treba použiť riadne prihlásenie a kontrolu oprávnení.

Vývojový server ponechať na 127.0.0.1.

### 3.14 Ukladanie cez ServiceController

Aktuálna metóda store():

```php
public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric|min:0',
    ]);

    Service::create($validated);

    return redirect()
        ->route('home')
        ->with('success', 'Služba bola úspešne vytvorená!');
}
```

- [x] Import modelu Service
- [x] Validácia
- [x] Service::create($validated)
- [x] Presmerovanie na home
- [x] Flash správa

### 3.15 Flash správy

- [x] Použitie ->with('success', ...)
- [x] Zobrazenie session('success') v home.blade.php
- [x] Zelená úspešná správa
- [x] Overené zmiznutie správy po F5

Blade:

```blade
@if (session('success'))
    <div class="mb-6 rounded-lg border border-green-200 bg-green-50 p-4 text-green-800">
        {{ session('success') }}
    </div>
@endif
```

Používateľ potvrdil, že celý proces funguje správne.

### 3.16 Automatizované testy

- [ ] Vytvoriť tests/Feature/ServiceTest.php
- [ ] Nastaviť izolovanú testovaciu databázu
- [ ] Oboznámiť sa s RefreshDatabase
- [ ] Naučiť sa assertStatus()
- [ ] Naučiť sa assertSessionHasErrors()
- [ ] Naučiť sa assertDatabaseHas()
- [ ] Testovať úspešné uloženie
- [ ] Testovať neplatné údaje
- [ ] Testovať prístupové obmedzenia

## 4. Aktuálny stav učenia – 19. 10. 2026

**Posledná dokončená úloha:**
Ukladanie služby cez formulár a zobrazenie Flash správy po presmerovaní.

Používateľ potvrdil, že všetko funguje, vrátane zmiznutia Flash správy po F5.

**Aktuálna téma:**
Lekcia 9 – Automatizované testovanie Laravel aplikácie.

**Najbližšia úloha:**
Vytvoriť tests/Feature/ServiceTest.php.

Príkaz:

```bash
php artisan make:test ServiceTest
```

Tento krok bol už vysvetlený, ale jeho vykonanie zatiaľ nie je potvrdené.

Pred spúšťaním databázových testov je potrebné overiť izolovanú testovaciu databázu, aby neboli ohrozené existujúce údaje.

## 5. Ďalší plán učenia

### Fáza 1 – Základy Eloquent a Blade

- [x] Bezpečné vypisovanie
- [x] Formátovanie cien
- [x] Opis a NULL
- [x] Podmienky Blade
- [x] Blade komponenty
- [x] Validácia
- [x] Prázdny zoznam

### Fáza 2 – CRUD pre služby

- [ ] Zoznam služieb
- [ ] Detail služby
- [x] Vytvorenie formulára
- [x] Ukladanie cez store()
- [x] Validácia
- [ ] Edit a update
- [ ] Delete a destroy
- [x] CSRF
- [x] Flash správy
- [ ] Potvrdzovanie mazania
- [ ] Automatizované CRUD testy

### Fáza 3 – Autentifikácia

- [ ] Overenie kompatibilného starter kitu s Laravelom 13
- [ ] Inštalácia autentifikácie
- [ ] Registrácia a prihlasovanie
- [ ] Odhlásenie
- [ ] Reset hesla
- [ ] Middleware auth
- [ ] Autorizácia
- [ ] Chránené administračné stránky

### Fáza 4 – Filament administrácia

- [ ] Overenie kompatibility
- [ ] Inštalácia
- [ ] Administrátorský účet
- [ ] Service Resource
- [ ] Formuláre a tabuľky
- [ ] Vyhľadávanie a filtre
- [ ] Prístupové práva

### Fáza 5 – Obsah MMArena.sk

- [ ] Finálna úvodná stránka
- [ ] Služby a cenník
- [ ] Detaily služieb
- [ ] Kontakt
- [ ] Otváracie hodiny
- [ ] Informácie o štadióne
- [ ] Aktuality
- [ ] Mobilný dizajn
- [ ] SEO
- [ ] Prístupnosť
- [ ] Optimalizácia obrázkov

### Fáza 6 – Pokročilé funkcie

- [ ] Migrácie a rollback
- [ ] Seedery a factory
- [ ] Vzťahy modelov
- [ ] Stránkovanie
- [ ] Vyhľadávanie
- [ ] Nahrávanie obrázkov
- [ ] Správa súborov
- [ ] Automatizované testy
- [ ] Logovanie chýb
- [ ] Bezpečnosť

### Fáza 7 – Nasadenie

- [ ] Hosting
- [ ] Produkčná databáza
- [ ] Produkčné .env
- [ ] HTTPS
- [ ] Produkčné migrácie
- [ ] Build assetov
- [ ] Zálohy
- [ ] Kontrola logov
- [ ] Správa tajných údajov

## 6. Pravidlá nášho učenia

1. Postupujeme po malých krokoch.
2. Kód vysvetľujeme pred použitím.
3. Po každej úlohe čakáme na potvrdenie „hotovo“.
4. Nemeníme veľa súborov naraz.
5. Chyby najskôr pochopíme, potom opravujeme.
6. Funkčné časti zbytočne neprepisujeme.
7. Testovacie dáta označujeme.
8. Overujeme kompatibilitu balíkov s Laravelom 13.
9. Pravidelne používame Git.
10. Cieľom je rozumieť riešeniu, nie kopírovať príkazy.

## 7. Užitočné Eloquent príklady

```php
Service::all();

Service::where('is_active', true)->get();

Service::where('is_active', true)
    ->orderBy('price')
    ->get();

Service::where('is_active', true)
    ->orderBy('price')
    ->limit(3)
    ->get();

Service::where('is_active', true)->pluck('name');

Service::where('is_active', true)->count();

Service::find(1);

Service::findOrFail(1);
```

## 8. Bezpečnostné pravidlá

- Neukladať heslá a tajné kľúče do repozitára.
- .env musí zostať mimo verzovania.
- Validovať vstupy.
- Escapovať nedôveryhodné výstupy.
- Chrániť administráciu autentifikáciou a autorizáciou.
- Nepovažovať LocalOnly za produkčné zabezpečenie.
- Testovať na izolovanej databáze.
- Pred produkciou odstrániť testovacie údaje.
- Pred rizikovými zmenami vytvoriť zálohu alebo commit.

---

## 9. Bod pokračovania

**AKTUÁLNE: LEKCIA 9 – AUTOMATIZOVANÉ TESTOVANIE**

Najbližšie:

1. Vytvoriť súbor tests/Feature/ServiceTest.php.
2. Overiť oddelenú testovaciu databázu.
3. Vysvetliť prvý Feature test.
4. Otestovať GET formulár.
5. Otestovať validáciu a uloženie služby.

Pokračovať po jednom kroku a čakať na potvrdenie „hotovo“.
