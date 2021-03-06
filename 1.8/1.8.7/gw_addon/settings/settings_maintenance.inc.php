<?php
/**
 * Glossword - glossary compiler (http://glossword.info/)
 * � 2002-2008 Dmitry N. Shilnikov <dev at glossword dot info>
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 * (see `http://creativecommons.org/licenses/GPL/2.0/' for details)
 */
if (!defined('IN_GW'))
{
	die('<!-- $Id$ -->');
}
/* Included from $oAddonAdm->alpha(); */

/* */
$this->str .= $this->_get_nav();
/* */
if (!$this->gw_this['vars']['tid'])
{
	$ar_task[1] = $this->oL->m('1001');
	$ar_task[2] = $this->oL->m('1002');
	$ar_task[3] = $this->oL->m('1003');
	$ar_task[4] = $this->oL->m('1004');
	$ar_task[5] = $this->oL->m('1005');
	$ar_task[7] = $this->oL->m('1007');
	$ar_task[8] = $this->oL->m('1266');
	$ar_task[9] = $this->oL->m('1305');
	$this->str .= '<p class="xr">'.$this->oL->m('task_list').'</p>';
	$this->str .= '<ul class="xu">';
	for (reset($ar_task); list($k, $v) = each($ar_task);)
	{
		$this->str .= sprintf('<li><p><a href="%s">%s</a></p></li>',
			append_url($this->sys['page_admin'].'?'.GW_ACTION.'='.$this->gw_this['vars'][GW_ACTION].'&tid='.$k.'&'.GW_TARGET.'='.$this->gw_this['vars'][GW_TARGET]),
			$v
		);
	}
	$this->str .= '</ul>';
}
$tmp['filename'] = $this->sys['path_addon'].'/'.$this->gw_this['vars'][GW_TARGET].'/'.$this->gw_this['vars'][GW_TARGET].'_'.$this->gw_this['vars'][GW_ACTION].'_'.$this->gw_this['vars']['tid'].'.inc.php';
if (file_exists($tmp['filename']))
{
	include_once($tmp['filename']);
}


/* */
function html_array_to_table_multi($ar, $is_print = 1)
{
	if (empty($ar)) { $ar = array(); }
	if (is_string($ar)) { $ar = array(array($ar)); }
	$str = '<table cellpadding="2" cellspacing="1" width="95%" border="0"><tbody>';
	for (reset($ar); list($k, $arV) = each($ar);)
	{
		if (is_string($arV)) { $arV = array($arV); }
		$td_width = empty($arV) ? 1: ceil(100 / sizeof($arV));
		$td_style = '';
		if ($k == 0)
		{
			$td_style = ' style="width:'.$td_width.'%"';
		}
		$str .= '<tr>';
		for (reset($arV); list($k2, $v2) = each($arV);)
		{
			$str .= '<td'. $td_style .'>'.  $v2 .'</td>';
		}
		$str .= '</tr>';
	}
	$str .= '</tbody></table>';
	if ($is_print)
	{
		print $str;
	}
	else
	{
		return $str;
	}
}



/* end of file */
?>