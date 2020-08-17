<?
/**
 * Template part for displaying page content in ../../template-cost-calculator.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package FreshLondon
 */

?>

<article id="post-<? the_ID(); ?>" <? post_class(); ?>>
	<header class="entry-header">
	  <? the_title('<h1 class="entry-title">', '</h1>'); ?>
	</header>
	<div class="entry-content">


		<h2>How much can you save?</h2>
		<p>Heaps! How much do you usually send? Drag the slider below:</p>
		<div id="slider-range" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
			<div class="ui-slider-range ui-widget-header ui-slider-range-min" style="width: 63.4579%;"></div>
			<a class="ui-slider-handle ui-state-default ui-corner-all" href="#" style="left: 63.4579%;"></a></div>
		<div id="comparison">
			<table id="comparison-table">
				<thead>
				<tr>
					<th width="190"><strong>Email service</strong></th>
					<th><strong>Cost per <span class="emails">317,290</span> <span id="emailemails">emails</span></strong></th>
				</tr>
				</thead>
				<tbody>
				<tr>
					<td>MailChimp</td>
					<td>$<span id="mc_cost">3,172.90</span></td>
				</tr>
				<tr>
					<td>Campaign Monitor</td>
					<td>$<span id="cm_cost">3,177.90</span></td>
				</tr>
				<tr id="amazonsesrow">
					<td><strong>Amazon SES</strong></td>
					<td><strong>$<span id="ses_cost">31.73</span></strong></td>
				</tr>
				</tbody>
			</table>
		</div>
		<p id="penny-static" style="display: none;">A penny saved is a penny earned.</p>
		<p id="penny-dynamic" style="">
			<del>A penny</del>
			<span class="savings">$3,143.67</span> saved is
			<del>a penny</del>
			<span class="savings">$3,143.67</span> earned.
		</p>
	

	</div>
	<footer class="entry-footer">
	  <?
	  edit_post_link(
		  sprintf(
		  /* translators: %s: Name of current post */
			  esc_html__('Edit %s', 'freshlondon'),
			  the_title('<span class="screen-reader-text">"', '"</span>', false)
		  ),
		  '<span class="edit-link">',
		  '</span>'
	  );
	  ?>
	</footer>
</article><!-- #post-## -->