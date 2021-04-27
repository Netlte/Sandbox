# Netlte > Sandbox

[![Build Status](https://badgen.net/travis/netlte/sandbox)](https://travis-ci.com/Netlte/Sandbox)
[![Licence](https://badgen.net/packagist/license/netlte/sandbox)](https://packagist.org/packages/Netlte/Sandbox)
[![Latest stable](https://badgen.net/packagist/v/netlte/sandbox)](https://packagist.org/packages/Netlte/Sandbox)
[![Downloads this Month](https://badgen.net/packagist/dm/netlte/sandbox)](https://packagist.org/packages/Netlte/Sandbox)
[![Downloads total](https://badgen.net/packagist/dt/netlte/sandbox)](https://packagist.org/packages/Netlte/Sandbox)
[![PHPStan](https://badgen.net/badge/PHPStan/enabled/green)](https://github.com/phpstan/phpstan)

## Credits

Feel free to use. Your contributions are very welcome. Feel free to publish pull requests.
Thanks to [David Grudl](https://github.com/dg) and community for great php [**Nette**](https://nette.org/) framework and [Colorlib](https://colorlib.com/) for widely used [**AdminLTE**](https://adminlte.io/) bootstrap template.

## Overview

This is basic sandbox app forked from [`nette/sandbox`](https://github.com/nette/sandbox) to demonstrate graphical **Netlte** framework of [**AdminLTE**](https://adminlte.io/) build on php [**Nette**](https://nette.org/) framework component model.
Currently, all components supports old AdminLTE2. AdminLTE3 is on way immediately after all main components will be implemented.
All packages on a version v1.x are for AdminLTE2 and PHP >= 7.4.
All packages on a version v2.x are for AdminLTE3 and PHP >= 8.0.

## Install
```bash
composer create-project netlte/sandbox path/to/install
cd path/to/install
composer install # Dependencies
cd www/
npm install # Assets
```

## Documentation
All components have their documentation in own repository
* [UI](https://github.com/Netlte/UI) - Basic utilities for building components
* [Panel](https://github.com/Netlte/Panel) - Basic components factory to clean-up your presenters
* [Navigation](https://github.com/Netlte/Navigation) - Structure and view for navigation component
* [Boxes](https://github.com/Netlte/Boxes) - All kind of boxes, tabbox and more same kind components
* [BreadCrumbs](https://github.com/Netlte/BreadCrumbs) - Component for standard BreadCrumbs
* [ActionBar](https://github.com/Netlte/ActionBar) - Component for heading actions
* [Dashboard](https://github.com/Netlte/Dashboard) - Component for organize dashboard panel **[WIP]**
* [Timeline](https://github.com/Netlte/Timeline) - Component to show event in nice way **[WIP]**
* **more on way ...**

| State       | AdminLTE | Version | Branch   | PHP      |
|-------------|----------|---------|----------|----------|
| stable      |   `2.0`  | `^1.0`  |  `main`  | `>= 7.4` |
| NoN         |   `3.0`  | `^2.0`  |  `main`  | `>= 8.0` |

## Tests

Check code quality and run tests
```
composer build
```

or separately

```
composer cs
composer analyse
composer tests
```

## Authors

| [Tomáš Holan](https://github.com/holantomas)                             |
|--------------------------------------------------------------------------|
| ![Avatar](https://avatars3.githubusercontent.com/u/5030499?s=100)        |