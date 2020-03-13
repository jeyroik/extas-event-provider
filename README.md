# extas-event-provider

Event provider for using extas stages. 

Allow to use extas with [league/event](https://github.com/thephpleague/event).

# Usage

```php
use League\Event\Emitter;

$emitter = new Emitter;
$emitter->useListenerProvider(new extas\components\events\EventProvider());
$emitter->emit('any.stage');
```