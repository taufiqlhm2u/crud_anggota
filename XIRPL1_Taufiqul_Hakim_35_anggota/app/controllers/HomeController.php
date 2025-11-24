<?php 

class HomeController extends Controller
 {
    public function index() {
        $data['title'] = 'Home';
        $this->view('templates/header', $data);
        $this->view('home/index');
        $this->view('templates/footer');
    }
}