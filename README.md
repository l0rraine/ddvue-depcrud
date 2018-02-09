# DDVue\DepCRUD
ddvue crud里的单位编辑模块，需要 laravel 5.x。

## 安装

```
composer require ddvue/depcrud
php artisan vendor:publish --tag=ddvue
```

## 使用

1. 首先`php artisan migrate`
2. 在config/ddvue/base.php中可以配置后台路由前缀
3. 可以在网站里直接调用`route('Crud.Dep.index')`

