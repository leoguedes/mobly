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
    public function index($id = null) {
        $this->viewBuilder()->setLayout('mobly');

        $this->loadModel('Category');
        $category = $this->Category->find('all');
        $this->set(compact('category'));

        $this->loadModel('Product');
        $product = $this->Product->find('all', ['order' => ['Product.price' => 'ASC']]);
        $this->set(compact('product'));

        if ($id) {
            $categoryProduct = $this->Category->get($id, [
                'contain' => ['Product']
            ]);

            $this->set('categoryProduct', $categoryProduct);
        }
    }

    public function myCart($user) {

        $this->viewBuilder()->setLayout('mobly');
        $this->loadModel('Category');
        $category = $this->Category->find('all');

        $session = $this->request->session();

        $sessionInfo = $session->read($user) ? $session->read($user) : NULL;

        $this->set('sessionInfo', $sessionInfo);

        $this->set(compact('category'));

//        if (!$_SESSION[$user]) {
//
//        }
    }

}
