Laravel 4 Breadcrumbs
============

** If you have problems running setSeperator (typo'd) after update, I changed the function name to setSeperator.

A small and easy customizable breadcrumb generator for Laravel 4.

edit the .json
============

Edit your .json file and add the following line to your "require"

``"mj/breadcrumb": "dev-master"``

After this run the `composer update` to update your framework and get the breadcrumb class loaded into your files.

Setup
============

Open app.php in your config folder

1. Add the line `'Mj\Breadcrumb\BreadcrumbServiceProvider'` to the providers array.

2. To make use of the Facade that comes with Laravel 4, make sure you register the alias in the file 'app/config/app.php'.

Like this: `'Breadcrumb'      => 'Mj\Breadcrumb\Facades\breadcrumb'`

Usage
============

To create breadcrumbs use the following code:

``Breadcrumb::addbreadcrumb('linkname', 'url');``

You can add multiple breadcrumbs by repeating the code above.

To set an seperator you can use:

``Breadcrumb::setSeparator('yourseperator')``

At last send your breadcrumbs to your template (or just generate them) with the following command:

``Breadcrumb::generate()``

Example
============

Note: Use real url's (like /this/page) and not Laravel's URL helper. Not setting a URL at all will also work.

```
//Controller

public function page()
{
  //Those are required to set some breadcrumbs first.
  Breadcrumb::addBreadcrumb('home', '/');
  Breadcrumb::addBreadcrumb('some page', '/some-page');
  Breadcrumb::addBreadcrumb('last piece'); //Does not need a url because it's the last breadcrumb segment

	Breadcrumb::setSeparator('/'); //Set some seperator you think is nicest (not required)

  $data = array(
	  'breadcrumbs' => Breadcrumb::generate() //Breadcrumbs UL is generated and stored in an array.
  )

  //return the view with the $data array to use it in the view
  return View::make('some/page', $data);
}

//View

{{$breadcrumbs}} // -> UL with list-items with the links :)
```
