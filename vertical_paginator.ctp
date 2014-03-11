<?php
/**
 * Vertical paginator
 *
 * Licensed under The GPL3 License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 */

if( isset( $this->Paginator ) )
{
	echo '<td ';
	if( isset( $hide_if_one ) && $this->Paginator->counter( '{:pages}' ) == 1 ) echo '>&nbsp;';
	else
	{
		if( !isset( $this->_vp_cnt ) )
		{	// INIT
			if( !isset( $no_styles ) ) 
			{
				$this->start( 'css' );
?>
	<style>
		.vp_prev, .vp_next { padding: 0px !important;  }
		.vp_prev { vertical-align: bottom !important }
		.vp_next { vertical-align: top !important }
		.vp_prev a, .vp_prev .disabled { background:#F8F8F8;border:1px outset #888 !important;border-radius:5px 5px 0 0;display: block;padding-bottom:2px;padding-top:2px;-moz-border-radius:5px 5px 0 0; }
		.vp_next a, .vp_next .disabled { background:#F8F8F8;border:1px outset #888 !important;border-radius:0 0 5px 5px;display: block;padding-bottom:2px;padding-top:2px;-moz-border-radius:0 0 5px 5px; }
		.vp_current, .vp_cell { background:#DDD !important;border:0 none !important; }
		.vp_current:hover, .vp_cell:hover { background:#DDD !important }
		.vp_current div { background:#F4F4F4 !important;border:1px solid #888;border-radius:5px;color:#666;-moz-border-radius:5px }
		.vp_prev a, .vp_next a, .vp_cell a { display: block }
		.vp_prev a:hover, .vp_next a:hover, .vp_cell a:hover { text-decoration: none }
		.vp_prev, .vp_next, .vp_current, .vp_cell { text-align:center;vertical-align:middle;width:36px; }
	</style>
<?php
				$this->end();
			}
			$this->_vp_cnt = 0;
			$this->_vp_pages = intval( $this->Paginator->counter( '{:pages}' ) );
			$this->_vp_page = intval( $this->Paginator->counter( '{:page}' ) );
			$this->_vp_rows = intval( $this->Paginator->counter( '{:current}' ) ) - 2;
			if( $this->_vp_page > 1 )
			{
				$this->_vp_pos = round( $this->_vp_rows * $this->_vp_page / $this->_vp_pages );
				if( $this->_vp_pos < 1 ) $this->_vp_pos = 1;
			}
			else $this->_vp_pos = 1;
			echo 'class="vp_prev">', $this->Paginator->prev( !isset( $prev ) ? '&uarr;' : $prev, array( 'escape' => FALSE ), null, array( 'escape' => FALSE, 'class' => 'disabled' ) );
		}
		else
		{
			$this->_vp_cnt++;
			if( $this->_vp_cnt == ( $this->_vp_rows + 1 ) ) echo 'class="vp_next">', $this->Paginator->next( !isset( $next ) ? '&darr;' : $next, array( 'escape' => FALSE ), null, array( 'escape' => FALSE, 'class' => 'disabled' ) );
			else if( $this->_vp_cnt == $this->_vp_pos ) echo 'class="vp_current"><div>', $this->_vp_page, '</div>';
			else
			{
				$go_to = round( $this->_vp_cnt * $this->_vp_pages / $this->_vp_rows );
				if( $this->_vp_cnt == 1 || $go_to < 1 ) $go_to = 1;
				else if( $go_to > $this->_vp_pages ) $go_to = $this->_vp_pages;
				echo 'class="vp_cell">', $this->Paginator->link( '&nbsp;', array( 'page' => $go_to ), array( 'escape' => FALSE, 'title' => $go_to ) );
			}
		}
	}
	echo "</td>\n";
}
?>
