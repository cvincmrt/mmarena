<?php
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('formular na pridanie Sluzby', function () {
    $response = $this->get('/services/create');

    //skontroluje ci sa stranka zobrazila
    $response->assertStatus(200);

    //skontroluje ci na danej stranke existuje text:'Pridanie novej služby' text je pritomny v odpovedi
    $response->assertSee('Pridanie novej služby');

    //skontrolije ci v odpovedi bude hodnota name, false hovori len ci sa ma text HTML escapovat
    $response->assertSee('name="name"', false);

});

//novy test
test('pouziva izolovanu testovaciu databazu', function () {
    expect(config('database.default'))->toBe('sqlite');

    expect(config('database.connections.sqlite.database'))
        ->toBe(':memory:');
});

test('nazov sluzby je povinny', function () {
    $this->withoutMiddleware(
        \App\Http\Middleware\LocalOnly::class
    );

    $response = $this->post('/services', [
        'name' => '',
        'description' => 'Testovaci opis',
        'price' => 10,
    ]);

    $response->assertSessionHasErrors('name');

    //zaciname s prazdnou tabulkou a overujeme ci neplatny formular do nej nic nepridal
    $this->assertDatabaseCount('services', 0);
});

test('nova sluzba sa ulozi do databazy', function () {
    $this->withoutMiddleware(
        \App\Http\Middleware\LocalOnly::class
    );

    $testovaciaCena = 15.5;

    $response = $this->post('/services', [
        'name' => 'Testovacia sluzba',
        'description' => 'Automatizovany test',
        'price' => $testovaciaCena,
    ]);

    //overuje ci presmerovanie je na spravnu adresu
    $response->assertRedirect(route('home'));

    //overuje ci je v session sprava
    $response->assertSessionHas(
        'success',
        'Služba bola úspešne vytvorená!'
    );

    $this->assertDatabaseHas('services', [
        'name' => 'Testovacia sluzba',
        'description' => 'Automatizovany test',
        'price' => 15.50,
        'is_active' => 1,
    ]);
});
                                                                    /*
                                                                    test('cena sluzby nemoze byt zaporna', function () {
                                                                        $this->withoutMiddleware(
                                                                            \App\Http\Middleware\LocalOnly::class
                                                                        );

                                                                        $response = $this->post('/services', [
                                                                            'name' => 'Test zapornej ceny',
                                                                            'description' => 'Test validacie',
                                                                            'price' => -10,
                                                                        ]);

                                                                        $response->assertSessionHasErrors('price');

                                                                        $this->assertDatabaseCount('services', 0);
                                                                    });*/

                                                                    /*
                                                                    test('cena sluzby musi byt cislo', function () {
                                                                        $this->withoutMiddleware(
                                                                            \App\Http\Middleware\LocalOnly::class
                                                                        );

                                                                        $response = $this->post('/services', [
                                                                            'name' => 'Test neplatnej ceny',
                                                                            'description' => 'Test numeric validacie',
                                                                            'price' => 'zadarmo',
                                                                        ]);

                                                                        $response->assertSessionHasErrors('price');

                                                                        $this->assertDatabaseCount('services', 0);
                                                                    });*/

test('nazov sluzby nemoze mat viac ako 255 znakov', function () {
    $this->withoutMiddleware(
        \App\Http\Middleware\LocalOnly::class
    );

    $response = $this->post('/services', [
        'name' => str_repeat('A', 300),
        'description' => 'Test dlheho nazvu',
        'price' => 10,
    ]);

    $response->assertSessionHasErrors('name');

    $this->assertDatabaseCount('services', 0);
});

test('nazov sluzby moze mat presne 255 znakov', function () {
    $this->withoutMiddleware(
        \App\Http\Middleware\LocalOnly::class
    );

    $nazov = str_repeat('A', 255);

    $response = $this->post('/services', [
        'name' => $nazov,
        'description' => 'Test hranicnej hodnoty',
        'price' => 10,
    ]);

    $response->assertSessionHasNoErrors();

    $this->assertDatabaseHas('services', [
        'name' => $nazov,
        'price' => 10,
    ]);
});
                                                                    /*
                                                                    test('cena sluzby je povinna', function () {
                                                                        $this->withoutMiddleware(
                                                                            \App\Http\Middleware\LocalOnly::class
                                                                        );

                                                                        $response = $this->post('/services', [
                                                                            'name' => 'Test bez ceny',
                                                                            'description' => 'Test povinnej ceny',
                                                                            'price' => '',
                                                                        ]);

                                                                        $response->assertSessionHasErrors('price');

                                                                        $this->assertDatabaseCount('services', 0);
                                                                    });*/

//mam 3 testy((su zakomentovane) na price a mozem to urobit pomocou 1 datasetu
test('neplatne ceny su odmietnute', function ($cena) {
    $this->withoutMiddleware(
        \App\Http\Middleware\LocalOnly::class
    );

    $response = $this->post('/services', [
        'name' => 'Test dataset',
        'description' => 'Test validacie',
        'price' => $cena,
    ]);

    $response->assertSessionHasErrors('price');

    $this->assertDatabaseCount('services', 0);

})->with([
    'zaporna cena' => [-10],
    'textova cena' => ['zadarmo'],
    'prazdna cena' => [''],
    ]);

//test UPDATE
test('sluzbu je mozne upravit', function () {

    $this->withoutMiddleware(
        \App\Http\Middleware\LocalOnly::class
    );

    $service = \App\Models\Service::create([
        'name' => 'Povodna sluzba',
        'description' => 'Povodny popis',
        'price' => 15,
    ]);

    $response = $this->patch(
        route('admin.services.update', $service),
        [
            'name' => 'Upravena sluzba',
            'description' => 'Novy popis',
            'price' => 20,
        ]
    );

    $response->assertRedirect(route('admin.services.index'));

    $this->assertDatabaseHas('services', [
        'id' => $service->id,
        'name' => 'Upravena sluzba',
        'price' => 20,
    ]);

    $this->assertDatabaseCount('services', 1);
});

test('sluzbu je mozne odstranit', function () {

    $this->withoutMiddleware(
        \App\Http\Middleware\LocalOnly::class
    );

    $service = \App\Models\Service::create([
        'name' => 'Testovacia sluzba',
        'description' => 'Sluzba na odstranenie',
        'price' => 15,
    ]);

    $response = $this->delete(
        route('admin.services.delete', $service)
    );

    $response->assertRedirect(
        route('admin.services.index')
    );

    $response->assertSessionHas(
        'success',
        'Služba bola úspešne odstránená!'
    );

    $this->assertDatabaseMissing('services', [
        'id' => $service->id,
    ]);

    $this->assertDatabaseCount('services', 0);
});

test('stav sluzby je mozne aktivovat a deaktivovat', function () {

    $this->withoutMiddleware(
        \App\Http\Middleware\LocalOnly::class
    );

    $service = \App\Models\Service::create([
        'name' => 'Testovacia sluzba',
        'description' => 'Test zmeny stavu',
        'price' => 15,
        'is_active' => true,
    ]);

    // 1. Deaktivácia služby
    $this->patch(
        route('admin.services.changeStatus', $service)
    )->assertRedirect(route('admin.services.index'));

    $this->assertDatabaseHas('services', [
        'id' => $service->id,
        'is_active' => 0,
    ]);

    // 2. Opätovná aktivácia služby
    $this->patch(
        route('admin.services.changeStatus', $service)
    )->assertRedirect(route('admin.services.index'));

    $this->assertDatabaseHas('services', [
        'id' => $service->id,
        'is_active' => 1,
    ]);
});
