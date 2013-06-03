l4breadcrumb
============

A small and easy customizable breadcrumb generator for Laravel 4.

Setup:

1. Register the class in the Providers array in 'app/config/app.php'.

For me it was:
``'Mj\Breadcrumb\BreadcrumbServiceProvider'``

2. To make use of the Facade that comes with Laravel 4, make sure you register the alias in the file 'app/config/app.php'.

Like:
``'Breadcrumb'      => 'Mj\Breadcrumb\Facades\breadcrumb'``

============

To create breadcrumbs use the following code:

``Breadcrumb::addbreadcrumb('linkname', 'url');``

You can add multiple breadcrumbs by repeating the code above.

To set an seperator you can use:

``Breadcrumb::setSeperator('yourseperator')``

At last send your breadcrumbs to your template (or just generate them) with the following command:

``Breadcrumb::generate()``
