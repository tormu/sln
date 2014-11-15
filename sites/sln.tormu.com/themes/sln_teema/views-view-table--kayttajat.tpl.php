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
 //dsm($rows);
 
  $header['value'] = '<img src="' . path_to_theme() . '/images/galleria.gif" alt="IRC-Galleria" />';
  //$header['valuexxxxxx'] = '<img src="' . path_to_theme() . '/images/facebook.gif" alt="Facebook" />';
  $header['value_6'] = '<img src="' . path_to_theme() . '/images/external.gif" alt="WWW" />';

  //Ei näytetä koskaan vaihtoehtoista nick-kenttää
  unset($header['value_1']);
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
        if(!empty($row['value_1'])) {
          $row['name'] = $row['value_1'];
        }
        //Ja tyhjennetään vaihtoehtoinen nick kaikilta
        unset($row['value_1']);
      ?>
      <tr class="<?php print implode(' ', $row_classes[$count]); ?>">
        <?php foreach ($row as $field => $content): ?>
          <?php
            if($field == 'value' && !empty($content)) {
              $content = l($header['value'], 'http://irc-galleria.net/user/'.$content, array('html' => TRUE));
            }
            elseif($field == 'value_6' && !empty($content)) {
              $content = l($header['value_6'], $content, array('html' => TRUE));
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
          ?>
          <td class="views-field views-field-<?php print $fields[$field]; ?>">
            <?php print $content; ?>
          </td>
        <?php endforeach; ?>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
