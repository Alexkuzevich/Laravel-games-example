
# Новое задание от 23.07.2022
Краткое описание: попробуем реализовать функционал интернет магазина игр.
Для начала нужно создать новый проект laravel версии 8.
Добавить проект в гит на гитхаб аккаунте. [Сделаем вместе]
Подключить туда следующие модули:
* ide-helper (https://github.com/barryvdh/laravel-ide-helper)
## Сущности которые нам будут нужны:
* Продукт(Product) в данном случае будут комп игры
  * id
  * name - название продукта dota-2 
  * description - описание
  * slug - url для продукта (://example.com/products/dota-2)  || model->fill()->save() через fill можно менять поле у модели
  * preview_image - картинка(на первом этапе при обращении к свойству preview_image нужно возвращать `'https://avatars.dicebear.com/v2/initials/' . preg_replace('/[^a-z0-9 _.-]+/i', '', $name) . '.svg';`)
  * position - позиция продукта в общем списке, по умолчанию, у всех продуктов стоит 1000
  * video - ссылка на видео обзор продукта
  * novelty - является ли данная игра новинкой
  * status - статус продукта(0 - продукт выключен, он нигде не отображается, 10 - продукт включен, везде отображается), по умолчанию статус 10
  * [category_id] будет в отдельной таблице
  * [price_id]  [hasMany]
  * [publisher_id]
* Категория продукта (стоит не забывать что категории могут быть не только у продукта, эта конкретно про продукт)
  * id
  * name - название категории
  * slug - url (://example.com/category/single-player)
  * parent_id - айди родительской категории(Если 0 то у категории нет родителя, иначе это считается подкатегорией)
  * image - картинка(на первом этапе при обращении к свойству image нужно возвращать `'https://avatars.dicebear.com/v2/initials/' . preg_replace('/[^a-z0-9 _.-]+/i', '', $name) . '.svg';`)
  * position - позиция продукта в общем списке, по умолчанию, у всех категорий стоит 1000
  * [product_id] будет в отдельной таблице
* Издатель
  * id
  * name
  * image - картинка(на первом этапе при обращении к свойству image нужно возвращать `'https://avatars.dicebear.com/v2/initials/' . preg_replace('/[^a-z0-9 _.-]+/i', '', $name) . '.svg';`)
  * [product_id] УДАЛИТЬ
* Цена
  * id
  * product_id [belongsTo]
  * price - цена (4199.00)
  * price_type - тип цены(со скидкой, обычная цена, цена на распродаже)

## Связи(Relation)
* Продукт-категория
  * У продукта может быть несколько категорий [belongsToMany] + промежуточная таблица
  * У категории может быть несколько продуктов [belongsToMany] + промежуточная таблица
* Продукт-цена
  * У продукта может быть несколько цен с разными price_type 
  * у цены может быть только один продукт [belongsTo] - это есть
* Продукт-издатель
  * У продукта есть только один издатель [belongsTo]
  * У издателя может быть несколько продуктов [hasMany]

## Начальные данные
* Создать категории:
  * Жанры
    * фантастика
    * боевик
    * что-нибудь еще своё
    * тип игры
      * Сетевая
      * Однопользовательская
* Создать издателя 
  * На ваш вкус(пример Valve, Ubisoft, Blizzard)
* Создать продукты
  * 1 продукт по каждой из подкатегорий
  * 2-3 продукта одного издателя (у какого нибудь продукта сделать Position 999)
  * Сделать какие-нибудь продукты новинками
  * Сделать у 1-2 продуктов статус 0
* Создать цену (price_type обычная) для каждого продукта
* Создать для пары-тройки продуктов цену со скидкой (price_type со скидкой)

## Роуты
* Роут для вывода всех игр с учетом фильтров, формат ответа json
  * Фильтры
    * Фильтр по цене(например хочу купить продукты цена которых лежит между X и Z)
    * Фильтр по издателям(отображать только игр с конкретным издателям)
    * Фильтр по категориям
    * Фильтр по новинкам(novelty) - показывать только новинки
  * Сортировки (приоритет сортировок как указан ниже)
    * Сортировка по цене(от самых низких до самых высоких, и наоборот)
    * Сортировка по новинкам(те, что с признаком новинка, отображать выше)
    * Сортировка по позиции товара, чем он ниже, тем выше товар
  * Если у товара статус 0, то такие товары не выводим
  * Ответ, формат json, список всех продуктов со след столбцами
    * name
    * description
    * slug
    * image
    * video
    * publisher_name - имя издателя
    * price - выводится актуальная цена для продукта(если есть цена со скидкой, то берется она, если нет то обычная цена)
* Роут для вывода всех категорий с подкатегориями
Сначала выводятся все категории с parent_id 0, далее в childrens указываются все категории у которых parent_id равен текущей и тд
```[[ 'id', 'name', 'childrens' : [ [ 'id', 'name', 'childrens'], [ 'id', 'name', 'children'] ] ]]```
* Роут для вывода цен на продукты(Роут должен быть защищен и доступен только по токену)
  * Ответ должен содержать следующее
    * id продукта
    * name продукта
    * prices
      * price_type
      * price
