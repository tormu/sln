<?php
// $Id: template.php,v 1.1.2.2 2009/03/29 15:46:36 dvessel Exp $

/* Yliajetaan default, jotta daten formaatti olisi lyhyt eikä medium */
function sln_teema_node_submitted($node) {
  return t('Submitted by !username on @datetime',
    array(
      '!username' => theme('username', $node),
      '@datetime' => format_date($node->created, 'small'),
    )
  );
}

/* Yliajetaan default, jotta daten formaatti olisi lyhyt eikä medium */
function sln_teema_comment_submitted($comment) {
  return t('!username, @datetime',
    array(
      '!username' => theme('username', $comment),
      '@datetime' => format_date($comment->timestamp, 'small')
    )
  );
}
