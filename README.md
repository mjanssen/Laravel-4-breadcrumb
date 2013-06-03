l4breadcrumb
============

A small and easy customizable breadcrumb generator for Laravel 4.

Setup:

1. Register the class in the Providers array in 'app/config/app.php'.

For me it was:
`'Mj\Breadcrumb\BreadcrumbServiceProvider'`

2. To make use of the Facade that comes with Laravel 4, make sure you register the alias in the file 'app/config/app.php'.

Like:
`'Breadcrumb'      => 'Mj\Breadcrumb\Facades\breadcrumb'`
