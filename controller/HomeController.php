<?php
class HomeController extends Controller {
    public function index () {
		$data ['title'] = 'Alumni Association of ECNU, Szuhou';
		var_dump($data);
        //View::load ('home/home_page', $data);
	}
}