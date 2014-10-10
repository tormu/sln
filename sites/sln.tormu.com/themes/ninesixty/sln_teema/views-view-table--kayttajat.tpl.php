<?php
// $Id: views-view-table.tpl.php,v 1.8 2009/01/28 00:43:43 merlinofchaos Exp $
/**
 * @file views-view-table.tpl.php
 * Template to display a view as a table.
 *
 * - $title : The title of this group of rows.  May be empty.
 * - $header: An array of header labels keyed by field id.
 * - $fields: An array of CSS IDs to use for each field id.
 * - $class: A class or classes to apply to the table, based on settings.
 * - $row_classes: An array of classes to apply to each row, indexed by row
 *   number. This matches the index in $rows.
 * - $rows: An array of row items. Each row is an array of content.
 *   $rows are keyed by row number, fields within rows are keyed by field ID.
 * @ingroup views_templates
 */
 
  $header['value_1'] = '<img src="' . path_to_theme() . '/images/galleria.gif" alt="IRC-Galleria" />';
  $header['value'] = '<img src="' . path_to_theme() . '/images/facebook.gif" alt="Facebook" />';
  $header['value_7'] = '<img src="' . path_to_theme() . '/images/external.gif" alt="WWW" />';
  if(!user_access('view profile_facebook field')) {
    unset($header['value']);
  }
  if(!user_access('view profile_name field')) {
    unset($header['value_3']);
  }
  //Ei näytetä koskaan vaihtoehtoista nick-kenttää
  unset($header['value_8']);
?>
<table class="<?php print $class; ?>">
  <?php if (!empty($title)) : ?>
    <caption><?php print $title; ?></caption>
  <?php endif; ?>
  <thead>
    <tr>
      <?php foreach ($header as $field => $label): ?>
        <th class="views-field views-field-<?php print $fields[$field]; ?>">
          <?php print $label; ?>
        </th>
      <?php endforeach; ?>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($rows as $count => $row): ?>
      <?php
        //Vaihtoehtoinen nick korvaa käyttäjänimen
        if(!empty($row['value_8'])) {
          $row['name'] = $row['value_8'];
        }
      ?>
      <tr class="<?php print implode(' ', $row_classes[$count]); ?>">
        <?php foreach ($row as $field => $content): ?>
          <?php
            $show = TRUE;
            if($field == 'value_3' && !user_access('view profile_name field') || $field == 'value_8') {
              $show = FALSE;
            }
            elseif($field == 'value') {
              if(!user_access('view profile_facebook field')) {
                $show = FALSE;
              }
              elseif(!empty($content)) {
                $content = l($header['value'], $content, array('html' => TRUE));
              }
            }
            elseif($field == 'value_1' && !empty($content)) {
              $content = l($header['value_1'], 'http://irc-galleria.net/user/'.$content, array('html' => TRUE));
            }
            elseif($field == 'value_7' && !empty($content)) {
              $content = l($header['value_7'], $content, array('html' => TRUE));
            }
            elseif($field == 'rid' && !empty($content)) {
              if($content == 'operator') {
                $content = '@';
              }
              else {
                $content = '+';
              }
            }
            //print $field . ' - ' . $content . '<br />';
            
            //Käyttäjän syntymäaika näytetään ikänä
            if($field == 'value_6') {
              $content = sln_age($content);
            }
          ?>
          <?php if($show) : ?>
            <td class="views-field views-field-<?php print $fields[$field]; ?>">
              <?php print $content; ?>
            </td>
          <?php endif; ?>
        <?php endforeach; ?>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
