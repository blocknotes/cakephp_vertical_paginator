A CakePHP Vertical Paginator element
------------------------------------

![Screenshot](http://github.com/blocknotes/cakephp_vertical_paginator/raw/master/image1.png)

* * *

##### INSTALLATION

- Copy vertical_paginator.ctp in app/View/Elements
- In the controller use the Pagination component
- In your views use the element 'vertical_paginator' in every line of your table (it creates an extra column for the paginator)

##### ATTRIBUTES

- 'prev' - set upper symbol for previous page
- 'next' - set lower symbol for next page
- 'no_styles' - disable default internal styles

##### USAGE EXAMPLE 1

	<table>
		<tr><td>1</td><td>John</td><td>Dohh</td><td>1970-01-01</td><?php echo $this->element( 'vertical_paginator' ); ?></tr>
		<tr><td>2</td><td>Max</td><td>Damage</td><td>1980-2-12</td><?php echo $this->element( 'vertical_paginator' ); ?></tr>
		<tr><td>3</td><td>Jane</td><td>Cake</td><td>1985-06-06</td><?php echo $this->element( 'vertical_paginator' ); ?></tr>
	</table>

##### USAGE EXAMPLE 2
Combining it with Bootstrap.

	<?php
		echo $this->element( 'vertical_paginator', array( 'prev' => '<span class="glyphicon glyphicon-chevron-up"></span>', 'next' => '<span class="glyphicon glyphicon-chevron-down"></span>' ) );
	?>

* * *

My website: <http://blocknot.es/>