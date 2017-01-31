<?
define ('WEB_ROOT', dirname(__FILE__) . '/webroot/');
define ('TIPH_ROOT', dirname(__FILE__) . '/../tiph');
define ('COMMON_ROOT', dirname(__FILE__) . '/../common');
define ('DIR_ROOT', dirname(__FILE__));

require_once (TIPH_ROOT . '/web/application.php');
require_once (DIR_ROOT . '/config.php');

require_once (COMMON_ROOT . '/util/ICACommon.php');		// class ICACommon
require_once (COMMON_ROOT . '/util/StringUtil.php');		// class StringUtil
require_once (COMMON_ROOT . '/util/ValidateUtil.php');	// 

require_once (COMMON_ROOT . '/libs/log4php/Logger.php');
Logger::configure(DIR_ROOT . "/log4php.properties"); 

class NeedUserLoginException extends Exception {
}

class NeedAdminLoginException extends Exception {
}

class NotFoundException extends Exception {
}

class App extends Application {
	
	public function handleException($e) {
		
		if ($e instanceof NotFoundException) {
			header(HTTP_SC_404);
			if (!ICACommon::is_ajax()) {
				View::load('common/error/404');
			}
			return;
		}

		if ($e instanceof NeedUserLoginException) {
			Session::clear('user.id');
			Session::clear('user.name');
			Session::clear('user.page_size');
			if (ICACommon::is_ajax()) {
				echo json_encode(array('result' => -1));
				return ;
			}
			G ('login');
			return ;
		}

		if ($e instanceof NeedAdminLoginException) {
			Session::clear('admin.id');
			Session::clear('admin.name');
			Session::clear('admin.page_size');
			if (ICACommon::is_ajax()) {
				echo json_encode(array('result' => -1));
				return ;
			}
			G ('a');
			return;
		}

		if ($e instanceof PDOException) {
			$logger = Logger::getLogger("alumni-assoc");
			$logger->error("[Message]".$e->getMessage()."\n[TRACE]".$e->getTraceAsString());
			header(HTTP_SC_500);
			if (!ICACommon::is_ajax()) {
				View::load('common/error/500', 'Database Error');
			}
			return;
		}

		if ($e instanceof TiphException) {
			switch ($e->type) {
				case EX_BAD_ROUTER :
					header(HTTP_SC_404);
					if (!ICACommon::is_ajax()) {
						View::load('common/error/404');
					}
					break;
				default :
					header(HTTP_SC_500);
					if (!ICACommon::is_ajax()) {
						View::load('common/error/500');
					}
					break;
			}
			return;
		}
		header(HTTP_SC_500);
		if (!ICACommon::is_ajax()) {
			View::load('common/error/500');
		}
	}
	
	public function shutdown() {
		Cache::close ();
		DB::close ();
	}
	
	public function init() {
		global $_APP;
		
		date_default_timezone_set ( 'Asia/Shanghai' );
		
		/* TIPH Config */
		require_once (TIPH_ROOT . '/base/db.php');
		DB::register ( $_APP ['config'] ['db'] );
		
		require_once (TIPH_ROOT . '/base/session.php');
		//Session::register ( $_APP ['config'] ['session']);
		//Session::start();

		require_once (TIPH_ROOT . '/base/cookie.php');
		Cookie::register ( $_APP ['config'] ['cookie'] );
		
		require_once (TIPH_ROOT . '/base/cache.php');
		Cache::register ( $_APP ['config'] ['cache'] );
		
		require_once (TIPH_ROOT . '/web/view.php');
		View::register ( array (
			'view_root' => dirname ( __FILE__ ) . '/view' ) );
		
		require_once (TIPH_ROOT . '/base/model.php');
		Model::register ( array (
			'root' => dirname ( __FILE__ ) . '/model' ) );
		
		require_once (TIPH_ROOT . '/web/dispatcher.php');
		$dispatcher = $this->_dispatcher;
		$router_map = array (
			// home controller
			'' => 'HomeController'
        );
		$dispatcher->register ( array(
			'context_root' => '/', 
			'controller_root' => dirname ( __FILE__ ) . '/controller', 
			'router_map' => $router_map ) 
		);
	}
}
