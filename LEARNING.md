# Laravel Learning Plan – MMArena.sk

> **Aktualizované:** 19. 10. 2026  
> **Stav:** Lekcia 10 (CRUD, zmena stavu, základné testy) dokončená. Nasleduje Lekcia 11 – rozšírenie obsahu služieb.  
> **Pravidlo:** pokračovať po jednom kroku; nevykonávať opakovane už hotové úlohy.

## 1. Cieľ projektu

Postupne vytvoriť skutočnú webovú stránku **MMArena.sk** a popritom sa naučiť PHP a Laravel. Používané technológie:

- Laravel – backend, routovanie, validácia a aplikačná logika
- PHP – jazyk a objektovo orientované programovanie
- SQLite – lokálna databáza; možný neskorší prechod na MySQL
- Eloquent ORM – práca s databázou
- Blade – šablóny a komponenty
- Tailwind CSS 4 – štýlovanie a responzívne rozloženie
- Vite – frontendové assety
- Pest – automatizované testy
- Autentifikácia (vhodný podporovaný starter kit) a prípadne Filament – **plánované, nie hotové**

**Cieľ učenia:** rozumieť každému pridanému riadku, skúšať vlastné riešenia, pochopiť chyby, nie len kopírovať kód.

## 2. Prostredie projektu

- Projekt: `mmarena`
- Lokálny priečinok (Windows): `C:\ProjectLaravel\mmarena`
- GitHub (súkromný repozitár): https://github.com/cvincmrt/mmarena
- Vetva: `main`
- Laravel: 13.37.0 (podľa doterajších údajov)
- PHP: 8.4.25 (podľa doterajších údajov)
- Databáza: SQLite
- Frontend: Blade + Tailwind CSS 4 + Vite
- Lokálny server: http://127.0.0.1:8000
- Editor: VS Code; terminál: Git Bash / Windows

### Užitočné príkazy

```bash
# Laravel server (ak PHP funguje v PATH)
php artisan serve

# Vite (v samostatnom termináli)
npm run dev

# Pest / Laravel testy
php artisan test --filter=ServiceTest

# Kontrola routes
php artisan route:list --path=services -v

# Tinker
php artisan tinker

# Nová migrácia – náš NÁSLEDUJÚCI plánovaný krok
php artisan make:migration add_media_and_content_to_services_table --table=services
```

Keď Git Bash nevie nájsť `php`, používali sme aj spúšťanie cez Windows `cmd.exe`, napríklad:

```bash
cmd.exe //c "cd /d C:\ProjectLaravel\mmarena && php artisan serve"
```

## 3. Doteraz zvládnuté témy

### 3.1 Základy projektu

- [x] Vytvorenie Laravel projektu a `.env`
- [x] Aplikačný kľúč, Composer, npm
- [x] SQLite, migrácie a pripojenie k databáze
- [x] Blade, Vite a Tailwind CSS 4
- [x] Lokálne spúšťanie webu

### 3.2 Git a GitHub

- [x] Základné používanie Gitu
- [x] Súkromný repozitár
- [x] Vetva `main`
- [ ] Potvrdiť nový commit po dokončenom CRUD (v konverzácii nepotvrdený)

Pred väčšou zmenou vytvoriť Git commit alebo zálohu databázy.

### 3.3 Routes a controllery

- [x] `Route::get()`, `post()`, `patch()`, `delete()`
- [x] Pomenované routes a `route('name')`
- [x] Parametre `{service}`
- [x] Route Model Binding: `Service $service` a automatické 404 pri neexistujúcej službe
- [x] Rozlíšenie `GET`, `POST`, `PUT`, `PATCH`, `DELETE`
- [x] `@method('PATCH')`, `@method('DELETE')`; význam `@method('PUT')`
- [x] `HomeController`, `ServiceController`
- [x] `compact('service')`, `compact('services')` a pomenovanie premenných v Blade
- [x] Rozpoznanie konfliktu dvoch PATCH routes na rovnakej URL

**Dohodnutá štruktúra URL / názvov routes** (podľa poslednej konverzácie):

| Metóda | URL | Názov | Účel |
|---|---|---|---|
| GET | `/` | `home` | Domovská stránka |
| GET | `/contact` | `contact` | Kontakt |
| GET | `/services/create` | `services.create` | Pôvodný vývojový formulár CREATE |
| POST | `/services` | `services.store` | Uloženie novej služby; `local.only` |
| GET | `/services/{service}` | `services.show` | Verejný detail služby |
| GET | `/admin/services` | `admin.services.index` | Administračný zoznam; `local.only` |
| GET | `/admin/services/{service}/edit` | `admin.services.edit` | Formulár EDIT; `local.only` |
| PATCH | `/admin/services/{service}` | `admin.services.update` | UPDATE; `local.only` |
| DELETE | `/admin/services/{service}` | `admin.services.destroy` | DELETE; `local.only` |
| PATCH | `/admin/services/{service}/status` | `admin.services.changeStatus` | Aktivácia/deaktivácia; `local.only` |

**Pozor:** názvy a metódy sú zachytené podľa krokov potvrdených v rozhovore; skutočný aktuálny súbor `routes/web.php` nebol po dokončení celý skopírovaný. Pri nejasnostiach overiť `php artisan route:list`.

### 3.4 Blade, komponenty a layout

- [x] `@extends`, `@section`, `@yield` – základy layoutu
- [x] `@forelse`, `@empty`, `@foreach`, `@if`, `@error`
- [x] Bezpečné vypisovanie pomocou `{{ }}`; pri nedôveryhodných údajoch sa vyhnúť `{!! !!}`
- [x] `??`, ternárny operátor `? :`, `old()`
- [x] Formátovanie ceny: `number_format($service->price, 2, ',', ' ')`
- [x] Blade komponent `resources/views/components/service-card.blade.php`
- [x] V HOME sa používa `<x-service-card :sluzba="$sluzba" />`
- [x] Celá karta je klikateľným `<a href="{{ route('services.show', $sluzba) }}">`
- [x] Základná detailová stránka služby: `resources/views/services/show.blade.php`
- [x] Flash správy a validačné chyby v Blade

### 3.5 Tailwind, HOME a karty

- [x] HOME používa `Service::where('is_active', true)->orderBy('price')->limit(5)->get()`
- [x] Počet aktívnych zobrazovaných služieb zvýšený z 3 na **5**
- [x] Základná responzivita kariet skúšaná pomocou Grid a Flexbox
- [ ] **Finálne responzívne rozloženie nie je vizuálne uzavreté.** Pri troch kartách v prvom riadku zostávali dve nevyužívajúce celú šírku; skúšalo sa riešenie pomocou `flex flex-wrap`, ale finálne PASS nebolo potvrdené a používateľ dizajn nateraz odložil.

**Zamýšľané rozloženie:** desktop 5 kariet v riadku; tablet 3 + 2 s roztiahnutím spodných dvoch; mobil 2 na riadok, na úzkom mobile 1. Pred ďalšou zmenou skontrolovať aktuálnu triedu rodičovského elementu v `home.blade.php`.

### 3.6 Model `Service` a databáza

- [x] Model `app/Models/Service.php` a migrácia pôvodnej tabuľky
- [x] `fillable`: `name`, `description`, `price`, `is_active`
- [x] Polia tabuľky: `id`, `name`, `description`, `price`, `is_active`, `created_at`, `updated_at`
- [x] `description` je voliteľný text
- [x] `is_active` má v lokálnej SQLite databáze predvolenú hodnotu `1` (overené cez `PRAGMA table_info(services)`)
- [x] Teda pri `Service::create($validated)` netreba znovu nastavovať `is_active = true`
- [ ] Polia `image`, `icon`, `content` **zatiaľ nie sú pridané**

### 3.7 Eloquent a PHP

- [x] `Service::all()`, `where()`, `get()`, `first()`, `find()`, `findOrFail()`
- [x] `orderBy()`, `orderByDesc()`, `limit()`, `count()`, `pluck()`
- [x] `new Service()`, `create()`, `save()`, `update()`, `delete()`, `refresh()`
- [x] `$fillable` a hromadné priraďovanie
- [x] Rozdiel medzi poľom `$sluzba['price']` a objektom `$sluzba->price`
- [x] Indexované a asociatívne polia; `=>`
- [x] Vnorené polia pri Pest datasetoch a rozdiel medzi počtom prípadov a argumentmi funkcie
- [x] Logické hodnoty, `if/else`, ternárny operátor, logická negácia `!`

### 3.8 CREATE – vytvorenie služby

- [x] Formulár `resources/views/services/create.blade.php`
- [x] POST route `/services` s `local.only`
- [x] Validácia `name: required|string|max:255`; `description: nullable|string`; `price: required|numeric|min:0`
- [x] `Service::create($validated)`
- [x] `@csrf`, `old()`, `@error` pri poliach
- [x] Presmerovanie na HOME a Flash správa
- [x] Ručný test vytvorenia služby

```php
public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric|min:0',
    ]);

    Service::create($validated);

    return redirect()->route('home')
        ->with('success', 'Služba bola úspešne vytvorená!');
}
```

### 3.9 READ – HOME, verejný detail, admin zoznam

- [x] `HomeController@index`: päť najlacnejších aktívnych služieb
- [x] Verejná route `services.show`: `/services/{service}`
- [x] `ServiceController::show(Service $service)` vracia `view('services.show', compact('service'))`
- [x] Šablóna `resources/views/services/show.blade.php` zobrazuje názov, popis a cenu
- [x] Kliknutie na celú kartu na HOME otvorí jej vlastný detail – ručný test PASS
- [x] `ServiceController::adminIndex()` používa `Service::all()` (zobrazuje aktívne i neaktívne)
- [x] Admin zoznam v `resources/views/admin/services/index.blade.php` s cenou, stavom a akciami
- [x] Verejný zoznam `/services` bol zvážený, ale **zámerne sa zatiaľ nepridáva**: na HOME už zoznam existuje

### 3.10 UPDATE – úprava služby

- [x] Admin URL `/admin/services/{service}/edit`
- [x] `edit(Service $service)` vracia `view('admin.services.edit', compact('service'))`
- [x] Formulár `resources/views/admin/services/edit.blade.php`
- [x] Predvyplnené hodnoty `old('name', $service->name)`, analógia pre description/price
- [x] `@csrf` + `@method('PATCH')` a pomenovaná route `admin.services.update`
- [x] `update(Request $request, Service $service)` validuje name/description/price a používa `$service->update($validated)`
- [x] Po uložení redirect na `admin.services.index` a Flash správa
- [x] Flash správa sa v admin zozname zobrazí a po F5 zmizne (PASS)
- [x] `@error` pri name, description, price; validácia prázdneho názvu PASS
- [x] Automatický test UPDATE potvrdzuje zmenu existujúceho záznamu bez zvýšenia počtu riadkov

### 3.11 DELETE – odstránenie služby

- [x] DELETE route `admin.services.destroy`
- [x] `destroy(Service $service)` používa `$service->delete()` a Flash správu
- [x] V administrácii formulár `method="POST"`, `@csrf`, `@method('DELETE')`
- [x] `onsubmit="return confirm(...)"`: zrušenie zachová záznam, potvrdenie odstráni (ručne PASS)
- [x] Overenie zmiznutia zo zoznamu aj 404 po odstránení detailu
- [x] Pest test `assertDatabaseMissing` a `assertDatabaseCount('services', 0)` – PASS
- [ ] Zvážiť „soft deletes“ alebo deaktiváciu namiesto trvalého odstránenia v reálnej prevádzke

### 3.12 Aktivácia/deaktivácia `is_active` – vlastná implementácia

Používateľ samostatne navrhol controller, formulár aj route na prepínanie stavu služby. Funkcionalita funguje – **PASS**.

- [x] Metóda `ServiceController::changeStatus(Service $service)`
- [x] Pôvodné riešenie s `if/else` a `$service->save()` je správne
- [x] Kratšia alternatíva: `$service->is_active = !$service->is_active;`
- [x] PATCH route `/admin/services/{service}/status`, názov `admin.services.changeStatus`, s `local.only`
- [x] HTML formulár v admin zozname s `@csrf` a `@method('PATCH')`
- [x] Dynamický nápis tlačidla **Deaktivovať** (aktívna) / **Aktivovať** (neaktívna), odlišné farby – PASS
- [x] Po prepnutí redirect na admin zoznam a Flash správa
- [x] Neaktívna služba zmizne z HOME vďaka `where('is_active', true)`; na admin zozname zostane
- [x] Automatický Pest test dvojitého prepnutia `1 -> 0 -> 1` – PASS

Príklad stručnej implementácie:

```php
public function changeStatus(Service $service)
{
    $service->is_active = !$service->is_active;
    $service->save();

    return redirect()->route('admin.services.index')
        ->with('success', 'Stav služby bol úspešne zmenený.');
}
```

*Poznámka:* presné znenie Flash správy môže byť v lokálnom controlleri odlišné; používateľova pôvodná verzia mala text `Sluzba uspesne zmenila stav`.

### 3.13 Testovanie – Pest (Lekcia 9 + časť Lekcie 10)

- [x] Vytvorený `tests/Feature/ServiceTest.php`
- [x] Pest syntax `test('...', function () { ... });`
- [x] Testovacia SQLite databáza `:memory:` potvrdená v `phpunit.xml` a v teste cez `config(...)`
- [x] `uses(RefreshDatabase::class)` zabezpečuje izoláciu testovacích dát
- [x] `withoutMiddleware(\App\Http\Middleware\LocalOnly::class)` pre testy admin operácií v `APP_ENV=testing`
- [x] `assertStatus`, `assertSee`, `assertSessionHasErrors`, `assertDatabaseHas`, `assertDatabaseMissing`, `assertDatabaseCount`, `assertRedirect`, `assertSessionHas`
- [x] Test GET formulára, konfigurácie SQLite, požadovaných údajov a vytvorenia služby
- [x] Validácia záporných, textových, prázdnych cien; príliš dlhého (300 znakov) a hraničného (255 znakov) názvu
- [x] Pest datasety cez `->with()`; pomenované prípady `['zaporna cena' => [-10], ...]`
- [x] Tri duplicitné validačné testy nahradené datasetom
- [x] Test UPDATE (existujúci záznam sa aktualizuje)
- [x] Test DELETE (záznam zmizne)
- [x] Test prepnutia aktivity tam aj späť
- [x] **Posledný potvrdený výsledok: 12 úspešných testovacích prípadov (PASS)**

Príkaz:

```bash
php artisan test --filter=ServiceTest
```

Zámer učenia: základy Pest už stačia; **netreba znova prechádzať rozsiahlym testovaním**. Ďalšie testy pridávať účelne k novým dôležitým funkciám.

### 3.14 Middleware a dočasná bezpečnosť

- [x] `app/Http/Middleware/LocalOnly.php`: `if (!app()->environment('local')) abort(403);`
- [x] Alias `local.only` registrovaný v `bootstrap/app.php`
- [x] Middleware použitý pri zapisujúcich/administračných routes
- [ ] **Skutočné prihlasovanie a autorizácia administrátora nie sú hotové**

**Dôležité:** `local.only` nie je prihlasovanie, kontrola roly, ani kontrola IP adresy. Ak bude `APP_ENV=local` na verejne dostupnom serveri, samo osebe to administráciu nechráni. Pred publikovaním je nevyhnutné použiť `auth` a oprávnenia a bezpečne nastaviť produkčné prostredie. Verejný `show()` zatiaľ cez Route Model Binding môže zobraziť aj neaktívny záznam, ak niekto pozná ID; pred publikovaním treba určiť, či detail neaktívnej služby má byť nedostupný.

## 4. Aktuálny stav učenia – 19. 10. 2026

**Dokončené:** Základy Laravel + Eloquent + Blade; CREATE/READ/UPDATE/DELETE; detail služby; správa služieb na `/admin/services`; prepínanie `is_active`; Flash správy; validácie; 12 úspešných testovacích prípadov.

**Posledná potvrdená úloha:** Pest test prepnutia stavu služby v oboch smeroch – používateľ odpovedal `PASS`.

**Aktuálna téma:** **Lekcia 11 – obrázky, ikonky a obsah detailov služieb.**

**Nasledujúci krok, zatiaľ NEPOTVRDENÝ:** spustiť príkaz:

```bash
php artisan make:migration add_media_and_content_to_services_table --table=services
```

Tento príkaz iba vytvorí migračný súbor; **nenapĺňa databázu a nemá sa automaticky spúšťať `migrate` bez kontroly obsahu**. Používateľ zatiaľ nepotvrdil, že migráciu vytvoril.

**Ďalší postup:** po potvrdení `hotovo` vysvetliť `up()` a `down()`, bezpečne pridať nullable stĺpce `image`, `icon`, `content`, upraviť model `$fillable`, neskôr admin formuláre a Blade. Nerozbiehať znova CRUD ani Pest od začiatku.

## 5. Ďalší plán učenia

### Fáza 1 – Základy Eloquent a Blade

- [x] Modely, migrácie a databázové query
- [x] Bezpečný výstup, cykly, podmienky, komponenty
- [x] Formátovanie cien, náhradné texty, validácia
- [x] Práca s formulármi a stavom session

### Fáza 2 – CRUD pre služby

- [x] CREATE – formulár a uloženie
- [x] READ – HOME + detail služby + administračný zoznam
- [x] UPDATE – formulár a uloženie zmien
- [x] DELETE – potvrdenie a odstránenie
- [x] Flash správy + validačné chyby
- [x] Prepínanie `is_active` v admin zozname
- [x] Automatizované testy CRUD a prepínania stavu (12 PASS)

### Fáza 2B – Rozšírenie kariet a detailov (AKTUÁLNE)

- [ ] Vytvoriť novú migráciu pre tabuľku `services` – príkaz vysvetlený, zatiaľ nepotvrdený
- [ ] Pridať `image` – cesta k obrázku služby
- [ ] Pridať `icon` – názov/identifikátor ikony
- [ ] Pridať `content` – podrobný obsah detailu
- [ ] Zvoliť bezpečný spôsob ukladania a zobrazovania obrázkov (disk `public`, upload a validácia)
- [ ] Zvoliť spôsob práce s ikonami (povolené názvy / knižnica; nie ľubovoľné HTML)
- [ ] Rozšíriť model a administračné create/edit formuláre
- [ ] Rozšíriť Blade kartu na obrázok + ikonku + nadpis + krátky popis + odkaz
- [ ] Rozšíriť detail o plnohodnotný obsah
- [ ] Dokončiť responzívne rozloženie piatich kariet
- [ ] Premyslieť, či treba samostatný `url`/externý odkaz; zatiaľ sa detail generuje automaticky pomocou route
- [ ] Pri rozšírení obsahu zohľadniť aktivitu služby aj na verejnom detaile

### Fáza 3 – Autentifikácia a používatelia

- [ ] Overiť kompatibilitu aktuálnych Laravel starter kitov s použitou verziou
- [ ] Nainštalovať zvolený autentifikačný systém
- [ ] Prihlásenie, odhlásenie, prípadne reset hesla
- [ ] `auth` middleware a administrátorské oprávnenia
- [ ] Presunúť/vyradiť dočasné `local.only` tam, kde ho nahradí reálna ochrana
- [ ] Umiestniť vytváranie služby do admin časti (aktuálne vývojové `/services/create`)

### Fáza 4 – Administrácia a prípadne Filament

- [x] Jednoduchá vlastná admin tabuľka služieb pre lokálny vývoj
- [x] Vlastné formuláre na úpravu a stav služby
- [ ] Overiť, či je Filament pre projekt vhodný a kompatibilný
- [ ] Prípadne nainštalovať Filament a vytvoriť `Service` resource
- [ ] Vyhľadávanie, filtre, stránkovanie, roly a prístupové práva

### Fáza 5 – Obsah MMArena.sk

- [x] Základ HOME s kartami služieb
- [x] Základný detail služby
- [x] Základná kontaktná route/controller
- [ ] Dokončiť finálny obsah HOME, služby a cenník
- [ ] Kontakt, otváracie hodiny a informácie o aréne
- [ ] Aktuality
- [ ] Finálny responzívny dizajn, SEO a prístupnosť
- [ ] Optimalizácia obrázkov

### Fáza 6 – Databáza a pokročilé funkcie

- [x] Základné migrácie, Eloquent a automatizované testy
- [ ] Pokročilé migrácie a rollback
- [ ] Seedery a factory
- [ ] Vzťahy modelov
- [ ] Stránkovanie, vyhľadávanie, filtre
- [ ] Nahrávanie obrázkov a správa súborov
- [ ] Logovanie a ošetrenie chýb
- [ ] Doplniť testy nových bezpečnostne citlivých funkcií

### Fáza 7 – Nasadenie

- [ ] Výber hostingu a produkčnej databázy
- [ ] Produkčný `.env` (bez vystavených tajomstiev), `APP_DEBUG=false`
- [ ] HTTPS a bezpečná správa oprávnení
- [ ] Autentifikácia/autorizácia všetkých administračných akcií
- [ ] Migrácie a zálohy databázy
- [ ] Frontend build (`npm run build`)
- [ ] Logy, monitoring, kontrola funkčnosti
- [ ] Odstránenie testovacích dát a preverenie verejných URL

## 6. Pravidlá nášho učenia

1. Jeden malý krok naraz.
2. Najskôr vysvetliť **prečo**, až potom kód.
3. Po každom kroku čakať na `hotovo`, `PASS` alebo `FAIL`.
4. Neopakovať vysvetlenie už pochopenej témy bez potreby.
5. Nemení sa veľa súborov naraz.
6. Fungujúci kód zbytočne neprepisovať; jednoduchšie užívateľské riešenia sú vítané.
7. Pri chybe najprv vysvetliť príčinu.
8. Keď používateľ chce úlohu skúsiť sám, dať priestor a následne skontrolovať kód.
9. Keď používateľ žiada hotový kód alebo už má dosť testovania, neposielať ďalšie kvízy.
10. Nové balíky a nástroje inštalovať až po overení kompatibility.
11. Git commity a zálohy pred väčšími zmenami.
12. Priorita je reálny web MMArena.sk, nie umelé precvičovanie zbytočných funkcií.

## 7. Užitočné príklady z projektu

### Eloquent

```php
Service::all();
Service::where('is_active', true)->get();
Service::where('is_active', true)->count();
Service::where('is_active', true)->pluck('name');
Service::find(1);
Service::findOrFail(1);

// HOME: najviac 5 najlacnejších aktívnych služieb
Service::where('is_active', true)
    ->orderBy('price')
    ->limit(5)
    ->get();

// Admin: všetky služby
Service::all();
```

### Zmena stavu

```php
$service->is_active = !$service->is_active;
$service->save();
```

### Blade odkaz na detail

```blade
<a href="{{ route('services.show', $sluzba) }}">
    {{ $sluzba->name }}
</a>
```

### PATCH a DELETE formuláre

```blade
<form method="POST" action="{{ route('admin.services.update', $service) }}">
    @csrf
    @method('PATCH')
    <!-- polia a submit -->
</form>

<form method="POST" action="{{ route('admin.services.destroy', $service) }}">
    @csrf
    @method('DELETE')
    <!-- potvrdenie a submit -->
</form>
```

### Pest – test prepnutia stavu

```php
test('stav sluzby je mozne aktivovat a deaktivovat', function () {
    $this->withoutMiddleware(\App\Http\Middleware\LocalOnly::class);

    $service = \App\Models\Service::create([
        'name' => 'Testovacia sluzba',
        'description' => 'Test zmeny stavu',
        'price' => 15,
        'is_active' => true,
    ]);

    $this->patch(route('admin.services.changeStatus', $service))
        ->assertRedirect(route('admin.services.index'));

    $this->assertDatabaseHas('services', [
        'id' => $service->id,
        'is_active' => 0,
    ]);

    $this->patch(route('admin.services.changeStatus', $service))
        ->assertRedirect(route('admin.services.index'));

    $this->assertDatabaseHas('services', [
        'id' => $service->id,
        'is_active' => 1,
    ]);
});
```

## 8. Bezpečnosť a otvorené rozhodnutia

- Nikdy neverejniť `.env`, heslá, tokeny ani produkčné tajomstvá.
- `local.only` **nenahrádza autentifikáciu/autorizáciu**; nepublikovať súčasnú administráciu bez jej ochrany.
- Používať `@csrf`, validáciu vstupov a escapované Blade výstupy.
- S nahrávanými súbormi pracovať cez validáciu typu, veľkosti a bezpečné úložisko.
- Pred nasadením rozhodnúť o zobrazení neaktívnych služieb na detaile (HOME ich už filtruje).
- Pred zmazaním dôležitých dát urobiť zálohu; zvážiť soft delete.
- Pri produkčných URL nenechať otvorený vývojový CREATE formulár.
- Pred `php artisan migrate` skontrolovať obsah novej migrácie a urobiť zálohu.

---

## 9. Presný bod pokračovania

**Lekcia 11, krok 1:** Pripraviť novú migráciu na stĺpce `image`, `icon`, `content` v tabuľke `services`.

```bash
php artisan make:migration add_media_and_content_to_services_table --table=services
```

**Stav:** príkaz bol navrhnutý, ale jeho vykonanie zatiaľ nebolo potvrdené. Neoznačovať ho ako dokončený.

Po potvrdení vytvorenia migrácie pokračovať vysvetlením `up()` a `down()` a pridať nové stĺpce **po jednom logickom kroku**. Nevytvárať znova CRUD ani nevyžadovať opakovanie doteraz úspešných testov.
