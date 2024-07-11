<?php
class PluginAccountAssignment_v1{
  public $db = null;
  private $plugin_settings = null;
  private $img_dir = '/data/theme/[theme]/account/profile_image';
  function __construct() {
    require_once __DIR__.'/mysql/db.php';
    $this->plugin_settings = wfPlugin::getPluginSettings('account/assignment_v1', true);
    wfPlugin::includeonce('wf/yml');
    $this->db = new db_account_auto(array(
      'conn' => $this->plugin_settings->get('settings/mysql')
            ));
  }
  public function widget_cards($data){
    $data = new PluginWfArray($data['data']);
    $accounts = $this->db->account_select_by_role($data->get('role'), $data->get('order_by/key'));
    $cards = array();
    foreach($accounts as $v){
      $img_name = $this->img_dir.'/'.$v['username'].'.jpg';
      $img_exist = wfFilesystem::fileExist(wfGlobals::getWebDir().$img_name);
      $v['img_name'] = $img_name;
      $v['img_exist'] = $img_exist;
      $card = new PluginWfYml(__DIR__.'/element/card.yml');
      $card->setByTag($v);
      $cards[] = $card->get();
    }
    wfDocument::renderElement($cards);
  }
}
