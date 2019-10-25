<?php return array (
  'arrilot/laravel-widgets' => 
  array (
    'providers' => 
    array (
      0 => 'Arrilot\\Widgets\\ServiceProvider',
    ),
    'aliases' => 
    array (
      'Widget' => 'Arrilot\\Widgets\\Facade',
      'AsyncWidget' => 'Arrilot\\Widgets\\AsyncFacade',
    ),
  ),
  'barryvdh/laravel-debugbar' => 
  array (
    'providers' => 
    array (
      0 => 'Barryvdh\\Debugbar\\ServiceProvider',
    ),
    'aliases' => 
    array (
      'Debugbar' => 'Barryvdh\\Debugbar\\Facade',
    ),
  ),
  'fideloper/proxy' => 
  array (
    'providers' => 
    array (
      0 => 'Fideloper\\Proxy\\TrustedProxyServiceProvider',
    ),
  ),
  'intervention/image' => 
  array (
    'providers' => 
    array (
      0 => 'Intervention\\Image\\ImageServiceProvider',
    ),
    'aliases' => 
    array (
      'Image' => 'Intervention\\Image\\Facades\\Image',
    ),
  ),
  'larapack/voyager-hooks' => 
  array (
    'providers' => 
    array (
      0 => 'Larapack\\VoyagerHooks\\VoyagerHooksServiceProvider',
    ),
  ),
  'laravel/socialite' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Socialite\\SocialiteServiceProvider',
    ),
    'aliases' => 
    array (
      'Socialite' => 'Laravel\\Socialite\\Facades\\Socialite',
    ),
  ),
  'laravel/tinker' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Tinker\\TinkerServiceProvider',
    ),
  ),
  'nunomaduro/collision' => 
  array (
    'providers' => 
    array (
      0 => 'NunoMaduro\\Collision\\Adapters\\Laravel\\CollisionServiceProvider',
    ),
  ),
  'tcg/voyager' => 
  array (
    'providers' => 
    array (
      0 => 'TCG\\Voyager\\VoyagerServiceProvider',
      1 => 'TCG\\Voyager\\Providers\\VoyagerDummyServiceProvider',
    ),
  ),
);