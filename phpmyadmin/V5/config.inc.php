<?php

# Specific CPL Database/Server Settings
  $cfg['Servers'][1]['host'] = 'db5000333211.hosting-data.io';
  $cfg['Servers'][1]['user'] = 'dbu337826';
  $cfg['Servers'][1]['password'] = 'Tadjba!4';
  $cfg['Servers'][1]['verbose'] = 'CPL db';

# Specific PMA Database/Server Settings
  $cfg['Servers'][2]['host'] = 'db5000333879.hosting-data.io';
  $cfg['Servers'][2]['user'] = 'dbu602010';
  $cfg['Servers'][2]['password'] = 'Tadjba!4';
  $cfg['Servers'][2]['verbose'] = 'PMA db';

# Specific PMA Database/Server Settings
  $cfg['Servers'][3]['host'] = 'db5000345134.hosting-data.io';
  $cfg['Servers'][3]['user'] = 'dbu387444';
  $cfg['Servers'][3]['password'] = 'Tadjba!4';
  $cfg['Servers'][3]['verbose'] = 'Webmail db';


  for($i=1; $i<=3; $i++) {
# Generic db Settings
    $cfg['Servers'][$i]['auth_type'] = 'cookie';
    $cfg['Servers'][$i]['port'] = 3306;
    $cfg['Servers'][$i]['socket'] = '';
    $cfg['Servers'][$i]['ssl'] = false;
    $cfg['Servers'][$i]['only_db'] = '';
    $cfg['Servers'][$i]['hide_db'] = '';
    $cfg['Servers'][$i]['compress'] = false;
    $cfg['Servers'][$i]['AllowNoPassword'] = true;
    if($i != 2) {
# PMA db connection details
      $cfg['Servers'][$i]['controlhost'] = 'db5000333879.hosting-data.io';
      $cfg['Servers'][$i]['controlport'] = 3306;
      $cfg['Servers'][$i]['controlsocket'] = '';
      $cfg['Servers'][$i]['controluser'] = 'dbu602010';
      $cfg['Servers'][$i]['controlpass'] = 'Tadjba!4';
# PMA Storage and tables
      $cfg['Servers'][$i]['pmadb'] = 'dbs325005';
      $cfg['Servers'][$i]['bookmarktable'] = 'pma__bookmark';
      $cfg['Servers'][$i]['relation'] = 'pma__relation';
      $cfg['Servers'][$i]['table_info'] = 'pma__table_info';
      $cfg['Servers'][$i]['table_coords'] = 'pma__table_coords';
      $cfg['Servers'][$i]['pdf_pages'] = 'pma__pdf_pages';
      $cfg['Servers'][$i]['column_info'] = 'pma__column_info';
      $cfg['Servers'][$i]['history'] = 'pma__history';
      $cfg['Servers'][$i]['table_uiprefs'] = 'pma__table_uiprefs';
      $cfg['Servers'][$i]['tracking'] = 'pma__tracking';
      $cfg['Servers'][$i]['userconfig'] = 'pma__userconfig';
      $cfg['Servers'][$i]['recent'] = 'pma__recent';
      $cfg['Servers'][$i]['favorite'] = 'pma__favorite';
      $cfg['Servers'][$i]['users'] = 'pma__users';
      $cfg['Servers'][$i]['usergroups'] = 'pma__usergroups';
      $cfg['Servers'][$i]['navigationhiding'] = 'pma__navigationhiding';
      $cfg['Servers'][$i]['savedsearches'] = 'pma__savedsearches';
      $cfg['Servers'][$i]['central_columns'] = 'pma__central_columns';
      $cfg['Servers'][$i]['designer_settings'] = 'pma__designer_settings';
      $cfg['Servers'][$i]['export_templates'] = 'pma__export_templates';
    }
  }

# Blowfish Secret
  $cfg['blowfish_secret'] = ';0H9A7pg\'q`Mmlovn]O#7Y6b[C"?5VC';

# Look/Feel settings
  $cfg['DefaultLang'] = 'en';
  $cfg['ServerDefault'] = 1;
  $cfg['UploadDir'] = './upload/';
  $cfg['SaveDir'] = './save/';
  $cfg['TempDir'] = './tmp/';
  $cfg['AuthLog'] = './log';
  $cfg['ZeroConf'] = false;
  $cfg['AllowThirdPartyFraming'] = ‘sameorigin’;
  $cfg['ShowAll'] = true;
  $cfg['RowActionType'] = 'icons';  //icons, text, both
  $cfg['MaxRows'] = 50;



?>