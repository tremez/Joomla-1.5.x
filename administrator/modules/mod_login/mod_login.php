<?php
/**
* @version		$Id: CHANGELOG.php 0000003 03-25-2013 18:35 Shankara
* @package		Joomla
* @copyright	2013 proinsurer.com.ua
*/

defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.language.helper');
//$browserLang = JLanguageHelper::detectLanguage();
// forced to default
$browserLang = null;
$lang =& JFactory::getLanguage();

$languages = array();
$languages = JLanguageHelper::createLanguageList($browserLang );
array_unshift( $languages, JHTML::_('select.option',  '', JText::_( 'Default' ) ) );
$langs = JHTML::_('select.genericlist',   $languages, 'lang', ' class="inputbox"', 'value', 'text', $browserLang );
?>
<?php if(JPluginHelper::isEnabled('authentication', 'openid')) :
		$lang->load( 'plg_authentication_openid', JPATH_ADMINISTRATOR );
		$langScript = 	'var JLanguage = {};'.
						' JLanguage.WHAT_IS_OPENID = \''.JText::_( 'WHAT_IS_OPENID' ).'\';'.
						' JLanguage.LOGIN_WITH_OPENID = \''.JText::_( 'LOGIN_WITH_OPENID' ).'\';'.
						' JLanguage.NORMAL_LOGIN = \''.JText::_( 'NORMAL_LOGIN' ).'\';'.
						' var modlogin = 1;';
		$document = &JFactory::getDocument();
		$document->addScriptDeclaration( $langScript );
		JHTML::_('script', 'openid.js');
endif; ?>
<form action="<?php echo JRoute::_( 'index.php', true, $params->get('usesecure')); ?>" method="post" name="login" id="form-login" style="clear: both;">
	<div id="form-login-username">
		<label for="modlgn_username"><?php echo JText::_('Username'); ?></label>
		<input name="username" id="modlgn_username" type="text" class="inputbox" size="15" />
	</div>

	<div id="form-login-password">
		<label for="modlgn_passwd"><?php echo JText::_('Password'); ?></label>
		<input name="passwd" id="modlgn_passwd" type="password" class="inputbox" size="15" />
	</div>
	<?php
	if($error = JError::getError(true)) {
		echo '<p id="login-error-message">';
		echo $error->get('message');
		echo '<p>';
	}
	?>
	
	<div class="button_holder">
	<div class="button1">
		<div class="next">
			<a onclick="login.submit();">
				<?php echo JText::_( 'Login' ); ?></a>

		</div>
	</div>
	</div>
	<div class="clr"></div>
	<input type="submit" style="border: 0; padding: 0; margin: 0; width: 0px; height: 0px;" value="<?php echo JText::_( 'Login' ); ?>" />
	<input type="hidden" name="option" value="com_login" />
	<input type="hidden" name="task" value="login" />
	<?php echo JHTML::_( 'form.token' ); ?>
</form>