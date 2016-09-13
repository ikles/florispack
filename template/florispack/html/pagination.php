<?php

// no direct access
defined('_JEXEC') or die;

function pagination_list_footer($list)
{
    $html = "<div class=\"list-footer\">\n";

    $html .= "\n<div class=\"limit\">".JText::_('JGLOBAL_DISPLAY_NUM').$list['limitfield']."</div>";
    $html .= $list['pageslinks'];
    $html .= "\n<div class=\"counter\">".$list['pagescounter']."</div>";

    $html .= "\n<input type=\"hidden\" name=\"" . $list['prefix'] . "limitstart\" value=\"".$list['limitstart']."\" />";
    $html .= "\n</div>";

    return $html;
}

function pagination_list_render($list)
{
    // Reverse output rendering for right-to-left display.
    $html = '<ul>';
    $html .= '<li class="pagination-start">'.$list['start']['data'].'</li>';
    $html .= '<li class="pagination-prev">'.$list['previous']['data'].'</li>';
   $i=0;
    foreach($list['pages'] as $page) {
    if ($i != 0){
        $html .= '<li class="number">'.$page['data'].'</li>';
        }   else {
        	 $html .= '<li class="number">'.$page['data'].'</li>';
        }
        $i++;
    }
  $html .= '<li class="pagination-next">'. $list['next']['data'].'</li>';
   $html .= '<li class="pagination-end">'. $list['end']['data'].'</li>';
    $html .= '</ul>';

    return $html;
}

function pagination_item_active(&$item)
{
    $app = JFactory::getApplication();
    if ($app->isAdmin())
    {
        if ($item->base > 0) {
            return "<a title=\"".$item->text."\" onclick=\"document.adminForm." . $this->prefix . "limitstart.value=".$item->base."; Joomla.submitform();return false;\">".$item->text."</a>";
        }
        else {
            return "<a title=\"".$item->text."\" onclick=\"document.adminForm." . $this->prefix . "limitstart.value=0; Joomla.submitform();return false;\">".$item->text."</a>";
        }
    }
    else {
        return "<a title=\"".$item->text."\" href=\"".$item->link."\" class=\"pagenav\">".$item->text."</a>";
    }
}

function pagination_item_inactive(&$item)
{
    $app = JFactory::getApplication();
    if ($app->isAdmin()) {
        return "<span>".$item->text."</span>";
    }
    else {
        return "<span class=\"pagenav\">".$item->text."</span>";
    }
}
?>