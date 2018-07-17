<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;

/**
 * Description of HomeController
 *
 * @author leo
 */
class HomeController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $this->viewBuilder()->setLayout('mobly');

        $this->loadModel('Category');
        $category = $this->Category->find('all');
        $this->set(compact('category'));

        $this->loadModel('Product');
        $product = $this->Product->find('all', ['order' => ['Product.price' => 'ASC']]);
        $this->set(compact('product'));
    }

}
