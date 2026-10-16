# Laravel projekt – MM Arena

## 1. Cieľ projektu

Postupne vytvoriť nový web pre MM Arenu (`mmarena.sk`) pomocou Laravelu, Blade, HTML, CSS a Tailwind CSS.

Cieľom je naučiť sa potrebné základy a pritom reálne vytvárať web. Každú novú tému si najprv vysvetlíme, potom ju prakticky vyskúšam a až následne budeme pokračovať.

Projekt budeme vyvíjať po malých krokoch. Kód píšem a upravujem ja, asistent mi vysvetľuje jednotlivé postupy a pomáha riešiť prípadné chyby.

## 2. Pravidlá učenia

- Postupovať po malých krokoch.
- Nové témy vysvetľovať jednoducho a na praktických príkladoch.
- Kód píšem a upravujem ja.
- Po každej úlohe pošlem výsledok na kontrolu.
- Pred ďalším krokom počkať na moje potvrdenie.
- Neopakovať zbytočne témy, ktoré už ovládam.
- Zamerať sa hlavne na Laravel, PHP, databázy, Eloquent a neskôr Filament.
- HTML a CSS základy už ovládam; vysvetľovať ich len vtedy, keď to bude potrebné.
- Uprednostňovať objektový prístup tam, kde je vhodný.
- Zachovať pôvodný obsah webu a jeho URL adresy. Ak bude potrebné adresy zmeniť, vyriešiť presmerovania.
- Po dokončení tém aktualizovať tento dokument.

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
- **Frontend:** HTML, CSS a Tailwind CSS 4
- **Build nástroj:** Vite
- **Administrácia v budúcnosti:** Filament

Projekt nepoužíva starter kit.

### Užitočné príkazy

Spustenie Laravel servera z Git Bash:

```bash
cmd.exe //c "cd /d C:\ProjectLaravel\mmarena && php artisan serve"
```

Spustenie Vite vývojového servera:

```bash
npm run dev
```

Výpis rout:

```bash
cmd.exe //c "cd /d C:\ProjectLaravel\mmarena && php artisan route:list"
```

Spustenie Laravel Tinker:

```bash
cmd.exe //c "cd /d C:\ProjectLaravel\mmarena && php artisan tinker"
```

## 4. Čo už mám hotové

### 4.1 Prostredie a Git

- [x] Naklonovanie projektu z GitHubu.
- [x] Inštalácia závislostí cez Composer.
- [x] Vytvorenie lokálneho súboru `.env`.
- [x] Vygenerovanie aplikačného kľúča.
- [x] Vytvorenie SQLite databázy.
- [x] Spustenie databázových migrácií.
- [x] Spustenie Laravel servera.
- [x] Základná práca s Gitom: commit a push.
- [x] Inštalácia npm závislostí a sprevádzkovanie Vite.

### 4.2 Routes a controllery

- [x] Pochopiť základné routy v `routes/web.php`.
- [x] Vytvoriť pomenované routy `home` a `contact`.
- [x] Zobraziť zoznam rout pomocou `php artisan route:list`.
- [x] Vytvoriť `HomeController`.
- [x] Použiť metódy `index()` a `contact()`.
- [x] Odovzdať údaje z kontroléra do Blade pomocou `compact()`.

### 4.3 Blade a spoločná šablóna

- [x] Vytvoriť spoločnú šablónu `resources/views/layouts/app.blade.php`.
- [x] Pochopiť `@yield`, `@extends` a `@section`.
- [x] Vytvoriť stránky `home.blade.php` a `contact.blade.php`.
- [x] Použiť pomenované routy v navigácii pomocou `route()`.
- [x] Zobraziť dynamické údaje pomocou `{{ }}`.
- [x] Vytvoriť spoločnú hlavičku, navigáciu, hlavný obsah a pätičku.

### 4.4 PHP polia a Blade cykly

- [x] Vytvoriť pole `$sluzby` v `HomeController`.
- [x] Odovzdať pole do view pomocou `compact()`.
- [x] Pochopiť rozdiel medzi obyčajným a asociatívnym poľom.
- [x] Priradiť každej službe názov a cenu.
- [x] Použiť `@foreach` na zobrazenie položiek.
- [x] Použiť `@forelse`, `@empty` a `@endforelse`.
- [x] Otestovať zoznam s položkami aj prázdne pole.
- [x] Použiť HTML zoznam s elementmi `<ul>` a `<li>`.

### 4.5 Blade podmienky

- [x] Pochopiť, ako funguje `@if`.
- [x] Použiť `@else` pre alternatívnu možnosť.
- [x] Použiť `@elseif` na kontrolu ďalšej podmienky.
- [x] Ukončiť podmienku pomocou `@endif`.
- [x] Otestovať hodnoty premennej `$pocetKlzisk`: `0`, `1` a `2`.
- [x] Pochopiť, ako sa podľa hodnoty premennej mení obsah stránky.

### 4.6 Tailwind CSS a responzívny dizajn

- [x] Nainštalovať a nakonfigurovať Tailwind CSS 4 s Vite.
- [x] Pripojiť CSS a JavaScript cez `@vite`.
- [x] Použiť utility triedy Tailwind na úpravu vzhľadu stránky.
- [x] Vytvoriť karty pre jednotlivé služby.
- [x] Použiť okraje, vnútorné odsadenie, tiene a zaoblenie kariet.
- [x] Použiť `grid`, `grid-cols-1`, `md:grid-cols-2` a `lg:grid-cols-3`.
- [x] Použiť `gap-4` na nastavenie medzier medzi kartami.
- [x] Vytvoriť responzívne rozloženie služieb pre mobil, tablet a počítač.

### 4.7 Databázová migrácia a model Service

- [x] Vytvoriť model a migráciu pomocou `php artisan make:model Service -m`.
- [x] Pripraviť migráciu tabuľky `services`.
- [x] Definovať stĺpec `id`.
- [x] Definovať `name` pre názov služby.
- [x] Definovať `description` pre voliteľný opis služby.
- [x] Definovať `price` pomocou `decimal(10, 2)`.
- [x] Definovať `is_active` s predvolenou hodnotou `true`.
- [x] Pridať `timestamps()` pre dátum vytvorenia a poslednej úpravy.
- [x] Spustiť migráciu pomocou `php artisan migrate`.
- [x] Vytvoriť model `app/Models/Service.php`.
- [x] Nastaviť vlastnosť `$fillable` pre povolené atribúty.

### 4.8 Eloquent ORM a objektový prístup

- [x] Pochopiť, že model `Service` reprezentuje záznamy v tabuľke `services`.
- [x] Vytvoriť objekt pomocou `new Service()`.
- [x] Nastaviť atribúty objektu pomocou operátora `->`.
- [x] Uložiť objekt do databázy pomocou `$service->save()`.
- [x] Vložiť testovaciu službu cez Laravel Tinker.
- [x] Načítať prvý záznam pomocou `Service::first()`.
- [x] Načítať všetky záznamy pomocou `Service::all()`.
- [x] Zistiť počet záznamov pomocou `Service::count()`.
- [x] Filtrovať záznamy pomocou `Service::where(...)->get()`.
- [x] Pochopiť rozdiel medzi `::` a `->`.
- [x] Pochopiť rozdiel medzi objektom modelu a kolekciou objektov.
- [x] Pochopiť, že `use App\Models\Service;` umožňuje používať krátky názov `Service`.

### 4.9 Prepojenie databázy s Blade

- [x] Importovať model do `HomeController` pomocou `use App\Models\Service;`.
- [x] Načítať aktívne služby pomocou `Service::where('is_active', true)->get()`.
- [x] Nahradiť pôvodné testovacie pole služieb načítaním z databázy.
- [x] Odovzdať kolekciu objektov do Blade šablóny.
- [x] Zobraziť názov služby cez `{{ $sluzba->name }}`.
- [x] Zobraziť cenu služby cez `{{ $sluzba->price }}`.
- [x] Pochopiť rozdelenie zodpovednosti: model pracuje s dátami, kontrolér ich načítava a Blade ich zobrazuje.

## 5. Aktuálny stav projektu

### Funkčné stránky

- `/` – domovská stránka.
- `/contact` – kontaktná stránka.

### Pomenované routy

- `home`
- `contact`

### Domovská stránka

- Používa spoločnú Blade šablónu.
- Má responzívne rozloženie pomocou Tailwind CSS.
- Zobrazuje informácie o aréne.
- Zobrazuje služby v samostatných kartách.
- Služby načítava z databázy SQLite cez Eloquent.
- Zobrazuje iba služby, pri ktorých je `is_active` nastavené na `true`.

### Databáza

Existuje tabuľka `services` s nasledujúcimi stĺpcami:

- `id`
- `name`
- `description`
- `price`
- `is_active`
- `created_at`
- `updated_at`

Model sa nachádza v `app/Models/Service.php`.

V databáze je vložená testovacia služba:

- Názov: Verejné korčuľovanie
- Opis: Korčuľovanie pre verejnosť.
- Cena: 8,00 €
- Aktívna: áno

Cena je testovacia hodnota, nie potvrdená skutočná cena MM Areny.

### Zatiaľ nedokončené

- Služby ešte nemajú formulár na vytváranie a úpravu cez web.
- Zatiaľ nemáme administráciu Filament.
- Testovacie údaje o aréne treba neskôr nahradiť overenými údajmi.
- Treba pripraviť validáciu, testovanie a bezpečné spr
