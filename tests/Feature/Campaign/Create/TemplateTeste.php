<?php

use App\Models\Template;
use App\Models\EmailList;

use function Pest\Laravel\get;
use function Pest\Laravel\post;

beforeEach(function () {
    login();

    EmailList::factory()->create();
    $this->template = Template::factory()->create();

    $this->route = route('campaigns.create', ['tab' => 'template']);

    post(route('campaigns.create'), [
        'name'          => 'First Campaign',
        'subject'       => 'Subject',
        'email_list_id' => 1,
        'template_id'   => 1,
        'track_click'   => true,
        'track_open'    => true
    ]);
});

test('when submitting the form with a body it should be redirect to the schedule tab', function () {
    post($this->route, ['body' => 'algum body'])
        ->assertRedirect(route('campaigns.create', ['tab' => 'schedule']));
});

test('when submitting the form with a body the session should be updated with the body information', function () {
    post($this->route, ['body' => 'algum body']);

    expect(session('campaigns')['body'])->toBe('algum body');
});

test('if the data is not filled we need to redirect back to setup', function () {
    session()->forget('campaigns');

    get($this->route)
        ->assertRedirect(route('campaigns.create'));
});

test('view should have tab variable as template', function () {
    get($this->route, ['referer' => $this->route])
        ->assertOk()
        ->assertViewHas('tab', 'template');
});

test('view should have variable as _template', function () {
    get($this->route, ['referer' => $this->route])
        ->assertOk()
        ->assertViewHas('form', '_template');
});

test('data should have been filled with the body of the given template', function () {
    get($this->route, ['referer' => $this->route])
        ->assertViewHas('data.body', $this->template->body);
});

test('body should be required', function () {
    post($this->route, ['body' => null])
        ->assertSessionHasErrors(['body' => __('validation.required', ['attribute' => 'body'])]);
});
