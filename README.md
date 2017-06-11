Symfony Collection demo website
========================

## See this website [live](http://symfony-collection.fuz.org/)

---

## Installation

```sh
php -r "readfile('https://getcomposer.org/installer');" | php
php composer.phar install
php app/console assetic:dump
php app/console assets:install web --symlink
php app/console server:start
```

## Usage

All "Basic Usage" samples have their own controllers, form types, views etc. for easier readability.

If you go to `http://127.0.0.1:8000/basic/positionField`, it means that:

- Controller is at `AppBundle\Controller\Basic\PositionFieldController.php`
- Entities are at  `AppBundle\Entity\Basic\PositionField`
- Form types are at `AppBundle\Form\Basic\PositionField`
- Views and form themes are at `AppBundle\Resources\views\Basic\PositionField`

Other samples use more generic data because that was quicker to code. If you feel that's not easy enough to understand,
don't hesitate to throw a suggestion or a PR.

## License

- This project is released under the MIT license

- Fuz logo is © 2013-2042 Alain Tiemblo

