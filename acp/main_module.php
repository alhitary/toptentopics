<?php
namespace staffit\toptentopics\acp;
class main_module
{
	var $u_action;
	function main($id, $mode)
	{
		global $db, $user, $auth, $template, $cache, $request;
		global $config, $phpbb_root_path, $phpbb_admin_path, $phpEx;
		$user->add_lang('acp/common');
		$this->tpl_name = 'toptentopics_body';
		$this->page_title = $user->lang('ACP_TTT_TITLE');
		add_form_key('staffit/toptentopics');
		if ($request->is_set_post('submit'))
		{
			if (!check_form_key('staffit/toptentopics'))
			{
				trigger_error('FORM_INVALID');
			}
			$config->set('toptentopics', $request->variable('toptentopics', 0));
			trigger_error($user->lang('ACP_TTT_SAVED') . adm_back_link($this->u_action));
		}
		$template->assign_vars(array(
			'U_ACTION'				=> $this->u_action,
			'ACP_POSITION'		=> $config['toptentopics'],
		));
	}
}