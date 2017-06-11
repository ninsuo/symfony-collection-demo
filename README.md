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

All samples have their own controllers, form types, views etc. for easier readability.

If you go to `http://127.0.0.1:8000/options/positionField`, it means that:

- Controller is at `AppBundle\Controller\Options\PositionFieldController.php`
- Entities are at  `AppBundle\Entity\Options\PositionField`
- Form types are at `AppBundle\Form\Options\PositionField`
- Views and form themes are at `AppBundle\Resources\views\Options\PositionField`

## License

- This project is released under the MIT license

- Fuz logo is © 2013-2042 Alain Tiemblo

